@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])

@section('content')
<?php
$sett = \DB::table('settings')->first();

?>
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
                        {{ __('Settings') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('admin.change.settings') }}" method="post" enctype="multipart/form-data"
                        class="card">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-10">
                                    <div class="row">

                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required"
                                                    for="app_type">{{ __('Application Type') }}</label>
                                                <select name="app_type" id="app_type" class="form-control" required>
                                                    <option value="VCARD"
                                                        {{ $sett->application_type == 'VCARD' ? ' selected' : '' }}>
                                                        {{ __('vCard Only') }}</option>
                                                    <option value="STORE"
                                                        {{ $sett->application_type == 'STORE' ? ' selected' : '' }}>
                                                        {{ __('WhatsApp Store Only') }}</option>
                                                    <option value="BOTH"
                                                        {{ $sett->application_type == 'BOTH' ? ' selected' : '' }}>
                                                        {{ __('Both') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required" for="timezone">{{ __('Timezone') }}</label>
                                                <select name="timezone" id="timezone" class="form-control" required>
                                                    @foreach (timezone_identifiers_list() as $timezone)
                                                    <option value="{{ $timezone }}"
                                                        {{ $config[2]->config_value == $timezone ? ' selected' : '' }}>
                                                        {{ $timezone }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required" for="currency">{{ __('Currency') }}</label>
                                                <select name="currency" id="currency" class="form-control" required>
                                                    @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->iso_code }}"
                                                        {{ $config[1]->config_value == $currency->iso_code ? ' selected' : '' }}>
                                                        {{ $currency->name }} ({{ $currency->symbol }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{--<h2 class="page-title my-3">
                                            {{ __('Default Plan Term Settings') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required"
                                                    for="term">{{ __('Default Plan Term') }}</label>
                                                <select name="term" id="term" class="form-control" required>
                                                    <option value="monthly"
                                                        {{ $config[8]->config_value == 'monthly' ? ' selected' : '' }}>
                                                        {{ __('Monthly') }}</option>
                                                    <option value="yearly"
                                                        {{ $config[8]->config_value == 'yearly' ? ' selected' : '' }}>
                                                        {{ __('Yearly') }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <h2 class="page-title my-3">
                                            {{ __('Cookie Consent Settings') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required"
                                                    for="cookie">{{ __('Cookie Consent Settings') }}</label>
                                                <select name="cookie" id="cookie" class="form-control" required>
                                                    <option value="true"
                                                        {{ env('COOKIE_CONSENT_ENABLED') == 'true' ? ' selected' : '' }}>
                                                        {{ __('Enable') }}</option>
                                                    <option value=""
                                                        {{ env('COOKIE_CONSENT_ENABLED') == '' ? ' selected' : '' }}>
                                                        {{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <h2 class="page-title my-3">
                                            {{ __('Image Upload Limit') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6 mb-2">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="image_limit">{{ __('Size') }} </label>
                                                <input type="number" class="form-control" name="image_limit"
                                                    value="{{ $settings->image_limit['SIZE_LIMIT'] }}"
                                                    placeholder="{{ __('Size') }}..." readonly>
                                            </div>
                                        </div>

                                        <h2 class="page-title my-3">
                                            {{ __('Offline (Bank Transfer) Settings') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Offline (Bank Transfer) Details') }}</label>
                                                <textarea class="form-control" name="bank_transfer" rows="3"
                                                    placeholder="{{ __('Offline (Bank Transfer) Details') }}" required>{{ $config[31]->config_value }}</textarea>
                                            </div>
                                        </div>

                                        <h2 class="page-title my-3">
                                            {{ __('Google reCAPTCHA Settings') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('reCAPTCHA Enable') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" {{ $settings->recaptcha_configuration['RECAPTCHA_ENABLE'] == 'on' ? 'checked' : '' }}
                                                        name="recaptcha_enable">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('reCAPTCHA Site Key') }}</label>
                                                <input type="text" class="form-control" name="recaptcha_site_key"
                                                    value="{{ $settings->recaptcha_configuration['RECAPTCHA_SITE_KEY'] }}"
                                                    placeholder="{{ __('reCAPTCHA Site Key') }}..." readonly>
                                            </div>
                                            <span>{{ __('If you did not get a reCAPTCHA, create a') }} <a
                                                    href="https://www.google.com/recaptcha/about/"
                                                    target="_blank">{{ __('reCAPTCHA') }}</a> </span>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('reCAPTCHA Secret Key') }}</label>
                                                <input type="text" class="form-control" name="recaptcha_secret_key"
                                                    value="{{ $settings->recaptcha_configuration['RECAPTCHA_SECRET_KEY'] }}"
                                                    placeholder="{{ __('reCAPTCHA Secret Key') }}..." readonly>
                                            </div>
                                        </div>--}}

                                        <h2 class="page-title my-3">
                                            {{ __('Google Settings') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Google Analytics ID') }}</label>
                                                <input type="text" class="form-control" name="google_analytics_id"
                                                    value="{{ $settings->google_analytics_id }}"
                                                    placeholder="{{ __('Google Analytics ID') }}..." required>
                                            </div>
                                            <span>{{ __('If you did not get a google analytics id, create a') }} <a
                                                    href="https://analytics.google.com/analytics/web/"
                                                    target="_blank">{{ __('new analytics id.') }}</a> </span>
                                        </div>

                                       {{--  <h2 class="page-title my-3">
                                            {{ __('Google OAuth Settings') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Google Auth Enable') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" {{ $settings->google_configuration['GOOGLE_ENABLE'] == 'on' ? 'checked' : '' }}
                                                        name="google_auth_enable">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Google Client ID') }}</label>
                                                <input type="text" class="form-control" name="google_client_id"
                                                    value="{{ $settings->google_configuration['GOOGLE_CLIENT_ID'] }}"
                                                    placeholder="{{ __('Google CLIENT ID') }}..." readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Google Client Secret') }}</label>
                                                <input type="text" class="form-control" name="google_client_secret"
                                                    value="{{ $settings->google_configuration['GOOGLE_CLIENT_SECRET'] }}"
                                                    placeholder="{{ __('Google CLIENT Secret') }}..." readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Google Redirect') }}</label>
                                                <input type="text" class="form-control" name="google_redirect"
                                                    value="{{ $settings->google_configuration['GOOGLE_REDIRECT'] }}"
                                                    placeholder="{{ __('Google Redirect') }}..." readonly>
                                            </div>
                                        </div>
                                        <span>{{ __('If you did not get a google OAuth Client ID & Secret Key, follow a') }} <a
                                            href="https://support.google.com/cloud/answer/6158849?hl=en#zippy=%2Cuser-consent%2Cpublic-and-internal-applications%2Cauthorized-domains/"
                                            target="_blank">{{ __(' steps') }}</a> </span>
--}}
                                        <h2 class="page-title my-3">
                                            {{ __('Paypal Settings') }}
                                        </h2>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Mode' )}}</label>
                                                <select type="text" class="form-select"
                                                    placeholder="Select a payment mode" id="select-tags-advanced"
                                                    name="paypal_mode" required>
                                                    <option value="sandbox"
                                                        {{ $config[3]->config_value == 'sandbox' ? 'selected' : '' }}>
                                                        {{ __('Sandbox') }}</option>
                                                    <option value="live"
                                                        {{ $config[3]->config_value == 'live' ? 'selected' : '' }}>
                                                        {{ __('Live') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Client Key') }}</label>
                                                <input type="text" class="form-control" name="paypal_client_key"
                                                    value="{{ $config[4]->config_value }}"
                                                    placeholder="{{ __('Client Key') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label" required>{{ __('Secret') }}</label>
                                                <input type="text" class="form-control" name="paypal_secret"
                                                    value="{{ $config[5]->config_value }}"
                                                    placeholder="{{ __('Secret') }}..." required>
                                            </div>
                                        </div>
                                       {{--  <h2 class="page-title my-3">
                                            {{ __('Razorpay Settings') }}
                                        </h2>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Client Key') }}</label>
                                                <input type="text" class="form-control" name="razorpay_client_key"
                                                    value="{{ $config[6]->config_value }}"
                                                    placeholder="{{ __('Client Key') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Secret') }}</label>
                                                <input type="text" class="form-control" name="razorpay_secret"
                                                    value="{{ $config[7]->config_value }}"
                                                    placeholder="{{ __('Secret') }}..." required>
                                            </div>
                                        </div> --}}
                                        <h2 class="page-title my-3">
                                            {{ __('Stripe Settings') }}
                                        </h2>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Publishable Key') }}</label>
                                                <input type="text" class="form-control" name="stripe_publishable_key"
                                                    value="{{ $config[9]->config_value }}"
                                                    placeholder="{{ __('Publishable Key') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Secret') }}</label>
                                                <input type="text" class="form-control" name="stripe_secret"
                                                    value="{{ $config[10]->config_value }}"
                                                    placeholder="{{ __('Secret') }}..." required>
                                            </div>
                                        </div>
                                        <h2 class="page-title my-3">
                                            {{ __('Site Settings') }}
                                        </h2>
                                        {{--<div class="col-md-12 col-xl-12">
                                           <div class="mb-3">
                                                <label class="form-label required">{{ __('Theme Colors') }}</label>
                                                <div class="row g-2">

                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="app_theme" type="radio" value="blue"
                                                                class="form-colorinput-input"
                                                                {{ $config[11]->config_value == 'blue' ? 'checked' : ''  }} />
                                                            <span class="form-colorinput-color bg-blue"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput form-colorinput-light">
                                                            <input name="app_theme" type="radio" value="indigo"
                                                                class="form-colorinput-input"
                                                                {{ $config[11]->config_value == 'indigo' ? 'checked' : ''  }} />
                                                            <span class="form-colorinput-color bg-indigo"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="app_theme" type="radio" value="green"
                                                                class="form-colorinput-input"
                                                                {{ $config[11]->config_value == 'green' ? 'checked' : ''  }} />
                                                            <span class="form-colorinput-color bg-green"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="app_theme" type="radio" value="yellow"
                                                                class="form-colorinput-input"
                                                                {{ $config[11]->config_value == 'yellow' ? 'checked' : ''  }} />
                                                            <span class="form-colorinput-color bg-yellow"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="app_theme" type="radio" value="red"
                                                                class="form-colorinput-input"
                                                                {{ $config[11]->config_value == 'red' ? 'checked' : ''  }} />
                                                            <span class="form-colorinput-color bg-red"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="app_theme" type="radio" value="purple"
                                                                class="form-colorinput-input"
                                                                {{ $config[11]->config_value == 'purple' ? 'checked' : ''  }} />
                                                            <span class="form-colorinput-color bg-purple"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="app_theme" type="radio" value="pink"
                                                                class="form-colorinput-input"
                                                                {{ $config[11]->config_value == 'pink' ? 'checked' : ''  }} />
                                                            <span class="form-colorinput-color bg-pink"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput form-colorinput-light">
                                                            <input name="app_theme" type="radio" value="gray"
                                                                class="form-colorinput-input"
                                                                {{ $config[11]->config_value == 'gray' ? 'checked' : ''  }} />
                                                            <span class="form-colorinput-color bg-muted"></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>--}}

                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Home Banner Image') }} <span
                                                        class="text-danger">
                                                        ({{ __('Recommended size : 728x680') }})</span></div>
                                                <input type="file" class="form-control" name="primary_image"
                                                    placeholder="{{ __('Home Banner Image') }}..."
                                                    accept=".png,.jpg,.jpeg,.gif,.svg" />
                                            </div>
                                        </div>
                                        {{--<div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Login & Register Image') }} <span
                                                        class="text-danger"> ({{ __('Recommended size : 728x680') }})
                                                    </span></div>
                                                <input type="file" class="form-control" name="secondary_image"
                                                    placeholder="{{ __('Login & Register Image') }}..."
                                                    accept=".png,.jpg,.jpeg,.gif,.svg" />
                                            </div>
                                        </div>--}}
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Site Logo') }} <span class="text-danger">
                                                        ({{ __('Recommended size : 180x60') }})</span></div>
                                                <input type="file" class="form-control" name="site_logo"
                                                    placeholder="{{ __('Site Logo') }}..."
                                                    accept=".png,.jpg,.jpeg,.gif,.svg" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Favicon') }} <span class="text-danger">
                                                        ({{ __('Recommended size : 200x200') }})</span></div>
                                                <input type="file" class="form-control" name="favi_icon"
                                                    placeholder="{{ __('Favicon') }}..."
                                                    accept=".png,.jpg,.jpeg,.gif,.svg" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('App Name') }}</label>
                                                <input type="text" class="form-control" name="app_name"
                                                    value="{{ config('app.name') }}"
                                                    placeholder="{{ __('App Name') }}..." readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Site Name') }}</label>
                                                <input type="text" class="form-control" name="site_name"
                                                    value="{{ $settings->site_name }}"
                                                    placeholder="{{ __('Site Name') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('SEO Meta Description') }}</label>
                                                <textarea class="form-control" name="seo_meta_desc" rows="3"
                                                    placeholder="{{ __('SEO Meta Description') }}" required>{{ $settings->seo_meta_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('SEO Keywords') }}</label>
                                                <textarea class="form-control required" name="meta_keywords" rows="3"
                                                    placeholder="{{ __('SEO Keywords (Keyword 1, Keyword 2)') }}" required>{{ $settings->seo_keywords }}</textarea>
                                            </div>
                                        </div>

                                        <h2 class="page-title my-3">
                                            {{ __('Share Content Settings') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Share Content') }}</label>
                                                <textarea class="form-control" name="share_content" id="share_content"
                                                    cols="10" rows="3"
                                                    placeholder="{{ __('Share Content') }}..." required>{{ $config[30]->config_value }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <h2 class="text-danger"> {{ __('Short Codes :') }} </h2>
                                            <span><span class="font-weight-bold">{ business_name }</span> - {{ __('Business Name') }}</span><br>
                                            <span><span class="font-weight-bold">{ business_url }</span> - {{ __('Business URL or Address') }}</span><br>
                                            <span><span class="font-weight-bold">{ appName }</span> - {{ __('App Name') }}</span>
                                        </div>

                                       <h2 class="page-title my-3">
                                            {{ __('Email Configuration Settings') }}
                                        </h2>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Sender Name') }}</label>
                                                <input type="text" class="form-control" name="mail_sender"
                                                    value="{{ $settings->email_configuration['name'] }}"
                                                    placeholder="{{ __('Sender Name') }}..." >
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Sender Email Address') }}</label>
                                                <input type="text" class="form-control" name="mail_address"
                                                    value="{{ $settings->email_configuration['address'] }}"
                                                    placeholder="{{ __('Sender Email Address') }}..." >
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Mailer Driver') }}</label>
                                                <input type="text" class="form-control" name="mail_driver"
                                                    value="{{ $settings->email_configuration['driver'] }}"
                                                    placeholder="{{ __('Mailer Driver') }}..." >
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Mailer Host') }}</label>
                                                <input type="text" class="form-control" name="mail_host"
                                                    value="{{ $settings->email_configuration['host'] }}"
                                                    placeholder="{{ __('Mailer Host') }}..." >
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Mailer Port') }}</label>
                                                <input type="text" class="form-control" name="mail_port"
                                                    value="{{ $settings->email_configuration['port'] }}"
                                                    placeholder="{{ __('Mailer Port') }}..." >
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Mailer Encryption') }}</label>
                                                <input type="text" class="form-control" name="mail_encryption"
                                                    value="{{ $settings->email_configuration['encryption'] }}"
                                                    placeholder="{{ __('Mailer Encryption') }}..." >
                                            </div>
                                        </div>
                                         <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Mailer Username') }}</label>
                                                <input type="text" class="form-control" name="mail_username"
                                                    value="{{ $settings->email_configuration['username'] }}"
                                                    placeholder="{{ __('Mailer Username') }}..." >
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Mailer Password') }}</label>
                                                <input type="password" class="form-control" name="mail_password"
                                                    value="{{ $settings->email_configuration['password'] }}"
                                                    placeholder="{{ __('Mailer Password') }}..." >
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4 mt-3">
                                            <div class="mb-3">
                                                <label class="form-label"></label>
                                                <a href="{{ route('admin.test.email') }}" class="btn btn-primary">
                                                    {{ __('Test Mail') }}
                                                </a>
                                            </div>
                                        </div>

                                        {{--<h2 class="page-title my-3">
                                            {{ __('Tawk Chat Settings') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Tawk Chat URL (s1.src)') }}</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        {{ __('https://embed.tawk.to/') }}
                                                    </span>
                                                    <input type="text" class="form-control" name="tawk_chat_bot_key"
                                                        value="{{ $settings->tawk_chat_bot_key }}"
                                                        placeholder="{{ __('Tawk Chat Key') }}" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-md-6 col-xl-6"></div>
                                        <!-- <span class="text-danger">{{ __('Note: Some fields are disabled due to security reasons. You can change the respective values directly from .env file') }} </span> -->
                                        <div class="col-md-4 col-xl-4 my-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Update') }}
                                                </button>
                                            </div>
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
    @include('admin.includes.footer')
</div>
@endsection
