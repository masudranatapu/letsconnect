@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('css')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- style css -->
<link rel="stylesheet" href="{{ asset('backend/assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
<style>
    a{
        text-decoration: none !important;
    }
</style>

<link rel="stylesheet" href="{{ asset('css/all.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-iconpicker.min.css') }}" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .icon {
        vertical-align: middle !important;
        margin-top: -2px !important;
        margin-left: 6px !important;
    }
    .navbar{
    padding:0px;
    }
    .nav-link-icon svg {
        display: inline-block !important;
    }
</style>
@endsection
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
                        {{ __('Design Your Card') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <form action="{{ route('user.save.social.links', Request::segment(3)) }}" method="post"
                            class="card">
                                @csrf
                                <div class="card-body">
                                    <h2 class="page-title mb-3">
                                        {{ __('Card Features') }}
                                    </h2>
                                    <div class="row">
                                        <div id="more-features" class="row"></div>
                                        <div class="col-lg-12">
                                            <button type="button" onclick="addFeature()" class="btn btn-primary">
                                                {{ __('Add One More Features') }}
                                            </button>
                                        </div>

                                        <div class="col-md-4 col-lg-4 my-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 mb-3">
                            <form action="{{ route('user.save.payment.links', Request::segment(3)) }}" method="post"
                                class="card">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div id="more-payments" class="row"></div>
                                        <h2 class="page-title my-3">
                                            {{ __('Edit Payment Listed ') }}
                                        </h2>
                                        <div class="col-lg-12">
                                            <button type="button" onclick="addPayment()" class="btn btn-primary">
                                                {{ __('Add One More Payments') }}
                                            </button>
                                        </div>

                                        <div class="col-md-4 col-lg-4 my-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 mb-3">
                             <form action="{{ route('user.save.services', Request::segment(3)) }}" method="post" enctype="multipart/form-data" class="card">
                                @csrf
                                <div class="card-body">
                                    <div id="service" class="row">
                                        <h2 class="page-title my-3">
                                            {{ __('Service ') }}
                                        </h2>

                                        <div id="more-services" class="row"></div>

                                        <div class="col-lg-12">
                                            <button type="button" onclick="addService()" class="btn btn-primary">
                                                {{ __('Add One More Service') }}
                                            </button>
                                        </div>
                                        <div class="col-md-4 col-xl-4 my-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </form>
                        </div>
                        <div class="col-12 mb-3">
                             <form action="{{ route('user.save.galleries', Request::segment(3)) }}" method="post" enctype="multipart/form-data" class="card">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div id="gallery" class="row">
                                            <h2 class="page-title my-3">
                                                {{ __('Gallery Image') }}
                                            </h2>

                                            <br>
                                            <div id="more-gallery" class="row"></div>

                                            <div class="col-lg-12">
                                                <button type="button" onclick="addGallery()" class="btn btn-primary">
                                                    {{ __('Add One More Gallery') }}
                                                </button>
                                            </div>
                                            <div class="col-md-4 col-xl-4 my-3">
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Submit') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>       
                        <div class="col-12">
                            <form action="{{ route('user.save.business.hours', Request::segment(3)) }}" method="post"
                            class="card">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="row">

                                            <h2 class="page-title my-3">
                                                {{ __('Always Open') }}
                                            </h2>

                                            <div class="row">
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('24 Hours') }}</div>
                                                        <label class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="always_open">
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-xl-3">

                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Hide Business Hours') }}</div>
                                                        <label class="form-check form-switch">
                                                            <input id="display-hrs" class="form-check-input" type="checkbox"
                                                                onchange="displayBusiness()" name="is_display">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="business-hrs" class="row">

                                                <!-- Monday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Monday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="MondayBusiness()" name="monday_closed">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="monday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="monday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="09:00">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="monday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="18:30">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Tuesday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Tuesday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="TuesdayBusiness()" name="tuesday_closed">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="tuesday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="tuesday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="09:00">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="tuesday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="18:30">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Wednesday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Wednesday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="WednesdayBusiness()" name="wednesday_closed">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="wednesday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="wednesday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="09:00">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="wednesday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="18:30">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Thursday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Thursday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="ThursdayBusiness()" name="thursday_closed">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="thursday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="thursday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="09:00">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="thursday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="18:30">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Friday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Friday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="FridayBusiness()" name="friday_closed">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="friday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="friday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="09:00">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="friday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="18:30">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Saturday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Saturday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="SaturdayBusiness()" name="saturday_closed">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="saturday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="saturday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="09:00">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="saturday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="18:30">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sunday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Sunday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="SundayBusiness()" name="sunday_closed">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="sunday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="sunday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="09:00">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="sunday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="18:30">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 my-3 row">
                                                <div class="mb-3">

                                                    <button type="submit" class="btn float-right btn-primary">
                                                        {{ __('Save') }}
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="template mt-4 mb-4">
                            <div class="container">
                                <div class="row d-flex justify-content-center">
                                    <div class="template_wrapper shadow-md">
                                        <!-- banner -->
                                        <div class="card_banner">
                                            <div class="card_bx">
                                                <img src="{{asset('backend/assets/images/banner.jpg')}}" class="w-100" alt="image">
                                            </div>
                                            <div class="logo">
                                                <img src="{{asset('backend/assets/images/logo.jpg')}}" alt="logo">
                                            </div>
                                            <div class="qr_code">
                                                <a href="#">
                                                    <i class="fa fa-qrcode"></i>
                                                    QR code
                                                </a>
                                            </div>
                                            <div class="custom-shape-divider-bottom-1647452657">
                                                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <!-- profile -->
                                        <div class="profile_info text-center">
                                            <h3>Spencer Bradley Suggs</h3>
                                            <p><a href="#" target="_blank">Founder of marketing consulting</a></p>
                                            <span>Founder</span>
                                        </div>
                                        
                                        <div class="p-3">
                                            <!-- button -->
                                            <div class="primary_group mb-5">
                                                <div class="row g-2 text-center">
                                                    <div class="col-7">
                                                        <div class="primary_btn">
                                                            <button class="btn">
                                                                <i class="fa fa-address-book"></i>ADD TO CONTACTS
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="secondary_btn">
                                                            <button class="btn">
                                                                <i class="fa fa-share-alt"></i>Share
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn">Website</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- social -->
                                            <div class="social_link mb-2 text-center">
                                                <div class="row">
                                                    <div class="col-6 col-sm-4 col-md-3">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-envelope"></i>Email</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 col-sm-4 col-md-3">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-phone"></i>Call</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 col-sm-4 col-md-3">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-comments"></i>Text</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 col-sm-4 col-md-3">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-handshake-o"></i>Connect</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 col-sm-4 col-md-3">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i>LinkedIn</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 col-sm-4 col-md-3">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 col-sm-4 col-md-3">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i>Instagram</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 col-sm-4 col-md-3">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-calendar"></i>Book Me</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- about -->
                                            <div class="about_us">
                                                <div class="heading">
                                                    <h4>About Helix Services Group, LTD</h4>
                                                </div>
                                                <div class="about_details">
                                                    <div class="video mb-3">
                                                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/bMknfKXIFA8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates officiis error impedit quis voluptatibus, iste ducimus tempore quisquam praesentium veniam dolore molestiae architecto voluptatum totam necessitatibus, reiciendis cupiditate. Minus!</p>
                                                    <a class="red_more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- testimonials -->
                                            <div class="testimonial mt-5 mb-5">
                                                <div class="heading text-center">
                                                    <h4>Testimonials</h4>
                                                </div>
                                                <div class="carousel_testimonial">
                                                    <div class="owl-carousel owl-theme text-center">
                                                        <div class="item">
                                                             <div class="carousel_item">
                                                                 <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid eligendi, nostrum quod. Molestias consequatur, odio, facilis architecto iste blanditiis! Nemo ipsum iure, vero ut quam voluptatem quaerat reprehenderit dicta debitis.</p>
                                                                 <h4>Nathan Schnefke</h4>
                                                             </div>
                                                        </div>
                                                         <div class="item">
                                                             <div class="carousel_item">
                                                                 <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid eligendi, nostrum quod. Molestias consequatur, odio, facilis architecto iste blanditiis! Nemo ipsum iure, vero ut quam voluptatem quaerat reprehenderit dicta debitis.</p>
                                                                 <h4>Nathan Schnefke</h4>
                                                             </div>
                                                        </div>
                                                         <div class="item">
                                                             <div class="carousel_item">
                                                                 <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid eligendi, nostrum quod. Molestias consequatur, odio, facilis architecto iste blanditiis! Nemo ipsum iure, vero ut quam voluptatem quaerat reprehenderit dicta debitis.</p>
                                                                 <h4>Nathan Schnefke</h4>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- about -->
                                            <div class="about_us">
                                                <div class="heading">
                                                    <h4>About Spencer Bradley Suggs</h4>
                                                </div>
                                                <div class="about_details">
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates officiis error impedit quis voluptatibus, iste ducimus tempore quisquam praesentium veniam dolore molestiae architecto voluptatum totam necessitatibus, reiciendis cupiditate. Minus!</p>
                                                    <a class="red_more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                                                </div>
                                                <div class="share_btn w-100 mt-5 mb-3">
                                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#shareModal">SHARE MY INFO</button>
                                                </div>
                                                <div class="connect_card text-center">
                                                    <button class="btn"><a href="#" target="_blank">Get Your Connect Card</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="share_modal">
                            <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center mb-5">
                                                <h5>Spencer Bradley Suggs</h5>
                                                <img src="assets/images/spencer.png" alt="image">
                                                <input id="foo" value="https://onetapconnect.com/helix-spencerbradleysuggs/">
                                                <button class="copy_btn" data-clipboard-target="#foo"><i class="fa fa-copy"></i>copy link</button>
                                            </div>
                                            <div class="card_share text-center">
                                                <h3>Share Card</h3>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-comments"></i>Text</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-4">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-envelope"></i>By Email</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-4">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-share-alt"></i>Social Media</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <div class="empty-img"><img
                                    src="{{ asset('backend/img/undraw_printing_invoices_5r4r.svg') }}" height="128"
                                    alt="">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
