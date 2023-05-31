@extends('layouts.web', ['nav' => true, 'banner' => true, 'footer' => true, 'cookie' => true, 'setting' => true, 'config' => $config])
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="stylesheet" href="{{asset('frontend/css/toastr.min.css')}}"/>
    <style>
        .text-danger {
            color: red !important;
        }

        i.fa.fa-times {
            font-size: 10px;
            padding: 3px 5px;
            background: #ed6b4d;
            border-radius: 50%;
            text-align: center;
            color: #161212;
            width: 16px;
            margin: 4px 12px 0px 3px;
            height: 16px;
        }

        .tab_name li {
            margin: 0;
        }

        .pricing_tabs .hover\:text-blue-600 {
            color: #ffffff !important;
            background: #ed6b4d !important;
            border-color: #ed6b4d !important;
        }

        .pricing_tabs .tab_name button {
            border-radius: 0px !important;
            padding: 9px 34px !important;
            border: none !important;
            margin: 0 !important;
            background: #EEE;
        }

        .tab_name {
            text-align: center;
            margin: 0 auto;
            width: 240px;
        }

        .subscribe_form {
            text-align: center;
        }

        .subscribe_section {
            margin-top: 50px;
            padding-bottom: 50px;
        }

        .subscribe_section .lg\:w-1\/2 {
            width: 50%;
            margin: 0 auto;
        }
    </style>
    <section id="how-it-works">
        <div class="skew skew-top mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 0 10 10 0 10"></polygon>
            </svg>
        </div>
        <div class="skew skew-top ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 10 10 0 10 10"></polygon>
            </svg>
        </div>
        <div class="py-20 bg-gray-50 radius-for-skewed">
            <div class="container mx-auto px-4">
                <div class="section_heading text-center mb-12">
                    <h1 class="text-{{ $config[11]->config_value }}-600 font-bold">{{ __($homePage[6]->section_content) }}</h1>
                </div>
                <div class="flex flex-wrap items-center">
                    <div class="work_wrapper w-full lg:w-1/2 flex flex-wrap -mx-4">
                        <div class="mb-8 lg:mb-0 w-full md:w-1/2">
                            <div class="work_item py-6 pl-6 pr-4  bg-white">
                    <span class="mb-4 inline-block p-3 rounded-lg bg-{{ $config[11]->config_value }}-100">
                        <svg class="w-8 h-8 text-{{ $config[11]->config_value }}-600"
                             xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </span>
                                <h4 class="mb-2 text-2xl font-bold font-heading">{{ __($homePage[12]->section_content) }}</h4>
                                <p class="text-gray-500 leading-loose">
                                    {{ __($homePage[13]->section_content) }}</p>
                            </div>
                            <div class="work_item py-6 pl-6 pr-4  bg-white">
                        <span class="mb-4 inline-block p-3 rounded-lg bg-{{ $config[11]->config_value }}-100">
                            <svg class="w-10 h-10 text-{{ $config[11]->config_value }}-600"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewbox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg>
                        </span>
                                <h4 class="mb-2 text-2xl font-bold font-heading">{{ __($homePage[14]->section_content) }}</h4>
                                <p class="text-gray-500 leading-loose">
                                    {{ __($homePage[15]->section_content) }}
                                </p>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="work_item py-6 pl-6 pr-4 bg-white">
                        <span class="mb-4 inline-block p-3 rounded bg-{{ $config[11]->config_value }}-100">
                            <svg class="w-10 h-10 text-{{ $config[11]->config_value }}-600"
                                 xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                                <h4 class="mb-2 text-2xl font-bold font-heading">{{ __($homePage[16]->section_content) }}</h4>
                                <p class="text-gray-500 leading-loose">
                                    {{ __($homePage[17]->section_content) }}</p>
                            </div>
                            <div class="work_item py-6 pl-6 pr-4  bg-white">
                        <span class="mb-4 inline-block p-3 rounded bg-{{ $config[11]->config_value }}-100">
                            <svg class="w-10 h-10 text-{{ $config[11]->config_value }}-600"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                      clip-rule="evenodd"></path>
                                <path
                                    d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z">
                                </path>
                            </svg>
                        </span>
                                <h4 class="mb-2 text-2xl font-bold font-heading">{{ __($homePage[18]->section_content) }}</h4>
                                <p class="text-gray-500 leading-loose">
                                    {{ __($homePage[19]->section_content) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full how_it_work_article lg:w-1/2 mb-12 lg:mb-0">
                        <div class="max-w-md lg:mx-auto">
                            <h2 class="my-2 text-4xl lg:text-5xl font-bold font-heading">
                                {{ __($homePage[7]->section_content) }}</h2>
                            <p class="mb-6 text-gray-500 leading-loose">
                                {{ __($homePage[8]->section_content) }}
                            </p>
                            <ul class="text-gray-500 font-bold">
                                <li class="flex mb-4">
                                    <svg class="mr-2 w-6 h-6 text-{{ $config[11]->config_value }}-700"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewbox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ __($homePage[9]->section_content) }}</span>
                                </li>
                                <li class="flex mb-4">
                                    <svg class="mr-2 w-6 h-6 text-{{ $config[11]->config_value }}-700"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewbox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ __($homePage[10]->section_content) }}</span>
                                </li>
                                <li class="flex mb-4">
                                    <svg class="mr-2 w-6 h-6 text-{{ $config[11]->config_value }}-700"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewbox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ __($homePage[11]->section_content) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="skew skew-bottom mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 0 10 0 0 10"></polygon>
            </svg>
        </div>
        <div class="skew skew-bottom ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 0 10 0 10 10"></polygon>
            </svg>
        </div>
    </section>
    <section id="features" class="features_section">
        <div class="skew skew-top mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewBox="0 0 10 10" preserveAspectRatio="none">
                <polygon fill="currentColor" points="0 0 10 10 0 10"></polygon>
            </svg>
        </div>
        <div class="skew skew-top ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewBox="0 0 10 10" preserveAspectRatio="none">
                <polygon fill="currentColor" points="0 10 10 0 10 10"></polygon>
            </svg>
        </div>
        <div class="py-20 radius-for-skewed">
            <div class="container mx-auto px-4">
                <div class="section_heading mb-16 max-w-md mx-auto text-center">
