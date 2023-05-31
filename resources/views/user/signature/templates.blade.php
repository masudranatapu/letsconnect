@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            {{ __('Template') }}
                        </div>
                        <h2 class="page-title">
                            {{ __('Signature Template') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body signature_template">
            <div class="container-xl">
                <div class="row gutters-5 row-deck row-cards">
                    @if($templates)
                        @foreach ($templates as $template)
                            <div class="col-sm-6">
                                <div class="card {{ $template->style_classname }}">
                                    {!! "$template->html_template" !!}

                                    <div class="card-footer text-center">
                                        <a href="{{ route('user.signature.create',['id' => $template->id]) }}">
                                            <i class="fa fa-edit"></i>
                                            Start with this template
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


{{--                    <div class="col-sm-6">--}}
{{--                        <div class="card template_one">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3>Heavy</h3>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="signature_profile mb-3">--}}
{{--                                    <img src="{{ asset('images/1.jpg') }}" alt="">--}}
{{--                                    <h3>Richard L. Doss</h3>--}}
{{--                                    <span>Full-Stack Developer</span>--}}
{{--                                </div>--}}
{{--                                <div class="signature_content">--}}
{{--                                    <div class="social_media mb-3">--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa-solid fa-paper-plane"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa-brands fa-reddit-alien"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="personal_info mb-3">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#"><i class="fa fa-phone"></i> +123 456 7788</a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#"><i class="fa fa-mobile"></i> +123 456 7788</a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#"><i class="fa fa-envelope"></i> marone@letsconnect.com</a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#"><i class="fa fa-rocket"></i> sideproject@letsconnect.com</a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#"><i class="fa fa-star"></i> personalsite@cc</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="address">--}}
{{--                                        <h5>letsconnect.com</h5>--}}
{{--                                        <p>3874 Howard Street <br/> Grand Rapids, Mi 58445</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="footer_text">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem itaque eligendi nesciunt perspiciatis, molestiae error possimus saepe, nihil quasi numquam quisquam commodi consequuntur modi vel, repellat minima, quibusdam ipsam incidunt.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <a href="{{ route('user.signature.edit') }}">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                    Start with this template--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-sm-6">--}}
{{--                        <div class="card template_two">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3>Startup</h3>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="media d-flex position-relative">--}}
{{--                                    <div class="signature_profile">--}}
{{--                                        <img src="{{ asset('images/2.jpg') }}" alt="">--}}
{{--                                        <div class="social_icon">--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <div class="signature_profile mb-4">--}}
{{--                                            <h2>Robert M. Sanders</h2>--}}
{{--                                            <span>Founder & CEO</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="signature_list mb-3">--}}
{{--                                            <span>Phone</span>--}}
{{--                                            <h5>+1 254-987-54858</h5>--}}
{{--                                        </div>--}}
{{--                                        <div class="signature_list mb-3">--}}
{{--                                            <span>Address</span>--}}
{{--                                            <h5>3335 Arthur Avenue - Wood Dale, IL, 6356</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <a href="{{ route('user.signature.edit') }}">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                    Start with this template--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}










{{--                     <div class="col-sm-6">--}}
{{--                        <div class="card template_three">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3>Ochre</h3>--}}
{{--                            </div>--}}
{{--                            <div class="card-body signature">--}}
{{--                                <div class="media d-flex position-relative">--}}
{{--                                    <div class="signature_profile">--}}
{{--                                        <img src="{{ asset('images/3.jpg') }}" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <div class="signature_profile">--}}
{{--                                            <h3>Lonnie S. Heath</h3>--}}
{{--                                            <span>Founder and CEO</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="signature_list mb-3">--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#"><i class="fa fa-phone"></i> +1 254 785 4875</a></li>--}}
{{--                                                <li><a href="#"><i class="fa fa-envelope"></i> lonnie@letsconnect.com</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <div class="social_icon">--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>--}}
{{--                                                <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <div class="address">--}}
{{--                                            <h5>letsconnect.com</h5>--}}
{{--                                            <p>3874 Howard Street <br/> Grand Rapids, Mi 58445</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer text-center">--}}
{{--                                <a href="{{ route('user.signature.edit') }}">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                    Start with this template--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>


        @include('user.includes.footer')
    </div>
@endsection