<script src="{{ asset('backend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/main.js') }}"></script>
<script>
    new ClipboardJS('.copy_btn');
</script>




<script type="text/javascript" src="{{ asset('backend/js/fontawesome-iconpicker.min.js') }}"></script>
<script>
    var count = 0;
    function addFeature() {
	"use strict";
    if (count>={{ $plan_details->no_of_features}}) {
    swal({
        title: 'Oops!',
        icon: 'warning',
        text: 'You have reached your current plan limit.',
        timer: 2000,
        buttons: false,
    });
    }
    else {
        count++;
        var id = getRandomInt();
        var features = "<div class='row' id="+ id +"><div class='col-md-1 col-lg-2'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Icon') }}</label><div class='input-group'><input type='text' class='form-control' placeholder='{{ __('Choose Icon') }}' id='iconpick"+ id +"' onclick='openPicker("+ id +")' name='icon[]' required readonly></div></div></div><div class='col-md-2 col-lg-2'><div class='mb-3 mt-2'><label class='form-label required' for='type'>{{ __('Display type') }}</label><select name='type[]' id='type' class='type"+ id +" form-control' onchange='changeLabel("+ id +")' required> <option value='' disabled selected>{{ __('Choose Type') }}</option><option value='text'>{{ __('Default') }}</option><option value='address'>{{ __('Address') }}</option><option value='email'>{{ __('Email') }}</option><option value='tel'>{{ __('Phone') }}</option><option value='wa'>{{ __('WhatsApp') }}</option><option value='url'>{{ __('Link') }}</option><option value='youtube'>{{ __('Youtube Video') }}</option><option value='map'>{{ __('Google Map') }}</option></select></div></div><div class='col-md-3 col-lg-3'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Label') }}</label><input type='text' class='lbl"+ id +" form-control' name='label[]' placeholder='{{ __('Label') }}...' required></div></div><div class='col-md-4 col-lg-4'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Content') }}</label><input type='text' class='textlbl"+ id +" form-control' name='value[]' placeholder='{{ __('Type Something') }}...' required></div></div><div class='col-lg-1 col-md-1'> <div class='mb-2 pt-1 mt-4'><button type='button' class='btn btn-transparent' onclick='removeFeature("+id+")'><i class='fa fa-times text-danger'></i></button></div></div></div>";
        $("#more-features").append(features).html();
    }
    }

    addFeature();

    function removeFeature(id) {
	"use strict";
    if(count == 1){
        swal({
        title: 'Oops!',
        icon: 'warning',
        text: 'Please add atleast one feature',
        timer: 2000,
        buttons: false,
    });
    }else{
        $("#"+id).remove();
        count--;
    }

    }

    function getRandomInt() {
        min = Math.ceil(0);
        max = Math.floor(9999999999);
        return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
    }

    function openPicker(id){
        "use strict";
        $("#iconpick"+id).iconpicker({ animation:true,hideOnSelect:true, placement: "inline",  templates: {    popover: '<div class="iconpicker-popover popover position-absolute"><div class="arrow"></div>' +
            '<div class="popover-title"></div><div class="popover-content"></div></div>', iconpickerItem: '<a role="button" class="iconpicker-item"><i></i></a>' } });
    }

    function changeLabel(id) {
        "use strict";
        var label = 'Label';
        var textlabel = 'Type Something...';
        let lbl = document.querySelector('.lbl'+id);
        let textlbl = document.querySelector('.textlbl'+id);
        let type = document.querySelector('.type'+id).value;
        console.log(type);
        if(type == 'address') {
            label = "Address";
            textlabel = "For ex: Chennai, Tamilnadu, India";
        } else if(type == 'text') {
            label = "About us";
            textlabel = "For ex: Lorem Ipsum is simply dummy text of...";
        } else if(type == 'email') {
            label = "Email Address";
            textlabel = "For ex: support@website.com";
        } else if(type == 'tel') {
            label = "Phone Number";
            textlabel = "For ex: +919876543210";
        } else if(type == 'wa') {
            label = "WhatsApp";
            textlabel = "For ex: 919876543210";
        } else if(type == 'url') {
            label = "Website";
            textlabel = "For ex: website.com";
        } else if(type == 'youtube') {
            label = "Video Title";
            textlabel = "For ex: https://www.youtube.com/watch?v=li5ths352";
        } else if(type == 'map') {
            label = "California";
            textlabel = "For ex: <iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3924.7798234706065!2d77.98194106479716!3d10.359482142605264!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00ab9baf4b4101%3A0x9d6d57a812be5cc6!2sCapsimint%20Technologies%20-%20Web%2C%20Mobile%20App%20and%20Software%20Development%20Company!5e0!3m2!1sen!2sin!4v1638283593135!5m2!1sen!2sin'></iframe>";
        }

        lbl.placeholder = label;
        textlbl.placeholder = textlabel;
    }