<span class="text-{{ $config[11]->config_value }}-600 font-bold">
{{ __($homePage[20]->section_content) }}
</span>
                    <h1 class="text-4xl md:text-5xl font-bold">{{ __($homePage[21]->section_content) }}</h1>
                </div>
                <div class="flex ferature_wrapper flex-wrap -mx-4 ">
                    <div class="mb-12 lg:mb-0 w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded feature_item"
                    >
<span
    class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
    <img src="{{ asset('frontend/live.png') }}" width="29px" alt="" style="margin:0 auto;">
    <!-- <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg> -->
    </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[22]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[23]->section_content) }}</p>
                    </div>
                    <div class="mb-12 lg:mb-0 w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded feature_item"
                    >
    <span
        class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[24]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[25]->section_content) }}
                        </p>
                    </div>
                    <div class="mb-12 lg:mb-0 w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded feature_item"
                    >
        <span
            class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[26]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[27]->section_content) }}</p>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded feature_item">
            <span
                class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[28]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[29]->section_content) }}</p>
                    </div>
                </div>
                <div class="flex flex-wrap my-3  -mx-4">
                    <div class="mb-12 lg:mb-0 w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded feature_item"
                    >
                <span
                    class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[30]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[31]->section_content) }}
                        </p>
                    </div>
                    <div class="mb-12 lg:mb-0 w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded feature_item"
                    >
                    <span
                        class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[32]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[33]->section_content) }}</p>
                    </div>
                    <div class="mb-12 lg:mb-0 w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded feature_item"
                    >
                        <span
                            class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                            </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[34]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[35]->section_content) }}
                        </p>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded  feature_item">
                            <span
                                class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[36]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[37]->section_content) }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap my-3  -mx-4">
                    <div class="mb-12 lg:mb-0 w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded  feature_item"
                    >
                                <span
                                    class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                        </svg>
                                    </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[38]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[39]->section_content) }}</p>
                    </div>
                    <div class="mb-12 lg:mb-0 w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded  feature_item"
                    >
                                    <span
                                        class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
                                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[40]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[41]->section_content) }}</p>
                    </div>
                    <div class="mb-12 lg:mb-0 w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded  feature_item"
                    >
                                    <span
                                        class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
                                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                        </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[42]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[43]->section_content) }}
                        </p>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 py-6 bg-white rounded feature_item">
                                        <span
                                            class="mb-4 md:mb-6 inline-block bg-{{ $config[11]->config_value }}-100 p-3 text-{{ $config[11]->config_value }}-500 rounded">
                                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                                </svg>
                                            </span>
                        <h4 class="mb-4 text-2xl font-bold font-heading">{{ __($homePage[44]->section_content) }}</h4>
                        <p class="text-gray-500 leading-loose">
                            {{ __($homePage[45]->section_content) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="skew skew-bottom mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewBox="0 0 10 10" preserveAspectRatio="none">
                <polygon fill="currentColor" points="0 0 10 0 0 10"></polygon>
            </svg>
        </div>
        <div class="skew skew-bottom ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewBox="0 0 10 10" preserveAspectRatio="none">
                <polygon fill="currentColor" points="0 0 10 0 10 10"></polygon>
            </svg>
        </div>
    </section>
    <section id="pricing">
        <div class="skew skew-top mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 0 10 10 0 10"></polygon>
            </svg>
        </div>
        <div class="skew skew-top ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 10 10 0 10 10"></polygon>
            </svg>
        </div>
        <div class="py-20 bg-gray-50 radius-for-skewed">
            <div class="container mx-auto px-4">
                <div class="section_heading max-w-2xl mx-auto text-center mb-16">
                    <div class="sub_title">
                            <span
                                class="text-{{ $config[11]->config_value }}-600 font-bold">{{ __($homePage[46]->section_content) }}</span>
                    </div>
                    <h1 class="mb-2 text-4xl lg:text-5xl font-bold font-heading">{{ __($homePage[47]->section_content) }}</h1>
                    <p class="mb-6 mt-5 text-gray-500">{{ __($homePage[48]->section_content) }}</p>
                </div>
                <div class="pricing_tabs">
                    <div class="rounded">
                        <!-- Tabs -->
                        <div class="tab_name">
                            <ul class="flex flex-wrap" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                @if(count($Monthly_plans))
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-400 border-blue-600 dark:border-blue-500"
                                            id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="true">Monthly
                                        </button>
                                    </li>
                                @endif
                                @if(count($Yearly_plans))
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                            aria-controls="dashboard" aria-selected="false">Yearly
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- Tab Contents -->
                        <div id="myTabContent">
                            <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="p-4">
                                    <div class="flex pricing_wrapper flex-wrap -mx-4">
                                        @php($printed = [])
                                        @if(count($Monthly_plans))
                                            @foreach ($Monthly_plans as $plan)
                                                <div
                                                    class="w-full pricing_box md:w-1/2 lg:w-1/3 px-4 mb-8 lg:mb-0 bg-{{ $plan->recommended == '1' ? $config[11]->config_value.'active' : '' }}"
                                                >
                                                    <!-- <div class="tag_ribbon_wrapper">
                                                        <div class="one_time">
                                                            One Time
                                                        </div>
                                                    </div> -->
                                                    <div class="p-2 rounded">
                                                        <h4
                                                            class="mb-2 text-2xl font-bold {{ $plan->recommended == '1' ? 'text-white' : 'font-heading' }}">
                                                            {{ __($plan->plan_name) }}
                                                        </h4>
                                                        <p class="mt-3 mb-6 leading-loose">
                                                            {{ __($plan->plan_description) }}
                                                        </p>
                                                        <ul class="mb-6">
                                                            @php($features = json_decode($plan->features ?? "[]"))
                                                            @if(count($features) && !in_array($plan->id, $printed))
                                                                @php($printed[] = $plan->id)
                                                                @foreach($features as $feature)
                                                                    <li class="mb-2 flex">
                                                                        <svg
                                                                            class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewbox="0 0 20 20"
                                                                            fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                                  clip-rule="evenodd"></path>
                                                                        </svg>
                                                                        <span>{{ $feature }}</span>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                            <li class="mb-2 flex">
                                                                <svg
                                                                    class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                          clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_vcards == '999' ? 'Unlimited' : $plan->no_of_vcards) }}
                                                                    {{ __('vCards') }}</span>
                                                            </li>
                                                            {{--<li class="mb-2 flex">
                                                                <svg class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_services == '999' ? 'Unlimited' : $plan->no_of_services) }}
                                                                {{ __('Services/Products') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                <svg class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_galleries == '999' ? 'Unlimited' : $plan->no_of_galleries) }}
                                                                {{ __('Galleries') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                <svg class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_features == '999' ? 'Unlimited' : $plan->no_of_features) }}
                                                                {{ __('Card Features') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                <svg class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_payments == '999' ? 'Unlimited' : $plan->no_of_payments) }}
                                                                {{ __('Payment Listed') }}</span>
                                                            </li>--}}
                                                            <li class="mb-2 flex">
                                                                @if($plan->personalized_link == 0)
                                                                    <i class="fa fa-times"></i>
                                                                @else
                                                                    <svg
                                                                        class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600' }}"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewbox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                              clip-rule="evenodd"></path>
                                                                    </svg>
                                                                @endif
                                                                <span>{{ __($plan->personalized_link == 0 ? 'No' : '') }} {{ __('Personalized Link') }}
                                                                    {{ __($plan->personalized_link == 1 ? 'Available' : '') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                @if($plan->hide_branding == 0)
                                                                    <i class="fa fa-times"></i>
                                                                @else
                                                                    <svg
                                                                        class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewbox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                              clip-rule="evenodd"></path>
                                                                    </svg>
                                                                @endif
                                                                <span>{{ __($plan->hide_branding == '0' ? 'No' : '') }} {{ __('LetsConnect Branding') }}
                                                                    {{ __($plan->hide_branding == '1' ? 'Available' : '') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                @if($plan->free_setup == 0)
                                                                    <i class="fa fa-times"></i>
                                                                @else
                                                                    <svg
                                                                        class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewbox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                              clip-rule="evenodd"></path>
                                                                    </svg>
                                                                @endif
                                                                <span>{{ __($plan->free_setup == '0' ? 'No' : '') }} {{ __('Free Setup') }}
                                                                    {{ __($plan->free_setup == '1' ? 'Available' : '') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                @if($plan->free_support == 0)
                                                                    <i class="fa fa-times"></i>
                                                                @else
                                                                    <svg
                                                                        class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewbox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                              clip-rule="evenodd"></path>
                                                                    </svg>
                                                                @endif
                                                                <span>{{ __($plan->free_support == '0' ? 'No' : '') }} {{ __('Free Support') }}
                                                                    {{ __($plan->free_support == '1' ? 'Available' : '') }}</span>
                                                            </li>
                                                        </ul>
                                                        <div
                                                            class="bg-{{ $plan->recommended == '1' ? $config[11]->config_value.'-600' : 'white' }}">
                                                        <span style="padding-left:10px;"
                                                              class="text-3xl font-bold {{ $plan->recommended == '1' ? 'text-white' : '' }}">{{ $plan->plan_price == '0' ? '' : $currency->symbol }}{{ $plan->plan_price == '0' ? 'Free' : $plan->plan_price }}
                                                        </span>
                                                            <span
                                                                class="{{ $plan->recommended == '1' ? 'text-gray-50' : 'text-gray-500' }} text-xs">
                                                            @if ($plan->validity == '9999')
                                                                    {{ __('/') }}{{ __('Forever') }}
                                                      </span>
                                                            @endif

                                                            @if ($plan->validity == '31')
                                                                {{ __('/') }}{{ __('Monthly ') }}
                                                                <sup>one time</sup>
                                                                </span>
                                                                @endif

                                                                @if ($plan->validity == '366')
                                                                {{ __('/') }}{{ __('Yearly') }}</span>
                                                                <sup>one time</sup>
                                                        @endif
                                                        <!--  @if ($plan->validity > '1' && $plan->validity != '31' && $plan->validity != '366' && $plan->validity != '9999')
                                                            {{ '/'.$plan->validity.' '.__('Days') }}</span>
                                            @endif -->
                                                            <a class="inline-block plan_btn text-center py-2 px-4 w-full rounded-l-xl rounded-t-xl bg-blue-600 hover:bg-blue-700 text-white font-bold leading-loose transition duration-200"
                                                               href="{{ route('register',['id'=>$plan->plan_id]) }}">{{ __('Get Started') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="dashboard"
                                 role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="p-4">
                                    <div class="flex pricing_wrapper flex-wrap -mx-4">
                                        @php($printed = [])
                                        @if(count($Yearly_plans))
                                            @foreach ($Yearly_plans as $plan)
                                                <div
                                                    class="w-full pricing_box md:w-1/2 lg:w-1/3 px-4 mb-8 lg:mb-0 bg-{{ $plan->recommended == '1' ? $config[11]->config_value.'active' : '' }}"
                                                >
                                                    <!-- <div class="tag_ribbon_wrapper">
                                                        <div class="one_time">
                                                            One Time
                                                        </div>
                                                    </div> -->
                                                    <div class="p-2 rounded">
                                                        <h4
                                                            class="mb-2 text-2xl font-bold {{ $plan->recommended == '1' ? 'text-white' : 'font-heading' }}">
                                                            {{ __($plan->plan_name) }}
                                                        </h4>
                                                        <p class="mt-3 mb-6 leading-loose">
                                                            {{ __($plan->plan_description) }}
                                                        </p>
                                                        <ul class="mb-6">
                                                            @php($features = json_decode($plan->features ?? "[]"))
                                                            @if(count($features) && !in_array($plan->id, $printed))
                                                                @php($printed[] = $plan->id)
                                                                @foreach($features as $feature)
                                                                    <li class="mb-2 flex">
                                                                        <svg
                                                                            class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewbox="0 0 20 20"
                                                                            fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                                  clip-rule="evenodd"></path>
                                                                        </svg>
                                                                        <span>{{ $feature }}</span>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                            <li class="mb-2 flex">
                                                                <svg
                                                                    class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                          clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_vcards == '999' ? 'Unlimited' : $plan->no_of_vcards) }}
                                                                    {{ __('vCards') }}</span>
                                                            </li>
                                                            {{--<li class="mb-2 flex">
                                                                <svg class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_services == '999' ? 'Unlimited' : $plan->no_of_services) }}
                                                                {{ __('Services/Products') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                <svg class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_galleries == '999' ? 'Unlimited' : $plan->no_of_galleries) }}
                                                                {{ __('Galleries') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                <svg class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_features == '999' ? 'Unlimited' : $plan->no_of_features) }}
                                                                {{ __('Card Features') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                <svg class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ __($plan->no_of_payments == '999' ? 'Unlimited' : $plan->no_of_payments) }}
                                                                {{ __('Payment Listed') }}</span>
                                                            </li>--}}
                                                            <li class="mb-2 flex">
                                                                @if($plan->personalized_link == 0)
                                                                    <i class="fa fa-times"></i>
                                                                @else
                                                                    <svg
                                                                        class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600' }}"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewbox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                              clip-rule="evenodd"></path>
                                                                    </svg>
                                                                @endif
                                                                <span>{{ __($plan->personalized_link == 0 ? 'No' : '') }} {{ __('Personalized Link') }}
                                                                    {{ __($plan->personalized_link == 1 ? 'Available' : '') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                @if($plan->hide_branding == 0)
                                                                    <i class="fa fa-times"></i>
                                                                @else
                                                                    <svg
                                                                        class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewbox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                              clip-rule="evenodd"></path>
                                                                    </svg>
                                                                @endif
                                                                <span>{{ __($plan->hide_branding == '0' ? 'No' : '') }} {{ __('LetsConnect Branding') }}
                                                                    {{ __($plan->hide_branding == '1' ? 'Available' : '') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                @if($plan->free_setup == 0)
                                                                    <i class="fa fa-times"></i>
                                                                @else
                                                                    <svg
                                                                        class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewbox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                              clip-rule="evenodd"></path>
                                                                    </svg>
                                                                @endif
                                                                <span>{{ __($plan->free_setup == '0' ? 'No' : '') }} {{ __('Free Setup') }}
                                                                    {{ __($plan->free_setup == '1' ? 'Available' : '') }}</span>
                                                            </li>
                                                            <li class="mb-2 flex">
                                                                @if($plan->free_support == 0)
                                                                    <i class="fa fa-times"></i>
                                                                @else
                                                                    <svg
                                                                        class="mr-2 w-5 h-5 {{ $plan->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewbox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                              clip-rule="evenodd"></path>
                                                                    </svg>
                                                                @endif
                                                                <span>{{ __($plan->free_support == '0' ? 'No' : '') }} {{ __('Free Support') }}
                                                                    {{ __($plan->free_support == '1' ? 'Available' : '') }}</span>
                                                            </li>
                                                        </ul>
                                                        <div
                                                            class="bg-white">
                                            <span style="padding-left:10px;"
                                                  class="text-3xl font-bold {{ $plan->recommended == '1' ? 'text-white' : '' }}">
                                                {{ $plan->plan_price == '0' ? '' : $currency->symbol }}{{ $plan->plan_price == '0' ? 'Free' : $plan->plan_price }}
                                            </span>
                                                            <span
                                                                class="{{ $plan->recommended == '1' ? 'text-gray-50' : 'text-gray-500' }} text-xs">
                                                @if ($plan->validity == '9999')
                                                                    {{ __('/') }}{{ __('Forever') }}</span>
                                                            @endif
                                                            @if ($plan->validity == '31')
                                                            {{ __('/') }}{{ __('Monthly') }}</span>
                                                            @endif
                                                            @if ($plan->validity == '366')
                                                            {{ __('/') }}{{ __('Yearly') }}</span>
                                                            <sup>one time</sup>
                                                        @endif
                                                        <!--  @if ($plan->validity > '1' && $plan->validity != '31' && $plan->validity != '366' && $plan->validity != '9999')
                                                            {{ '/'.$plan->validity.' '.__('Days') }}</span>
                                @endif -->
                                                            <a class="inline-block plan_btn text-center py-2 px-4 w-full rounded-l-xl rounded-t-xl bg-blue-600 hover:bg-blue-700 text-white font-bold leading-loose transition duration-200"
                                                               href="{{ route('register') }}">{{ __('Get Started') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="skew skew-bottom mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 0 10 0 0 10"></polygon>
            </svg>
        </div>
        <div class="skew skew-bottom ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 0 10 0 10 10"></polygon>
            </svg>
        </div>
    </section>
    <section id="contact">
        <div class="skew skew-top mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewBox="0 0 10 10" preserveAspectRatio="none">
                <polygon fill="currentColor" points="0 0 10 10 0 10"></polygon>
            </svg>
        </div>
        <div class="skew skew-top ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewBox="0 0 10 10" preserveAspectRatio="none">
                <polygon fill="currentColor" points="0 10 10 0 10 10"></polygon>
            </svg>
        </div>
        <div class="bg-gray-50 radius-for-skewed">
            <div class="container section_heading mx-auto px-4">
                <div class="mb-16 max-w-md mx-auto text-center">
                    <h1 class="text-4xl lg:text-5xl font-bold font-heading">{{ $contactPage[0]->section_content }}</h1>
                    <p class="text-gray-500 mt-3">{{ $contactPage[1]->section_content }}</p>
                </div>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 lg:mb-0">
                        <div class="mb-8 lg:mb-0 w-full lg:w-1/1">
                            <div class="py-5 lg:py-5 mb-3 contact_wrap rounded bg-white shadow text-center">
                                <h3 class="mb-8 lg:mb-5 text-3xl font-bold font-heading">{{ $contactPage[2]->section_content }}
                                </h3>
                                <p class="text-gray-400">{{ $contactPage[3]->section_content }}</p>
                                <p class="text-gray-400">{{ $contactPage[4]->section_content }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 lg:mb-0">
                        <div class="mb-8 lg:mb-0 w-full lg:w-1/1">
                            <div class="py-5 lg:py-5 mb-3 contact_wrap rounded bg-white shadow text-center">
                                <h3 class="mb-8 lg:mb-5 text-3xl font-bold font-heading">{{ $contactPage[5]->section_content }}
                                </h3>
                                <p class="text-gray-400">{{ $contactPage[6]->section_content }}</p>
                                <p class="text-gray-400">{{ $contactPage[7]->section_content }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 lg:mb-0">
                        <div class="py-5 lg:py-5 mb-3 contact_wrap w-full rounded bg-white shadow text-center">
                            <h3 class="mb-8 lg:mb-5 text-3xl font-bold font-heading">{{ $contactPage[8]->section_content }}
                            </h3>
                            <div class="flex justify-center">
                                <a class="mr-3" href="{{ $supportPage[1]->section_content }}" target="_blank">
                                    <img class="w-8 h-8" src="{{ asset('frontend/assets/social/facebook.png') }}"
                                         alt="">
                                </a>
                                <a class="mr-3" href="{{ $supportPage[2]->section_content }}" target="_blank">
                                    <img class="w-8 h-8" src="{{ asset('frontend/assets/social/twitter.png') }}"
                                         alt="">
                                </a>
                                <a href="{{ $supportPage[3]->section_content }}" target="_blank">
                                    <img class="w-8 h-8" src="{{ asset('frontend/assets/social/instagram.png') }}"
                                         alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="subscribe_section">
                    <div class="mt-5  mb-7 md:w-1/1 lg:w-1/2 px-4 lg:mb-0">
                    <!-- <form action="{{ route('contact.store') }}" method="post">
@csrf
                        <div class="form-group mb-5">
                        <label class="form-label">First Name</label>
                        <div class="mt-2 flex p-4 bg-gray-200 rounded">
                        <input class="w-full text-xs bg-gray-200 outline-none" id="" type="text"
                        placeholder="Enter first name" name="fname" value="{{ old('fname') }}"
required="">
</div>
@error('fname')
                        <div class="text-danger">{{ $message }}</div>
@enderror
                        </div>
                        <div class="form-group mb-5">
                        <label class="form-label">Last Name</label>
                        <div class="mt-2 flex p-4 bg-gray-200 rounded">
                        <input class="w-full text-xs bg-gray-200 outline-none" id="" type="text"
                        placeholder="Enter Last name" name="lname" value="{{ old('lname') }}"
required="">
</div>
@error('lname')
                        <div class="text-danger">{{ $message }}</div>
@enderror
                        </div>
                        <div class="form-group mb-5">
                        <label class="form-label">Company</label>
                        <div class="mt-2 flex p-4 bg-gray-200 rounded">
                        <input class="w-full text-xs bg-gray-200 outline-none" id="" type="text"
                        placeholder="Enter company name" name="company" value="{{ old('company') }}"
required="">
</div>
@error('company')
                        <div class="text-danger">{{ $message }}</div>
@enderror
                        </div>
                        <div class="form-group mb-5">
                        <label class="form-label">Title</label>
                        <div class="mt-2 flex p-4 bg-gray-200 rounded">
                        <input class="w-full text-xs bg-gray-200 outline-none" id="" type="text"
                        placeholder="Enter title" name="title" value="{{ old('title') }}"
required="">
</div>
@error('title')
                        <div class="text-danger">{{ $message }}</div>
@enderror
                        </div>
                        <div class="form-group mb-5">
                        <label class="form-label">Favorite color</label>
                        <div class="mt-2 flex p-4 bg-gray-200 rounded">
                        <input class="w-full text-xs bg-gray-200 outline-none" id="" type="text"
                        placeholder="Enter favorite color" name="fcolor" value="{{ old('fcolor') }}"
required="">
</div>
@error('fcolor')
                        <div class="text-danger">{{ $message }}</div>
@enderror
                        </div>
                        <div class="form-group mb-5">
                        <label class="form-label">How did we meet?</label>
                        <div class="mt-2">
                        <select name="how_meet" id="" class="form-control p-4 bg-gray-200 rounded"
                            style="width:100%;">
                            <option value="" style="display: none;">Select</option>
                            <option value="online">Online</option>
                            <option value="offline">Offline</option>
                            <option value="facebook">Facebook</option>
                            <option value="youtube">Youtube</option>
                        </select>
@error('how_meet')
                        <div class="text-danger">{{ $message }}</div>
@enderror
                        </div>
                        </div>
                        <div class="form-group mt-4">
                        <button type="submit"
                        class="inline-block banner_btn mb-3 lg:mb-0 lg:mr-3 w-full lg:w-auto py-2 px-6 leading-loose bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200">
                        Submit
                        </button>
                        </div>
                        </form> -->
                        <div class="subscribe_form">
                            <form action="{{route('store.subscribe')}}" method="post">
                                @csrf
                                <h3>Subscribe To Our Newsletter</h3>
                                <div class="flex items-center border border-teal-500 py-2">
                                    <input type="text" name="email"
                                           class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                           placeholder="Enter your email address..." required="">
                                    <button type="submit"
                                            class="inline-block plan_btn text-center py-2 px-4 w-full rounded-l-xl rounded-t-xl bg-blue-600 hover:bg-blue-700 text-white font-bold leading-loose transition duration-200">
                                        Subscribe
                                    </button>
                                </div>
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="skew skew-bottom mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewBox="0 0 10 10" preserveAspectRatio="none">
                <polygon fill="currentColor" points="0 0 10 0 0 10"></polygon>
            </svg>
        </div>
        <div class="skew skew-bottom ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewBox="0 0 10 10" preserveAspectRatio="none">
                <polygon fill="currentColor" points="0 0 10 0 10 10"></polygon>
            </svg>
        </div>
    </section>
    <div class="order_now_fixed">
        <a href="{{route('login')}}">Order Now</a>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
    <script src="{{asset('frontend/js/toastr.min.js')}}"></script>
    <script>
        // price tabs
        const tabElements = [
            {
                id: 'profile',
                triggerEl: document.querySelector('#profile-tab-example'),
                targetEl: document.querySelector('#profile-example')
            },
            {
                id: 'dashboard',
                triggerEl: document.querySelector('#dashboard-tab-example'),
                targetEl: document.querySelector('#dashboard-example')
            }
            ]
    </script>
    <script>
        AOS.init({
            offset: 300,
            duration: 1000,
            once: true,
        });

    </script>
    <script>
        function activeHandle (instead)
        {
            $('.navMenu').removeClass('active');
            $(instead).addClass('active');
        }
        // $('.how').click(function() {
        //
        //
        //
        //
        //
        // });
    </script>
    <script>
        @if(Session::has('contactMsg'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{Session::get('contactMsg')}} ");
                break;
            case 'success':
                toastr.success(" {{Session::get('contactMsg')}} ");
                break;
            case 'warning':
                toastr.warning(" {{Session::get('contactMsg')}} ");
                break;
            case 'error':
                toastr.error(" {{Session::get('contactMsg')}} ");
                break;
        }
        @endif
    </script>
    <!--     <script>
    let tabsContainer = document.querySelector("#tabs");
    let tabTogglers = tabsContainer.querySelectorAll("a");
    console.log(tabTogglers);
    tabTogglers.forEach(function(toggler) {
    toggler.addEventListener("click", function(e) {
    e.preventDefault();
    let tabName = this.getAttribute("href");
    let tabContents = document.querySelector("#tab-contents");
    for (let i = 0; i < tabContents.children.length; i++) {
    tabTogglers[i].parentElement.classList.remove("border-t", "border-r", "border-l", "-mb-px", "bg-white");  tabContents.children[i].classList.remove("hidden");
    if ("#" + tabContents.children[i].id === tabName) {
    continue;
    }
    tabContents.children[i].classList.add("hidden");
    }
    e.target.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px", "bg-white");
    });
    });
    document.getElementById("default-tab").click();
    </script> -->
@endsection
