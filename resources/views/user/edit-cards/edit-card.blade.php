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
                        {{ __('Edit Business Card') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12">
                    <form action="{{ route('user.update.business.card', Request::segment(3)) }}" method="post"
                        enctype="multipart/form-data" class="card">
                        @csrf
                        {{-- Create Card --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                            @foreach ($themes as $theme)
                                                <label class="form-imagecheck mb-2">
                                                    <input type="radio" name="theme_id" value="{{ $theme->theme_id }}"
                                                        class="form-imagecheck-input" required {{ $theme->theme_id ==
                                                    $business_card->theme_id ? 'checked' : '' }} />
                                                    <span class="form-imagecheck-figure text-center font-weight-bold">
                                                        <img src="{{ asset('backend/img/vCards/'.$theme->theme_thumbnail) }}"
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
{{--                                                    <span--}}
{{--                                                        class="text-danger">({{ __('Recommended : 604 x 250 pixels')}})--}}
{{--                                                    </span>--}}
                                                </div>
                                                <input type="file" id="imageCoverInput" class="form-control" value="{!! $business_card->cover !!}"
                                                       placeholder="{{ __('Cover') }}..." onchange="imageHandler(this,'coverImage')"
                                                       accept=".jpeg,.jpg,.png,.gif,.svg"/>

                                                <img id="coverImagePreview" class="img-fluid mt-3" src="{!! $business_card->cover !!}">
                                                <input id="coverImageResult" name="cover" hidden readonly>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label required">{{ __('Logo') }}
{{--                                                    <span--}}
{{--                                                        class="text-danger">({{ __('Recommended : 500 x 500 pixels')}})--}}
{{--                                                    </span>--}}
                                                </div>
                                                <input type="file" id="file" class="form-control" value="{!! $business_card->profile !!}"
                                                       placeholder="{{ __('Logo') }}..." onchange="imageHandler(this,'logoImage')"
                                                       accept=".jpeg,.jpg,.png,.gif,.svg"/>
                                                <img id="logoImagePreview" class="img-fluid mt-3" src="{!! $business_card->profile !!}">
                                                <input id="logoImageResult" name="logo" hidden readonly>

                                            </div>
                                        </div>

                                        {{--<div class="col-md-12 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Description') }}</label>
                                                <textarea class="form-control" name="description"
                                                    data-bs-toggle="autosize"
                                                    placeholder="{{ __('About business / Bio') }}..."
                                                    required>{{ $business_card->description }}</textarea>
                                            </div>
                                        </div>--}}

                                        @if ($plan_details->personalized_link)
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Personalized Link') }}</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        {{ URL::to('/') }}
                                                    </span>
                                                    <input type="text" class="form-control" name="link"
                                                        placeholder="{{ __('Personalized Link') }}" autocomplete="off"
                                                        id="plink" onkeyup="checkLink()" minlength="3"
                                                        value="{{ $business_card->card_url }}" required>
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

<div class="modal modal-blur fade" id="openMediaModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Media Library')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cards" id="captions">
                    @if (!empty($media) && $media->count())
                        @foreach ($media as $gallery)
                            <div class="col-sm-6 col-lg-6">
                                <div class="card card-sm">
                                    <div class="d-block">
                                        <div class="media_image card-img-top img-responsive img-responsive-16by9"
                                             id="{{ $gallery->media_url }}"
                                             style="background-image: url({{ asset($gallery->media_url) }})"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty">
                            <div class="empty-img"><img src="{{ asset('backend/img/undraw_printing_invoices_5r4r.svg') }}"
                                                        height="128" alt="">
                            </div>
                            <p class="empty-title">{{ __('No media found') }}</p>
                            <p class="empty-subtitle text-muted">
                                {{ __('Try adjusting your add to find what you are looking for.') }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('custom-js')
<script>
    function checkLink(){
    "use strict";
    var plink = $('#plink').val();
    if(plink.length > 2){

    $.ajax({
    url: "{{ route('user.check.link') }}",
    method: 'POST',
    data:{_token: "{{ csrf_token() }}", link: plink},
    }).done(function(res) {
        if(res.status == 'success') {
            $('#status').html("<span class='badge mt-2 bg-green'>{{ __('Available') }}</span>");
        }else{
            $('#status').html("<span class='badge mt-2 bg-red'>{{ __('Not available') }}</span>");
        }
    });
}else{
    $('#status').html("");
}
}

    function openMedia(id){
        var currentSelection = 0;
        "use strict";
        currentSelection = id;
        $('#openMediaModel').modal('show');
    }
    $(".media_image").on( "click", function() {
        // imageHandler()
        var imgUri = $(this).attr('id');
        $('#openMediaModel').modal('hide');
        $('#imageCoverInput').text(imgUri);
        // imageHandler($('#imageCoverInput')[0],'coverImage')
        // console.log($('#imageCoverInput'))
    });
</script>
@endpush
@endsection