// payment
 function addPayment() {
    "use strict";
    if (count>={{ $plan_details->no_of_payments}}) {
        swal({
        title: 'Oops!',
        icon: 'warning',
        text: 'You have reached your current plan limit.',
        timer: 2000,
        buttons: false,
    });
    }
    else {
        count++;
        var id = getRandomInt();
        var payments = "<div class='row' id="+ id +"><div class='col-md-1 col-lg-2'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Icon') }}</label><div class='input-group'><input type='text' class='form-control' placeholder='{{ __('Choose Icon') }}' id='iconpick"+ id +"' onclick='openPicker("+ id +")' name='icon[]' required readonly></div></div></div><div class='col-md-2 col-lg-2'><div class='mb-3 mt-2'><label class='form-label required' for='type'>{{ __('Display type') }}</label><select name='type[]' id='type' class='type"+ id +" form-control' onchange='changeLabel("+ id +")' required> <option value='' disabled selected>{{ __('Choose Type') }}</option><option value='text'>{{ __('Default') }}</option><option value='url'>{{ __('Link') }}</option></select></div></div><div class='col-md-3 col-lg-3'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Label') }}</label><input type='text' class='lbl"+ id +" form-control' name='label[]' placeholder='{{ __('Label') }}...' required></div></div><div class='col-md-4 mt-1 col-lg-4'><div class='mb-3'><label class='form-label required'>{{ __('Content') }}</label><input type='text' class='textlbl"+ id +" form-control' name='value[]' rows='2' placeholder='{{ __('Type something') }}...' required></div></div><div class='col-lg-1 col-md-1'> <div class='mb-2 pt-1 mt-4'><button class='btn btn-transparent' onclick='removePayment("+id+")'><i class='fa fa-times text-danger'></i></button></div></div></div>";
        $("#more-payments").append(payments).html();
    }
    }

