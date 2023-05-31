@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('content')
<style>
    .btn.btn-primary {
        background: #ed6b4d !important;
    }
</style>


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
                        {{ __('Create New WhatsApp Store') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('user.save.store') }}" method="post" enctype="multipart/form-data"
                        class="card">
                        @csrf
                        {{-- Create Card --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 col-xl-5">
                                    <div class="mb-3 text-center">
                                        <div class="row g-2">
                                            @foreach ($themes as $theme)
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-6">
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
                                                <div class="mt-2">
                                                    <a href="{{ asset('backend/img/vCards/'.$theme->theme_thumbnail) }}" class="btn btn-primary popup_image">Preview Theme</a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-7 col-xl-7">
                                    <div class="row">
                                        <div class="tabs_menu nav-tabs mb-4">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="nav-item nav-link active">Create Whatsapp Store</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="nav-item nav-link">Add Product</a>
                                                </li>
                                            </ul>
                                        </div>
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
                                                    <option class="dropdown-item" value="{{ $langLocale }}" {{
                                                        $langLocale=='en' ? 'selected' : '' }}>
                                                        {{ $langName }} ({{ strtoupper($langLocale) }})
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label required">{{ __('Banner') }} <span
                                                        class="text-danger">({{ __('Recommended : 1920 x 550 pixels')
                                                        }})</span></div>
                                                <input type="file" class="form-control" name="banner"
                                                    placeholder="{{ __('Banner') }}..." required
                                                    accept=".jpeg,.jpg,.png,.gif,.svg" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label required">{{ __('Logo') }} <span
                                                        class="text-danger">({{ __('Recommended: 180 x 90 pixels')
                                                        }})</span></div>
                                                <input type="file" class="form-control" name="logo"
                                                    placeholder="{{ __('Logo') }}..." required
                                                    accept=".jpeg,.jpg,.png,.gif,.svg" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Store name') }}</label>
                                                <input type="text" class="form-control" name="title"
                                                    placeholder="{{ __('Store name') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Store greeting') }}</label>
                                                <input type="text" class="form-control" name="subtitle"
                                                    placeholder="{{ __('Ex: Welcome to') }}..." required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required" for="currency">{{ __('Currency')
                                                    }}</label>
                                                <select name="currency" id="currency" class="form-control" required>
                                                    @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->symbol }}">
                                                        {{ $currency->name }} ({{ $currency->symbol }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('WhatsApp Number') }}</label>
                                                <input type="number" class="form-control" name="whatsapp_no"
                                                    placeholder="{{ __('For example: 919876543210 (With country code)') }}..."
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('WhatsApp Footer Text')
                                                    }}</label>
                                                <textarea class="form-control" name="whatsapp_msg"
                                                    data-bs-toggle="autosize"
                                                    placeholder="{{ __('WhatsApp Footer Text') }}..."
                                                    required>{{ __('Thanks for shopping with us.') }}</textarea>
                                            </div>
                                        </div>

                                        @if ($plan_details->personalized_link)
                                        <div class="col-md-10 col-xl-10 mt-3">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Personalized Link') }}</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        {{ URL::to('/') }}
                                                    </span>
                                                    <input type="text" class="form-control" name="link"
                                                        placeholder="{{ __('Personalized Link') }}" autocomplete="off"
                                                        id="plink" onkeyup="checkLink()" minlength="3" required>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $('.popup_image').magnificPopup({
      type: 'image'
    });
</script>
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