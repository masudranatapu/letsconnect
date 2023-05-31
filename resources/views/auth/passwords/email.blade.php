@extends('layouts.web', ['nav' => false, 'banner' => false, 'footer' => false, 'cookie' => false, 'setting' => false, 'title' => true, 'title' => 'Reset Password'])

@section('content')
<section style="background-color:#f5f5f5; height: 100vh;">
    <div class="flex flex-wrap">
        <div class="pt-6 mt-20 lg:pt-16 pb-6 w-full lg:w-1/1">
            <div class="max-w-md mx-auto login_form">
                <div class="mb-6 lg:mb-20 w-full px-3 flex items-center justify-between"><a
                        class="text-3xl font-bold leading-none" href="{{ url('/') }}">{{ config('app.name') }}</a></div>
                <div>
                    <div class="mb-6 px-3">
                        <h3 class="text-2xl font-bold">{{ __('Reset Password') }}</h3>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3 flex p-4 mx-2 bg-gray-200 rounded">
                            <input class="w-full text-xs bg-gray-200 outline-none @error('email') is-invalid @enderror"
                                id="email" type="email" placeholder="{{ __('name@email.com') }}" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                </path>
                            </svg>
                        </div>

                        <div class="px-3 text-center">
                            <button
                                class="mb-2 signin_btn w-full py-4 bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 rounded text-sm font-bold text-gray-50 transition duration-200">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