function removePayment(id) {
    "use strict";
        $("#"+id).remove();
        count--;
    }

    function getRandomInt() {
        min = Math.ceil(0);
        max = Math.floor(9999999999);
        return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
    }

    function openPicker(id){
        "use strict";
        $("#iconpick"+id).iconpicker({ animation:true,hideOnSelect:true, placement: "inline",  templates: {    popover: '<div class="iconpicker-popover popover position-absolute"><div class="arrow"></div>' +
            '<div class="popover-title"></div><div class="popover-content"></div></div>', iconpickerItem: '<a role="button" class="iconpicker-item"><i></i></a>' } });
    }

    function changeLabel(id) {
        "use strict";
        var label = 'Label';
        var textlabel = 'Type Something...';
        let lbl = document.querySelector('.lbl'+id);
        let textlbl = document.querySelector('.textlbl'+id);
        let type = document.querySelector('.type'+id).value;
        console.log(type);
        if(type == 'text') {
            label = "UPI or Bank";
            textlabel = "9876543210@upi or 9876543210 or your bank account details";
        } else if(type == 'url') {
            label = "Razorpay";
            textlabel = "For ex: https://rzp.io/i/nxrHnLJ";
        }

        lbl.placeholder = label;
        textlbl.placeholder = textlabel;
    }

