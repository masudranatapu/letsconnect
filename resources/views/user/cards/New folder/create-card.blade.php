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
                    <form action="{{ route('user.save.business.card') }}" method="post" enctype="multipart/form-data"
                        class="card">
                        @csrf
                        {{-- Create Card --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 col-xl-5">
                                    <div class="mb-3">
                                        <div class="row g-2">
                                            @foreach ($themes as $theme)
                                            <div class="col-lg-5 col-sm-6 col-md-6 col-6">
                                                <label class="form-imagecheck mb-2">
                                                    <input type="radio" name="theme_id" value="{{ $theme->theme_id }}"
                                                        class="form-imagecheck-input" required checked />
                                                    <span class="form-imagecheck-figure text-center font-weight-bold">
                                                        <img src="{{ asset('backend/img/vCards/'.$theme->theme_thumbnail) }}"
                                                            class="w-100 h-100 object-cover"
                                                            alt="{{ $theme->theme_name }}"
                                                            class="form-imagecheck-image">
                                                        <span class="badge bg-dark">{{ $theme->theme_name }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-xl-7">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Card Color') }}</label>
                                                <div class="row g-2">
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="blue"
                                                                class="form-colorinput-input" required checked />
                                                            <span class="form-colorinput-color bg-blue"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput form-colorinput-light">
                                                            <input name="card_color" type="radio" value="indigo"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-indigo"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="green"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-green"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="yellow"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-yellow"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="red"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-red"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="purple"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-purple"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="pink"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-pink"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput form-colorinput-light">
                                                            <input name="card_color" type="radio" value="gray"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-muted"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="card_lang">{{ __('Language') }} <span
                                                        class="text-danger">*</span></label>
                                                <select name="card_lang" id="card_lang" class="form-control" required>
                                                    @foreach(config('app.languages') as $langLocale => $langName)
                                                    <option class="dropdown-item" value="{{ $langLocale }}" {{ $langLocale == 'en' ? 'selected' : '' }}>
                                                        {{ $langName }} ({{ strtoupper($langLocale) }})
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label required">{{ __('Cover') }} <span
                                                        class="text-danger">({{ __('Recommended : 604 x 250 pixels')
                                                        }})</span>
                                                </div>
                                                <input type="file" class="form-control" name="cover"
                                                    placeholder="{{ __('Cover') }}..." required
                                                    accept=".jpeg,.jpg,.png,.gif,.svg" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label required">{{ __('Logo') }} <span
                                                        class="text-danger">({{ __('Recommended : 500 x 500 pixels')
                                                        }})</span>
                                                </div>
                                                <input type="file" class="form-control" name="logo"
                                                    placeholder="{{ __('Logo') }}..." required
                                                    accept=".jpeg,.jpg,.png,.gif,.svg" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Title') }}</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ old('title') }}"
                                                    placeholder="{{ __('Business name / Your name') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Sub Title') }}</label>
                                                <input type="text" class="form-control" name="subtitle"
                                                    value="{{ old('subtitle') }}"
                                                    placeholder="{{ __('Location / Job title') }}..." required>
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
                                        <div class="col-md-10 col-xl-10">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Personalized Link') }}</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        {{ URL::to('/') }}
                                                    </span>
                                                    <input type="text" class="form-control" name="link"
                                                        placeholder="{{ __('Personalized Link') }}" autocomplete="off"
                                                        id="plink" onkeyup="checkLink()" value="{{ old('link') }}"
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
</script>
@endpush
@endsection