@extends('layouts.web', ['nav' => true, 'banner' => true, 'footer' => true, 'cookie' => true, 'setting' => true, 'config' => $config])
@section('content')
<style>i.fa.fa-times {font-size: 10px;padding: 3px 5px;background: #ed6b4d;border-radius: 50%;text-align: center;color: #161212;width: 16px;margin: 4px 12px 0px 3px;height: 16px;}span.text-gray-50.text-xs {color: rgba(107,114,128,var(--tw-text-opacity));}</style>
    <section id="pricing">
        <div class="py-20 bg-gray-50 radius-for-skewed">
            <div class="container mx-auto px-4">
                <div class="pricing_tabs">
                    <div class="rounded">
                        <div id="myTabContent">
                            <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="p-4">
                                    <div class="flex pricing_wrapper flex-wrap -mx-4">
                                        @php($printed = [])
                                        @if($plan_details)
                                            <div class="w-full pricing_box md:w-1/2 lg:w-1/3 px-4 mb-8 lg:mb-0 bg-{{ $plan_details->recommended == '1' ? $config[11]->config_value.'active' : '' }}">
                                                <div class="p-2 rounded">
                                                    <h4 class="mb-2 text-2xl font-bold {{ $plan_details->recommended == '1' ? 'text-white' : 'font-heading' }}">
                                                        {{ __($plan_details->plan_name) }}
                                                    </h4>
                                                    <p class="mt-3 mb-6 leading-loose">
                                                        {{ __($plan_details->plan_description) }}
                                                    </p>
                                                    <ul class="mb-6">
                                                        @php($features = json_decode($plan_details->features ?? "[]"))
                                                        @if(count($features) && !in_array($plan_details->id, $printed))
                                                            @php($printed[] = $plan_details->id)
                                                            @foreach($features as $feature)
                                                                <li class="mb-2 flex">
                                                                    <svg
                                                                        class="mr-2 w-5 h-5 {{ $plan_details->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
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
                                                                class="mr-2 w-5 h-5 {{ $plan_details->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewbox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                      clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span>{{ __($plan_details->no_of_vcards == '999' ? 'Unlimited' : $plan_details->no_of_vcards) }}
                                                                {{ __('vCards') }}</span>
                                                        </li>
                                                        <li class="mb-2 flex">
                                                            @if($plan_details->personalized_link == 0)
                                                                <i class="fa fa-times"></i>
                                                            @else
                                                                <svg
                                                                    class="mr-2 w-5 h-5 {{ $plan_details->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600' }}"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                          clip-rule="evenodd"></path>
                                                                </svg>
                                                            @endif
                                                            <span>{{ __($plan_details->personalized_link == 0 ? 'No' : '') }} {{ __('Personalized Link') }}
                                                                {{ __($plan_details->personalized_link == 1 ? 'Available' : '') }}</span>
                                                        </li>
                                                        <li class="mb-2 flex">
                                                            @if($plan_details->hide_branding == 0)
                                                                <i class="fa fa-times"></i>
                                                            @else
                                                                <svg
                                                                    class="mr-2 w-5 h-5 {{ $plan_details->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                          clip-rule="evenodd"></path>
                                                                </svg>
                                                            @endif
                                                            <span>{{ __($plan_details->hide_branding == '0' ? 'No' : '') }} {{ __('LetsConnect Branding') }}
                                                                {{ __($plan_details->hide_branding == '1' ? 'Available' : '') }}</span>
                                                        </li>
                                                        <li class="mb-2 flex">
                                                            @if($plan_details->free_setup == 0)
                                                                <i class="fa fa-times"></i>
                                                            @else
                                                                <svg
                                                                    class="mr-2 w-5 h-5 {{ $plan_details->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                          clip-rule="evenodd"></path>
                                                                </svg>
                                                            @endif
                                                            <span>{{ __($plan_details->free_setup == '0' ? 'No' : '') }} {{ __('Free Setup') }}
                                                                {{ __($plan_details->free_setup == '1' ? 'Available' : '') }}</span>
                                                        </li>
                                                        <li class="mb-2 flex">
                                                            @if($plan_details->free_support == 0)
                                                                <i class="fa fa-times"></i>
                                                            @else
                                                                <svg
                                                                    class="mr-2 w-5 h-5 {{ $plan_details->recommended == '1' ? 'text-'.$config[11]->config_value.'-400' : 'text-'.$config[11]->config_value.'-600'}}"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewbox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                          clip-rule="evenodd"></path>
                                                                </svg>
                                                            @endif
                                                            <span>{{ __($plan_details->free_support == '0' ? 'No' : '') }} {{ __('Free Support') }}
                                                                {{ __($plan_details->free_support == '1' ? 'Available' : '') }}</span>
                                                        </li>
                                                    </ul>
                                                        <div
                                                            class="bg-white">
                                                        <span style="padding-left:10px;"
                                                              class="text-3xl font-bold text-black">{{ $plan_details->plan_price == '0' ? '' : $currency->symbol }}{{ $plan_details->plan_price == '0' ? 'Free' : $plan_details->plan_price }}
                                                        </span>
                                                            <span
                                                                class="{{ $plan_details->recommended == '1' ? 'text-gray-50' : 'text-gray-500' }} text-xs">
                                                            @if ($plan_details->validity == '9999')
                                                                    {{ __('/') }}{{ __('Forever') }}
                                                      </span>
                                                            @endif

                                                            @if ($plan_details->validity == '31')
                                                                {{ __('/') }}{{ __('Monthly ') }}
                                                                <sup>one time</sup>
                                                                </span>
                                                                @endif

                                                                @if ($plan_details->validity == '366')
                                                                {{ __('/') }}{{ __('Yearly') }}</span>
                                                                <sup>one time</sup>
                                                        @endif
                                                            <a class="inline-block plan_btn text-center py-2 px-4 w-full rounded-l-xl rounded-t-xl bg-blue-600 hover:bg-blue-700 text-white font-bold leading-loose transition duration-200"
                                                               href="{{ route('register',['id'=>$plan_details->plan_id]) }}">{{ __('Get Started') }}</a>

                                                        </div>
                                                    </div>
                                                </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