// services
 var count = 1;
    var currentSelection = 0;
    function addService() {
    "use strict";
    if (count>={{ $plan_details->no_of_services}}) {
        swal({
            title: 'Oops!',
            icon: 'warning',
            text: 'You have reached your current plan limit.',
            timer: 2000,
            buttons: false,
        });
    }
    else {
        count++;
        var id = getRandomInt();
        var services = "<div class='row' id="+ id +"><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Service Image') }} <span class='text-danger'>({{ __('Recommended : 200 x 200 pixels') }})</span></label><div class='input-group mb-2'><input type='text' class='image"+ id +" media-model form-control' name='service_image[]' placeholder='{{ __('Service Image') }}' required><button class='btn btn-primary btn-md' type='button' onclick='openMedia("+ id +")'>{{ __('Choose image') }}</button></div></div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>Service Name</label> <input type='text' class='form-control' name='service_name[]' placeholder='Service Name' required> </div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>Service Description</label> <input type='text' class='form-control' name='service_description[]' placeholder='Service Description...'' required> </div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label' for='enquiry'>Enquiry Button</label> <select name='enquiry[]' id='enquiry' class='form-control' required> <option value='Enabled'>Enabled</option> <option value='Disabled'>Disabled</option> </select> <a href='#' class='btn mt-3 btn-danger btn-sm' onclick='removeService("+id+")'>Remove</a>  </div> <br></div> </div>";
        $("#more-services").append(services).html();
    }
    }

    function removeService(id) {
    "use strict";
        $("#"+id).remove();
    }

    function getRandomInt() {
        min = Math.ceil(0);
        max = Math.floor(9999999999);
        return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
    }

    function openMedia(id){
        "use strict";
        currentSelection = id;
        $('#openMediaModel').modal('show');
    }

    $(".media_image").on( "click", function() {
        var imgUri = $(this).attr('id');
        $('#openMediaModel').modal('hide');
        $('.image'+currentSelection).val(imgUri);
    });

    // gallery
    var count = 1;
    var currentSelection = 0;
    function addGallery() {
    "use strict";
    if (count>={{ $plan_details->no_of_galleries}}) {
        swal({
            title: 'Oops!',
            icon: 'warning',
            text: 'You have reached your current plan limit.',
            timer: 2000,
            buttons: false,
        });
    }
    else {
        count++;
        var id = getRandomInt();

        var gallery = "<div class='row' id=" + id + "><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Gallery Image') }} <span class='text-danger'>({{ __('Recommended : 200 x 200 pixels') }})</span></label><div class='input-group mb-2'><input type='text' class='image"+ id +" media-model form-control' name='gallery_image[]' placeholder='{{ __('Gallery Image') }}' required><button class='btn btn-primary btn-md' type='button' onclick='openMedia("+ id +")'>{{ __('Choose image') }}</button></div></div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label required'>Image Caption</label> <input type='text' class='form-control' name='caption[]' placeholder='Image Caption...' required> <a href='#' class='btn mt-3 btn-danger btn-sm' onclick='removeGallery(" + id + ")'>Remove</a>  </div><br></div>";
        $("#more-gallery").append(gallery).html();
    }
    }

    function removeGallery(id) {
    "use strict";
        $("#" + id).remove();
    }

    function getRandomInt() {
        min = Math.ceil(0);
        max = Math.floor(9999999999);
        return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
    }

    function openMedia(id){
        "use strict";
        currentSelection = id;
        $('#openMediaModel').modal('show');
    }

    $(".media_image").on( "click", function() {
        var imgUri = $(this).attr('id');
        $('#openMediaModel').modal('hide');
        $('.image'+currentSelection).val(imgUri);
    });

    // Business hours

     function displayBusiness() {
                "use strict";
                var disp = $('input[name="is_display"]:checked').length;
                console.log(disp);
                if (disp == 0) {
                    $("#business-hrs").show();
                } else {
                    $("#business-hrs").hide();

                }
            }

            function MondayBusiness() {
                "use strict";
                var monday = $('input[name="monday_closed"]:checked').length;
                console.log(monday);
                if (monday == 0) {
                    $("#monday-business").show();
                } else {
                    $("#monday-business").hide();

                }
            }

            function TuesdayBusiness() {
                "use strict";
                var tuesday = $('input[name="tuesday_closed"]:checked').length;
                console.log(tuesday);
                if (tuesday == 0) {
                    $("#tuesday-business").show();
                } else {
                    $("#tuesday-business").hide();

                }
            }

            function WednesdayBusiness() {
                "use strict";
                var wednesday = $('input[name="wednesday_closed"]:checked').length;
                console.log(wednesday);
                if (wednesday == 0) {
                    $("#wednesday-business").show();
                } else {
                    $("#wednesday-business").hide();

                }
            }

            function ThursdayBusiness() {
                "use strict";
                var thursday = $('input[name="thursday_closed"]:checked').length;
                console.log(thursday);
                if (thursday == 0) {
                    $("#thursday-business").show();
                } else {
                    $("#thursday-business").hide();

                }
            }

            function FridayBusiness() {
                "use strict";
                var friday = $('input[name="friday_closed"]:checked').length;
                console.log(friday);
                if (friday == 0) {
                    $("#friday-business").show();
                } else {
                    $("#friday-business").hide();

                }
            }

            function SaturdayBusiness() {
                "use strict";
                var saturday = $('input[name="saturday_closed"]:checked').length;
                console.log(saturday);
                if (saturday == 0) {
                    $("#saturday-business").show();
                } else {
                    $("#saturday-business").hide();

                }
            }

            function SundayBusiness() {
                "use strict";
                var sunday = $('input[name="sunday_closed"]:checked').length;
                console.log(sunday);
                if (sunday == 0) {
                    $("#sunday-business").show();
                } else {
                    $("#sunday-business").hide();

                }
            }

</script>
@endpush
@endsection
