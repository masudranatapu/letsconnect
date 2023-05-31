<section>
    <nav class="main_menu relative px-6 py-6 flex justify-between items-center bg-white custom-menu">
        <a class="text-dark text-3xl font-bold leading-none" href="{{ url('/') }}"><img class="h-12"
                src="{{ $settings->site_logo }}" alt="{{ $settings->site_name }}" width="auto"></a>
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-dark p-3">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
        <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
            <li>
                <a class="text-sm {{request()->is('/') ? 'active' : ''}} font-bold hover:text-dark text-dark navMenu" onclick="activeHandle(this)" href="{{ route('home-locale') }}">{{ __('Home') }}</a>
            </li>
            <li>
                <a class="text-sm font-bold hover:text-dark text-dark @yield('about')" href="{{ route('about') }}">{{ __('About') }}</a>
            </li>
            <li>
                @if (request()->is('/') != false)
                    <a class="text-sm font-bold hover:text-dark navMenu text-dark" onclick="activeHandle(this)" href="#how-it-works">{{ __('How it works')
                    }}</a>
            </li>
            @else
            <a class="text-sm font-bold hover:text-dark text-dark" onclick="activeHandle(this)" href="{{ route('home-locale') }}#how-it-works">{{
                __('How it works') }}</a></li>
            @endif
            <li>
                @if (request()->is('/') != false)
                <a class="text-sm font-bold hover:text-dark text-dark navMenu" onclick="activeHandle(this)" href="#features">{{ __('Features') }}</a>
                @else
                <a class="text-sm font-bold hover:text-dark text-dark navMenu" onclick="activeHandle(this)" href="{{ route('home-locale') }}#features">{{
                    __('Features') }}</a>
                @endif
            </li>
            <li>
                @if (request()->is('/') != false)
                <a class="text-sm font-bold hover:text-dark text-dark navMenu" onclick="activeHandle(this)" href="#pricing">{{ __('Pricing') }}</a>
                @else
                <a class="text-sm font-bold hover:text-dark text-dark navMenu" onclick="activeHandle(this)" href="{{ route('home-locale') }}#pricing">{{
                    __('Pricing') }}</a>
                @endif
            </li>
            <li>
                <a class="text-sm font-bold hover:text-dark text-dark  @yield('blog') @yield('blog_details')" href="{{route('blog')}}">{{ __('Blog') }}</a>
            </li>
            <li>
                @if (request()->is('/') != false)
                    <a class="text-sm font-bold hover:text-dark text-dark navMenu" onclick="activeHandle(this)" href="#contact">{{ __('Contact') }}</a>
                @else
                    <a class="text-sm font-bold hover:text-dark text-dark navMenu" onclick="activeHandle(this)" href="{{ route('home-locale') }}#contact">{{ __('Contact') }}</a>
                @endif

            </li>
        </ul>

        <div class="hidden lg:inline-block">
            @guest
            <a class="hidden nav_btn_two lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-sm text-white font-bold rounded-l-xl rounded-t-xl transition duration-200"
               href="{{ route('login') }}">{{ __('Sign In') }}</a>
            <a class="hidden nav_btn_one lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-sm text-white font-bold rounded-l-xl rounded-t-xl transition duration-200"
                href="{{ route('register') }}">{{ __('Sign Up') }}</a>
            @else
            <a class="hidden nav_btn_one lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-sm text-white font-bold rounded-l-xl rounded-t-xl transition duration-200"
                href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
            @endguest

            <!-- Languages Dropdown -->
             @if(count(config('app.languages')) > 1)
                <div @click.away="open = false" @click="open = !open"
                    class="hidden cursor-pointer lg:inline-block px-2 block text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded transition duration-200"
                    x-data="{ open: false }">
                    <a class="text-sm offcanvas_lang font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 hover:text-white focus:text-gray-900 hover:bg-transparent focus:bg-gray-200 focus:outline-none focus:shadow-outline" style="margin-top:0px !important;">
                        <span>{{ strtoupper(app()->getLocale()) }}</span>
                    </a>
                    <div x-show="open" id="journal-scroll" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full h-80 overflow-y-scroll mt-2 origin-top-right rounded-lg shadow-lg md:w-40">
                        <div class="px-2 lang_list py-2 bg-white capitalize rounded-sm shadow dark-mode:bg-gray-800">
                            @foreach(config('app.languages') as $langLocale => $langName)
                            <a class="block px-4 py-2 mt-2 text-sm capitalize font-semi-bold bg-transparent rounded-sm dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="{{ url()->current() }}?change_language={{ $langLocale }}">{{
                            strtoupper($langName) }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
             @endif















            {{--
            @if(count(config('app.languages')) > 1)

             <div @click.away="open = false" class="hidden cursor-pointer lg:inline-block px-2 transition duration-200"
                x-data="{ open: false }">
                <a  @click="open = !open"
                    class="nav_btn_two px-6 py-2 font-semibold text-dark text-center bg-gray-200 rounded-l-xl rounded-t-xl dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 hover:text-dark focus:text-gray-900 hover:bg-gray-300 focus:bg-gray-300 focus:outline-none focus:shadow-outline">
                    <span>{{ strtoupper(app()->getLocale()) }}</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <div x-show="open" id="journal-scroll" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="fixed w-full shadow-lg">
                    <div class="language_dropdown px-2 py-2 bg-white capitalize rounded-sm shadow dark-mode:bg-gray-800" sty>
                        @foreach(config('app.languages') as $langLocale => $langName)
                        <a class="block px-4 py-2 mt-2 text-sm capitalize font-semi-bold bg-transparent rounded-sm dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ url()->current() }}?change_language={{ $langLocale }}">
                                {{ strtoupper($langName) }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            --}}
        </div>


    </nav>
    @if (isset($banner) && $banner && !request()->is('plan'))
    <div class="bg-white banner_wrapper">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-4">
                <div class="hidden lg:block w-full lg:w-1/2 px-4 flex items-center justify-center">
                    <div class="relative web-index">
                        <img class="h-128 w-full max-w-lg object-cover rounded-3xl md:rounded-br-none"
                            src="{{ url('/') }}{{ $config[12]->config_value }}" alt="">

                            <img class="hidden md:block absolute web-nav-top">
                    </div>
                </div>
                <div class="w-full lg:w-1/2 px-4 mb-12 md:mb-20 lg:mb-0 flex items-center">
                    <div class="w-full text-center lg:text-left">
                        <div class="max-w-md mx-auto lg:mx-0">
                            <h2 class="mb-3 banner_title text-4xl lg:text-5xl text-white font-bold">
                                <span class="text-{{ $config[11]->config_value }}-500">{{
                                    __($homePage[0]->section_content) }}</span>
                            </h2>
                        </div>
                        <div class="max-w-sm mx-auto lg:mx-0">
                            <p class="mb-6 text-gray-800 leading-loose">
                                {{ __($homePage[1]->section_content) }}
                            </p>
                            <div>
                                <a class="inline-block banner_btn mb-3 lg:mb-0 lg:mr-3 w-full lg:w-auto py-2 px-6 leading-loose bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200"
                                    href="{{ route('register') }}">{{
                                    __($homePage[2]->section_content) }}</a>
                                    <a
                                    class="inline-block banner_btn_two w-full lg:w-auto py-2 px-6 leading-loose text-white font-semibold bg-gray-900 border-2 border-gray-700 hover:border-gray-600 rounded-l-xl rounded-t-xl transition duration-200"
                                    href="{{ $homePage[5]->section_content }}">{{ __($homePage[4]->section_content)
                                    }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-shape-divider-bottom-1647107584">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>

    </div>
    @endif
    <div class="hidden navbar-menu relative z-50">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed offcanvas_menu top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="{{ url('/') }}"><img class="h-10"
                        src="{{ $settings->site_logo }}" alt="{{ $settings->site_name }}" width="auto"></a>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('home-locale') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="mb-1">
                        <a class="@yield('about') block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('about') }}">{{ __('About') }}</a>
                    </li>
                    <li class="mb-1">
                        @if (request()->is('/') != false)
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="#how-it-works">{{ __('How it works') }}</a>
                        @else
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('home-locale') }}#how-it-works">{{ __('How it works') }}</a>
                        @endif
                    </li>
                    <li class="mb-1">
                        @if (request()->is('/') != false)
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="#features">{{ __('Features') }}</a>
                        @else
                             <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('home-locale') }}#features">{{ __('Features') }}</a>
                        @endif
                    </li>
                    <li class="mb-1">
                        @if (request()->is('/') != false)
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="#pricing">{{ __('Pricing') }}</a>
                        @else
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('home-locale') }}#pricing">{{ __('Pricing') }}</a>
                        @endif
                    </li>

                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                           href="{{route('blog')}}">{{ __('Blog') }}</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="#contact">{{ __('Contact') }}</a>
                    </li>

                   {{--  <li class="mb-1">
                        @if (request()->is('/') != false)
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="#features">{{ __('Features') }}</a>
                        @else
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('home-locale') }}#features">{{ __('Features') }}</a>
                        @endif
                    </li>
                    <li class="mb-1">
                        @if (request()->is('/') != false)
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="#pricing">{{ __('Pricing') }}</a>
                        @else
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('home-locale') }}#pricing">{{ __('Pricing') }}</a>
                        @endif
                    </li>
                --}}

                    @if(count(config('app.languages')) > 1)

                    <div @click.away="open = false" @click="open = !open"
                        class="block text-sm font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded transition duration-200"
                        x-data="{ open: false }">
                        <a
                            class="text-sm offcanvas_lang font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 hover:text-white focus:text-gray-900 hover:bg-transparent focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>{{ strtoupper(app()->getLocale()) }}</span>

                        </a>
                        <div x-show="open" id="journal-scroll" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 w-full h-80 overflow-y-scroll mt-2 origin-top-right rounded-lg shadow-lg md:w-40">
                            <div class="px-2 lang_list py-2 bg-white capitalize rounded-sm shadow dark-mode:bg-gray-800">
                                @foreach(config('app.languages') as $langLocale => $langName)
                                <a class="block px-4 py-2 mt-2 text-sm capitalize font-semi-bold bg-transparent rounded-sm dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="{{ url()->current() }}?change_language={{ $langLocale }}">{{
                                    strtoupper($langName) }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                </ul>
            </div>
            <div class="mt-auto">
                <div class="pt-6 offcanvas_btn">
                    @guest
                    <a class="block px-4 py-3 mb-3 leading-loose text-white text-xs text-center font-semibold leading-none bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 rounded-l-xl rounded-t-xl"
                       style="background-color: #363f4d;" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                    <a class="block px-4 py-3 mb-3 leading-loose text-white text-xs text-center font-semibold leading-none bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 rounded-l-xl rounded-t-xl"
                        href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                    @else
                    <a class="block px-4 py-3 mb-3 leading-loose text-white text-xs text-center font-semibold leading-none bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 rounded-l-xl rounded-t-xl"
                        href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                    @endguest
                </div>
                <p class="my-4 offcanvas_copyright text-xs text-center text-{{ $config[11]->config_value }}-400">
                    <span><span id="year"></span> {{ $settings->site_name }}. {{ __('All rights reserved.') }}</span>
                </p>
                <div class="text-center offcanvas_social">
                    <a class="inline-block px-1" href="{{ $supportPage[1]->section_content }}"
                        target="_blank"><img src="{{ asset('frontend/assets/social/facebook.png') }}" height="10" alt=""></a><a
                        class="inline-block px-1" href="{{ $supportPage[2]->section_content }}" target="_blank"><img
                            src="{{ asset('frontend/assets/social/twitter.png') }}" style="height: 40px !important;" alt=""></a><a
                        class="inline-block px-1" href="{{ $supportPage[3]->section_content }}" target="_blank"><img
                            src="{{ asset('frontend/assets/social/instagram.png') }}" style="height: 40px !important;" alt=""></a></div>
            </div>
        </nav>
    </div>
</section>
