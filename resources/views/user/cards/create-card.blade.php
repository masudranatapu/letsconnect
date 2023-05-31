@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            {{ __('Overview') }}
                        </div>
                        <h2 class="page-title">
                            {{ __('Create New Business Card') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form action="{{ route('user.save.business.card') }}" method="post"
                              enctype="multipart/form-data"
                              class="card">
                            @csrf
                            {{-- Create Card --}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                                @foreach ($themes as $theme)
                                                        <label class="form-imagecheck mb-2">
                                                            <input type="radio" name="theme_id"
                                                                   value="{{ $theme->theme_id }}"
                                                                   class="form-imagecheck-input" required checked/>
                                                            <span
                                                                class="form-imagecheck-figure text-center font-weight-bold">
                                                        <img
                                                            src="{{ asset('backend/img/vCards/'.$theme->theme_thumbnail) }}"
                                                            class="w-100 h-100 object-cover"
                                                            alt="{{ $theme->theme_name }}"
                                                            class="form-imagecheck-image">
                                                        <span class="badge bg-dark">{{ $theme->theme_name }}</span>
                                                    </span>
                                                        </label>
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                                <div class="col-md-6 col-xl-6">
                                                    <div class="mb-3">
                                                        <div class="form-label required">{{ __('Cover') }}
{{--                                                            <span--}}
{{--                                                                class="text-danger">({{ __('Recommended : 604 x 250 pixels')}})--}}
{{--                                                            </span>--}}
                                                        </div>
                                                        <input type="file" id="file" class="form-control"
                                                               placeholder="{{ __('Cover') }}..." required onchange="imageHandler(this,'coverImage')"
                                                               accept=".jpeg,.jpg,.png,.gif,.svg"/>
                                                        <img id="coverImagePreview" class="img-fluid mt-3">
                                                        <input id="coverImageResult" name="cover" hidden readonly>

                                                    </div>
                                                </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <div class="form-label required">{{ __('Logo') }}
{{--                                                        <span--}}
{{--                                                            class="text-danger">({{ __('Recommended : 500 x 500 pixels')}})--}}
{{--                                                        </span>--}}
                                                    </div>
                                                    <input type="file" class="form-control"
                                                           placeholder="{{ __('Logo') }}..." required onchange="imageHandler(this,'logoImage')"
                                                           accept=".jpeg,.jpg,.png,.gif,.svg"/>
                                                    <img id="logoImagePreview"  class="img-fluid mt-3">
                                                    <input id="logoImageResult" name="logo" hidden readonly>
                                                </div>
                                            </div>

                                            {{--<div class="col-md-12 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Description') }}</label>
                                                    <textarea class="form-control" name="description"
                                                        data-bs-toggle="autosize"
                                                        placeholder="{{ __('About business / Bio') }}..."
                                                        required>{{ old('description') }}</textarea>
                                                </div>
                                            </div>--}}

                                            @if ($plan_details->personalized_link)
                                                <div class="col-12">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label required">{{ __('Personalized Link') }}</label>
                                                            <div class="input-group">
                                                    <span class="input-group-text">
                                                        {{ URL::to('/') }}
                                                    </span>
                                                                <input type="text" class="form-control" name="link"
                                                                       placeholder="{{ __('Personalized Link') }}"
                                                                       autocomplete="off"
                                                                       id="plink" onkeyup="checkLink()"
                                                                       value="{{ old('link') }}"
                                                                       minlength="3" required>
                                                            </div>
                                                            <p id="status"></p>
                                                        </div>

                                                </div>
                                            @endif

                                        </div>

                                        <div class="col-md-4 col-xl-4 my-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Submit & Next') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('user.includes.footer')
    </div>

    @push('custom-js')


        <script>

            function checkLink() {
                "use strict";
                var plink = $('#plink').val();
                if (plink.length > 2) {

                    $.ajax({
                        url: "{{ route('user.check.link') }}",
                        method: 'POST',
                        data: {_token: "{{ csrf_token() }}", link: plink},
                    }).done(function (res) {
                        if (res.status == 'success') {
                            $('#status').html("<span class='badge mt-2 bg-green'>{{ __('Available') }}</span>");
                        } else {
                            $('#status').html("<span class='badge mt-2 bg-red'>{{ __('Not available') }}</span>");
                        }
                    });
                } else {
                    $('#status').html("");
                }
            }


            // $(document).ready(function () {
            //     $("#file").change(function (e) {
            //         var img = e.target.files[0];
            //         if (!pixelarity.open(img, false, function (res, faces) {
            //             $("#result").attr("src", res);
            //             $(".face").remove();
            //             // // Looping through the faces returned
            //             // for (var i = 0; i < faces.length; i++) {
            //             //     // Do something with the faces
            //             // }
            //         }, "jpg", 0.7, true)) {
            //             alert("Whoops! That is not an image!");
            //         }
            //     });
            // });

        </script>
    @endpush
@endsection
