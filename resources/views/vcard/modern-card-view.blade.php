<style>
    .connect_card p {
        font-size: 12px;
    }
    .share_modal span.at-label {
            display: none !important;
        }
    .share_modal .at-share-btn-elements {
        text-align: center;
    }

    .main_template {
        border-radius: 10px;
        max-width: 500px;
        padding: 0;
        margin: 20px auto;
    }
    .connect_card.text-center p {
        margin-bottom: 0px;
    }

    .card.modern-card {
        padding: 0px 0px;
    }

    @media screen and (max-width: 500px) {
        .main_template {
            margin: 0 auto;
        }

        .main_template .card {
            border-radius: 0px
        }
    }
    .contact_form .btn {
        background: #1c1b1a !important;
        padding: 10px 32px;
    }
    button.btn.btn-primary {
        background: #1c1b1a !important;
    }
    .contact_form .form-control {
        border: 1px solid #CCC;
        border-radius: 2px;
        font-size: 14px;
        height: 42px;
        box-shadow: none !important;
    }
    .contact_form #msg_form{
        height: 120px;
        border: 1px solid #CCC;
        border-radius: 2px;
        font-size: 14px;
        box-shadow: none !important;
    }

    @media screen and (max-width:380px){
        .social_link ul li i {
            display: block;
            font-size: 15px;
            padding-bottom: 7px;
            width: 37px;
            height: 37px;
            background: #2e2d2d;
            margin: 0 auto;
            border-radius: 6px;
            padding-top: 11px;
            margin-bottom: 4px;
            color: #fff;
        }

        .social_link ul li a {
            color: #222;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
        }
        
    }
</style>
<div class="card modern-card">
    <div class="template">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="template_wrapper shadow-md">
                    <!-- banner -->
                    <div class="card_banner">
                        <div class="card_bx">
                            <img src="{{$card->cover}}"
                                 class="w-100" alt="image">
                        </div>
                        <div class="logo">
                            <img src="{{$card->profile}}" alt="logo">
                        </div>
                        <div class="qr_code">
                            <a target="_blank" href="#" data-bs-toggle="modal"
                               data-bs-target="#shareModal">
                                <i class="fa fa-qrcode" style="background-color: {{ $card->theme_color }}"></i>
                                QR code
                            </a>
                        </div>
                        <div class="custom-shape-divider-bottom-1647452657">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path
                                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                                    class="shape-fill"></path>
                            </svg>
                        </div>
                    </div>
                    <!-- profile -->
                    <div class="profile_info text-center">
                        <h3 id="name_holder">{{ $data['name'] ?? 'Spencer Bradley Suggs' }}</h3>
                        <p><a target="_blank" href="{{ $data['website'] ?? "#" }}" id="designation_holder">{{ $data['designation'] ?? "Founder of
                                marketing consulting" }}</a></p>
                    </div>
                    <div class="p-3">
                        <!-- button -->
                        <div class="primary_group mb-5">
                            <div class="row g-2 text-center">
                                <div class="col-7">
                                    <div class="primary_btn">
                                        <button onclick="window.open('{{ route('download.vCard', $card->card_id) }}', '_blank')" class="btn btn-success">Add to Contacts <i class="fa fa-download"></i></button>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="secondary_btn">
                                        <button class="btn" data-bs-toggle="modal"
                                                style="background-color: {{ $card->theme_color }}"
                                                data-bs-target="#shareModal">
                                            <i class="fa fa-share-alt"></i>Share
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span class="btn" style="background-color: {{ $card->theme_color }}">
                                        <a target="_blank" href="{{ $data['website'] ?? "#" }}">Visit my Website</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- social icon -->
                        <div class="social_link mb-2 text-center">
                            @if(!count($iconData) && !isset($live))
                                <div class="row">
                                    <div class="col-4 col-sm-3">
                                        <ul>
                                            <li>
                                                <a target="_blank" href="mailto:info@gmail.com"><i
                                                        class="fa fa-envelope"></i>Email</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <ul>
                                            <li><a target="_blank" href="#"><i
                                                        class="fa fa-phone"></i>Call</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <ul>
                                            <li><a target="_blank" href="tel:972-742-0702"><i
                                                        class="fa fa-comments"></i>Text</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <ul>
                                            <li><a target="_blank" href="#"><i
                                                        class="fa fa-handshake-o"></i>Connect</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <ul>
                                            <li><a target="_blank" href="https://www.linkedin.com/"><i
                                                        class="fa fa-linkedin"></i>LinkedIn</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <ul>
                                            <li><a target="_blank" href="https://www.facebook.com/"><i
                                                        class="fa fa-facebook"></i>Facebook</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <ul>
                                            <li><a target="_blank" href="https://www.instagram.com/"><i
                                                        class="fa fa-instagram"></i>Instagram</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <ul>
                                            <li><a target="_blank" href="#"><i
                                                        class="fa fa-calendar"></i>Book Me</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="row g-0" id="card-dummy-links">
                                    @foreach($iconData as $key => $dat)
                                        <div class="col-3">
                                            <ul>
                                                <li><a target="_blank" href="{{ $dat['value'] }}"><i
                                                            class="{{ $dat['icon'] }}"
                                                            style="background-color: {{ $card->theme_color }}"></i>{{ $key == 'comment' ? ucwords("text") : ucwords($key) }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <!-- about -->
                        <div class="about_us">

                            @if(isset($live))
                                @if(isset($data['videos']) && count($data['videos']))
                                    @foreach($data['videos'] as $video)
                                        <div class="heading">
                                            <h4>{{ $video["title"] }}</h4>
                                        </div>
                                        <div class="about_details">
                                            <div class="video mb-3">
                                                <iframe width="100%" height="300"
                                                        src="{{ $video["url"] }}"
                                                        title="{{ $video["title"] }}" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                            </div>
                                            <p>{{ $video["description"] }}</p>
                                        </div>
                                    @endforeach
                                @endif
                            @else
                                @if(isset($data['videos']) && count($data['videos']))
                                    @foreach($data['videos'] as $video)
                                        <div class="heading">
                                            <h4>{{ $video["title"] }}</h4>
                                        </div>
                                        <div class="about_details">
                                            <div class="video mb-3">
                                                <iframe width="100%" height="300"
                                                        src="{{ $video["url"] }}"
                                                        title="{{ $video["title"] }}" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                            </div>
                                            <p>{{ $video["description"] }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="heading">
                                        <h4>About {{ $video["name"] ?? "" }}</h4>
                                    </div>
                                    <div class="about_details">
                                        <div class="video mb-3">
                                            <iframe width="100%" height="300"
                                                    src="https://www.youtube.com/embed/bMknfKXIFA8"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Quam
                                            voluptates officiis error impedit quis voluptatibus,
                                            iste
                                            ducimus tempore quisquam praesentium veniam dolore
                                            molestiae
                                            architecto voluptatum totam necessitatibus, reiciendis
                                            cupiditate. Minus!</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <!-- testimonials -->

                        <div class="testimonial mt-5 mb-5">
                            @isset($live)
                                @if(isset($data['testimonials']) && count($data['testimonials']))
                                    <div class="heading text-center">
                                        <h4>Testimonials</h4>
                                    </div>
                                @endif
                            @else
                                <div class="heading text-center">
                                    <h4>Testimonials</h4>
                                </div>
                            @endisset
                            @if(!isset($data['testimonials']) || !count($data['testimonials']))
                                @if(!isset($live))
                                    <div class="carousel_testimonial">
                                        <div class="owl-carousel owl-theme text-center">
                                            <div class="item">
                                                <div class="carousel_item"
                                                     style="background-color: {{ $card->theme_color }}">
                                                    <p>Lorem ipsum dolor, sit amet consectetur
                                                        adipisicing elit. Aliquid eligendi, nostrum
                                                        quod. Molestias consequatur, odio, facilis
                                                        architecto iste blanditiis! Nemo ipsum iure,
                                                        vero ut quam voluptatem quaerat reprehenderit
                                                        dicta debitis.</p>
                                                    <h4>Nathan Schnefke</h4>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="carousel_item">
                                                    <p>Lorem ipsum dolor, sit amet consectetur
                                                        adipisicing elit. Aliquid eligendi, nostrum
                                                        quod. Molestias consequatur, odio, facilis
                                                        architecto iste blanditiis! Nemo ipsum iure,
                                                        vero ut quam voluptatem quaerat reprehenderit
                                                        dicta debitis.</p>
                                                    <h4>Nathan Schnefke</h4>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="carousel_item">
                                                    <p>Lorem ipsum dolor, sit amet consectetur
                                                        adipisicing elit. Aliquid eligendi, nostrum
                                                        quod. Molestias consequatur, odio, facilis
                                                        architecto iste blanditiis! Nemo ipsum iure,
                                                        vero ut quam voluptatem quaerat reprehenderit
                                                        dicta debitis.</p>
                                                    <h4>Nathan Schnefke</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="carousel_testimonial">
                                    <div class="owl-carousel owl-theme text-center">
                                        @foreach($data['testimonials'] as $testimony)
                                            <div class="item">
                                                <div class="carousel_item"
                                                     style="background-color: {{ $card->theme_color }}">
                                                    <p>{{ $testimony["detail"] }}</p>
                                                    <h4>{{ $testimony["name"] }}</h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- about -->
                        <div class="about_us">
                            @if(isset($live))
                                @if((isset($data['about_title']) && $data['about_title']))
                                    <div class="heading">
                                        <h4 class="px-4">{{ $data['about_title'] ?? "About Spencer Bradley Suggs" }}</h4>
                                    </div>
                                    <div class="about_details">
                                        <p class="px-4">{{ $data['about_details'] ?? "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quam
                                voluptates officiis error impedit quis voluptatibus, iste
                                ducimus tempore quisquam praesentium veniam dolore molestiae
                                architecto voluptatum totam necessitatibus, reiciendis
                                cupiditate. Minus!" }}</p>
                                    </div>
                                @endif
                            @else
                                <div class="heading">
                                    <h4 class="px-4">{{ $data['about_title'] ?? "About Spencer Bradley Suggs" }}</h4>
                                </div>
                                <div class="about_details">
                                    <p class="px-4">{{ $data['about_details'] ?? "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quam
                                voluptates officiis error impedit quis voluptatibus, iste
                                ducimus tempore quisquam praesentium veniam dolore molestiae
                                architecto voluptatum totam necessitatibus, reiciendis
                                cupiditate. Minus!" }}</p>
                                </div>
                            @endif
                            <div class="contact_form mt-3 px-4">
                                <form action="{{ route('card.contact.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="card_id" value="{{ $card->card_id ?? "" }}">
                                     <div class="heading">
                                        <h4>Let's Connect</h4>
                                    </div>
                                    <input type="hidden" value="{{$data['email'] ?? 'info@letsconnect.site'}}" name="ownermail">
                                    <div class="mb-2">
                                        <label class="form-label">First Name</label>
                                        <input type="text" required name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="Enter your first name">
                                        @error('full_name')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" required name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Enter your last name">
                                        @error('full_name')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter your title">
                                        @error('full_name')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Company</label>
                                        <input type="text" name="company" value="{{ old('company') }}" class="form-control" placeholder="Enter your company name">
                                        @error('company')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <label class="form-label">Cell Phone</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <select style="font-size: 12px;" name="ccode" id="ccode" class="form-control text-capitalize" tabindex="9">
                                        <option value="USA (+1)" selected="">USA (+1)</option>
                                        <option value="93" class="text-capitalize"> AFG (+93)
                                        </option>
                                        <option value="355" class="text-capitalize"> ALB (+355)
                                        </option>
                                        <option value="213" class="text-capitalize"> ALG (+213)
                                        </option>
                                        <option value="1684" class="text-capitalize"> AME (+1684)
                                        </option>
                                        <option value="376" class="text-capitalize"> AND (+376)
                                        </option>
                                        <option value="244" class="text-capitalize"> ANG (+244)
                                        </option>
                                        <option value="1264" class="text-capitalize"> ANG (+1264)
                                        </option>
                                        <option value="0" class="text-capitalize"> ANT (+0)</option>
                                        <option value="1268" class="text-capitalize"> ANT (+1268)
                                        </option>
                                        <option value="54" class="text-capitalize"> ARG (+54)
                                        </option>
                                        <option value="374" class="text-capitalize"> ARM (+374)
                                        </option>
                                        <option value="297" class="text-capitalize"> ARU (+297)
                                        </option>
                                        <option value="61" class="text-capitalize"> AUS (+61)
                                        </option>
                                        <option value="43" class="text-capitalize"> AUS (+43)
                                        </option>
                                        <option value="994" class="text-capitalize"> AZE (+994)
                                        </option>
                                        <option value="1242" class="text-capitalize"> BAH (+1242)
                                        </option>
                                        <option value="973" class="text-capitalize"> BAH (+973)
                                        </option>
                                        <option value="880" class="text-capitalize"> BAN (+880)
                                        </option>
                                        <option value="1246" class="text-capitalize"> BAR (+1246)
                                        </option>
                                        <option value="375" class="text-capitalize"> BEL (+375)
                                        </option>
                                        <option value="32" class="text-capitalize"> BEL (+32)
                                        </option>
                                        <option value="501" class="text-capitalize"> BEL (+501)
                                        </option>
                                        <option value="229" class="text-capitalize"> BEN (+229)
                                        </option>
                                        <option value="1441" class="text-capitalize"> BER (+1441)
                                        </option>
                                        <option value="975" class="text-capitalize"> BHU (+975)
                                        </option>
                                        <option value="591" class="text-capitalize"> BOL (+591)
                                        </option>
                                        <option value="387" class="text-capitalize"> BOS (+387)
                                        </option>
                                        <option value="267" class="text-capitalize"> BOT (+267)
                                        </option>
                                        <option value="0" class="text-capitalize"> BOU (+0)</option>
                                        <option value="55" class="text-capitalize"> BRA (+55)
                                        </option>
                                        <option value="246" class="text-capitalize"> BRI (+246)
                                        </option>
                                        <option value="673" class="text-capitalize"> BRU (+673)
                                        </option>
                                        <option value="359" class="text-capitalize"> BUL (+359)
                                        </option>
                                        <option value="226" class="text-capitalize"> BUR (+226)
                                        </option>
                                        <option value="257" class="text-capitalize"> BUR (+257)
                                        </option>
                                        <option value="855" class="text-capitalize"> CAM (+855)
                                        </option>
                                        <option value="237" class="text-capitalize"> CAM (+237)
                                        </option>
                                        <option value="1" class="text-capitalize"> CAN (+1)</option>
                                        <option value="238" class="text-capitalize"> CAP (+238)
                                        </option>
                                        <option value="1345" class="text-capitalize"> CAY (+1345)
                                        </option>
                                        <option value="236" class="text-capitalize"> CEN (+236)
                                        </option>
                                        <option value="235" class="text-capitalize"> CHA (+235)
                                        </option>
                                        <option value="56" class="text-capitalize"> CHI (+56)
                                        </option>
                                        <option value="86" class="text-capitalize"> CHI (+86)
                                        </option>
                                        <option value="61" class="text-capitalize"> CHR (+61)
                                        </option>
                                        <option value="672" class="text-capitalize"> COC (+672)
                                        </option>
                                        <option value="57" class="text-capitalize"> COL (+57)
                                        </option>
                                        <option value="269" class="text-capitalize"> COM (+269)
                                        </option>
                                        <option value="242" class="text-capitalize"> CON (+242)
                                        </option>
                                        <option value="242" class="text-capitalize"> CON (+242)
                                        </option>
                                        <option value="682" class="text-capitalize"> COO (+682)
                                        </option>
                                        <option value="506" class="text-capitalize"> COS (+506)
                                        </option>
                                        <option value="225" class="text-capitalize"> COT (+225)
                                        </option>
                                        <option value="385" class="text-capitalize"> CRO (+385)
                                        </option>
                                        <option value="53" class="text-capitalize"> CUB (+53)
                                        </option>
                                        <option value="357" class="text-capitalize"> CYP (+357)
                                        </option>
                                        <option value="420" class="text-capitalize"> CZE (+420)
                                        </option>
                                        <option value="45" class="text-capitalize"> DEN (+45)
                                        </option>
                                        <option value="253" class="text-capitalize"> DJI (+253)
                                        </option>
                                        <option value="1767" class="text-capitalize"> DOM (+1767)
                                        </option>
                                        <option value="1809" class="text-capitalize"> DOM (+1809)
                                        </option>
                                        <option value="593" class="text-capitalize"> ECU (+593)
                                        </option>
                                        <option value="20" class="text-capitalize"> EGY (+20)
                                        </option>
                                        <option value="503" class="text-capitalize"> EL (+503)
                                        </option>
                                        <option value="240" class="text-capitalize"> EQU (+240)
                                        </option>
                                        <option value="291" class="text-capitalize"> ERI (+291)
                                        </option>
                                        <option value="372" class="text-capitalize"> EST (+372)
                                        </option>
                                        <option value="251" class="text-capitalize"> ETH (+251)
                                        </option>
                                        <option value="500" class="text-capitalize"> FAL (+500)
                                        </option>
                                        <option value="298" class="text-capitalize"> FAR (+298)
                                        </option>
                                        <option value="679" class="text-capitalize"> FIJ (+679)
                                        </option>
                                        <option value="358" class="text-capitalize"> FIN (+358)
                                        </option>
                                        <option value="33" class="text-capitalize"> FRA (+33)
                                        </option>
                                        <option value="594" class="text-capitalize"> FRE (+594)
                                        </option>
                                        <option value="689" class="text-capitalize"> FRE (+689)
                                        </option>
                                        <option value="0" class="text-capitalize"> FRE (+0)</option>
                                        <option value="241" class="text-capitalize"> GAB (+241)
                                        </option>
                                        <option value="220" class="text-capitalize"> GAM (+220)
                                        </option>
                                        <option value="995" class="text-capitalize"> GEO (+995)
                                        </option>
                                        <option value="49" class="text-capitalize"> GER (+49)
                                        </option>
                                        <option value="233" class="text-capitalize"> GHA (+233)
                                        </option>
                                        <option value="350" class="text-capitalize"> GIB (+350)
                                        </option>
                                        <option value="30" class="text-capitalize"> GRE (+30)
                                        </option>
                                        <option value="299" class="text-capitalize"> GRE (+299)
                                        </option>
                                        <option value="1473" class="text-capitalize"> GRE (+1473)
                                        </option>
                                        <option value="590" class="text-capitalize"> GUA (+590)
                                        </option>
                                        <option value="1671" class="text-capitalize"> GUA (+1671)
                                        </option>
                                        <option value="502" class="text-capitalize"> GUA (+502)
                                        </option>
                                        <option value="224" class="text-capitalize"> GUI (+224)
                                        </option>
                                        <option value="245" class="text-capitalize"> GUI (+245)
                                        </option>
                                        <option value="592" class="text-capitalize"> GUY (+592)
                                        </option>
                                        <option value="509" class="text-capitalize"> HAI (+509)
                                        </option>
                                        <option value="0" class="text-capitalize"> HEA (+0)</option>
                                        <option value="39" class="text-capitalize"> HOL (+39)
                                        </option>
                                        <option value="504" class="text-capitalize"> HON (+504)
                                        </option>
                                        <option value="852" class="text-capitalize"> HON (+852)
                                        </option>
                                        <option value="36" class="text-capitalize"> HUN (+36)
                                        </option>
                                        <option value="354" class="text-capitalize"> ICE (+354)
                                        </option>
                                        <option value="91" class="text-capitalize"> IND (+91)
                                        </option>
                                        <option value="62" class="text-capitalize"> IND (+62)
                                        </option>
                                        <option value="98" class="text-capitalize"> IRA (+98)
                                        </option>
                                        <option value="964" class="text-capitalize"> IRA (+964)
                                        </option>
                                        <option value="353" class="text-capitalize"> IRE (+353)
                                        </option>
                                        <option value="972" class="text-capitalize"> ISR (+972)
                                        </option>
                                        <option value="39" class="text-capitalize"> ITA (+39)
                                        </option>
                                        <option value="1876" class="text-capitalize"> JAM (+1876)
                                        </option>
                                        <option value="81" class="text-capitalize"> JAP (+81)
                                        </option>
                                        <option value="962" class="text-capitalize"> JOR (+962)
                                        </option>
                                        <option value="7" class="text-capitalize"> KAZ (+7)</option>
                                        <option value="254" class="text-capitalize"> KEN (+254)
                                        </option>
                                        <option value="686" class="text-capitalize"> KIR (+686)
                                        </option>
                                        <option value="850" class="text-capitalize"> KOR (+850)
                                        </option>
                                        <option value="82" class="text-capitalize"> KOR (+82)
                                        </option>
                                        <option value="965" class="text-capitalize"> KUW (+965)
                                        </option>
                                        <option value="996" class="text-capitalize"> KYR (+996)
                                        </option>
                                        <option value="856" class="text-capitalize"> LAO (+856)
                                        </option>
                                        <option value="371" class="text-capitalize"> LAT (+371)
                                        </option>
                                        <option value="961" class="text-capitalize"> LEB (+961)
                                        </option>
                                        <option value="266" class="text-capitalize"> LES (+266)
                                        </option>
                                        <option value="231" class="text-capitalize"> LIB (+231)
                                        </option>
                                        <option value="218" class="text-capitalize"> LIB (+218)
                                        </option>
                                        <option value="423" class="text-capitalize"> LIE (+423)
                                        </option>
                                        <option value="370" class="text-capitalize"> LIT (+370)
                                        </option>
                                        <option value="352" class="text-capitalize"> LUX (+352)
                                        </option>
                                        <option value="853" class="text-capitalize"> MAC (+853)
                                        </option>
                                        <option value="389" class="text-capitalize"> MAC (+389)
                                        </option>
                                        <option value="261" class="text-capitalize"> MAD (+261)
                                        </option>
                                        <option value="265" class="text-capitalize"> MAL (+265)
                                        </option>
                                        <option value="60" class="text-capitalize"> MAL (+60)
                                        </option>
                                        <option value="960" class="text-capitalize"> MAL (+960)
                                        </option>
                                        <option value="223" class="text-capitalize"> MAL (+223)
                                        </option>
                                        <option value="356" class="text-capitalize"> MAL (+356)
                                        </option>
                                        <option value="692" class="text-capitalize"> MAR (+692)
                                        </option>
                                        <option value="596" class="text-capitalize"> MAR (+596)
                                        </option>
                                        <option value="222" class="text-capitalize"> MAU (+222)
                                        </option>
                                        <option value="230" class="text-capitalize"> MAU (+230)
                                        </option>
                                        <option value="269" class="text-capitalize"> MAY (+269)
                                        </option>
                                        <option value="52" class="text-capitalize"> MEX (+52)
                                        </option>
                                        <option value="691" class="text-capitalize"> MIC (+691)
                                        </option>
                                        <option value="373" class="text-capitalize"> MOL (+373)
                                        </option>
                                        <option value="377" class="text-capitalize"> MON (+377)
                                        </option>
                                        <option value="976" class="text-capitalize"> MON (+976)
                                        </option>
                                        <option value="1664" class="text-capitalize"> MON (+1664)
                                        </option>
                                        <option value="212" class="text-capitalize"> MOR (+212)
                                        </option>
                                        <option value="258" class="text-capitalize"> MOZ (+258)
                                        </option>
                                        <option value="95" class="text-capitalize"> MYA (+95)
                                        </option>
                                        <option value="264" class="text-capitalize"> NAM (+264)
                                        </option>
                                        <option value="674" class="text-capitalize"> NAU (+674)
                                        </option>
                                        <option value="977" class="text-capitalize"> NEP (+977)
                                        </option>
                                        <option value="31" class="text-capitalize"> NET (+31)
                                        </option>
                                        <option value="599" class="text-capitalize"> NET (+599)
                                        </option>
                                        <option value="687" class="text-capitalize"> NEW (+687)
                                        </option>
                                        <option value="64" class="text-capitalize"> NEW (+64)
                                        </option>
                                        <option value="505" class="text-capitalize"> NIC (+505)
                                        </option>
                                        <option value="227" class="text-capitalize"> NIG (+227)
                                        </option>
                                        <option value="234" class="text-capitalize"> NIG (+234)
                                        </option>
                                        <option value="683" class="text-capitalize"> NIU (+683)
                                        </option>
                                        <option value="672" class="text-capitalize"> NOR (+672)
                                        </option>
                                        <option value="1670" class="text-capitalize"> NOR (+1670)
                                        </option>
                                        <option value="47" class="text-capitalize"> NOR (+47)
                                        </option>
                                        <option value="968" class="text-capitalize"> OMA (+968)
                                        </option>
                                        <option value="92" class="text-capitalize"> PAK (+92)
                                        </option>
                                        <option value="680" class="text-capitalize"> PAL (+680)
                                        </option>
                                        <option value="970" class="text-capitalize"> PAL (+970)
                                        </option>
                                        <option value="507" class="text-capitalize"> PAN (+507)
                                        </option>
                                        <option value="675" class="text-capitalize"> PAP (+675)
                                        </option>
                                        <option value="595" class="text-capitalize"> PAR (+595)
                                        </option>
                                        <option value="51" class="text-capitalize"> PER (+51)
                                        </option>
                                        <option value="63" class="text-capitalize"> PHI (+63)
                                        </option>
                                        <option value="0" class="text-capitalize"> PIT (+0)</option>
                                        <option value="48" class="text-capitalize"> POL (+48)
                                        </option>
                                        <option value="351" class="text-capitalize"> POR (+351)
                                        </option>
                                        <option value="1787" class="text-capitalize"> PUE (+1787)
                                        </option>
                                        <option value="974" class="text-capitalize"> QAT (+974)
                                        </option>
                                        <option value="262" class="text-capitalize"> REU (+262)
                                        </option>
                                        <option value="40" class="text-capitalize"> ROM (+40)
                                        </option>
                                        <option value="70" class="text-capitalize"> RUS (+70)
                                        </option>
                                        <option value="250" class="text-capitalize"> RWA (+250)
                                        </option>
                                        <option value="290" class="text-capitalize"> SAI (+290)
                                        </option>
                                        <option value="1869" class="text-capitalize"> SAI (+1869)
                                        </option>
                                        <option value="1758" class="text-capitalize"> SAI (+1758)
                                        </option>
                                        <option value="508" class="text-capitalize"> SAI (+508)
                                        </option>
                                        <option value="1784" class="text-capitalize"> SAI (+1784)
                                        </option>
                                        <option value="684" class="text-capitalize"> SAM (+684)
                                        </option>
                                        <option value="378" class="text-capitalize"> SAN (+378)
                                        </option>
                                        <option value="239" class="text-capitalize"> SAO (+239)
                                        </option>
                                        <option value="966" class="text-capitalize"> SAU (+966)
                                        </option>
                                        <option value="221" class="text-capitalize"> SEN (+221)
                                        </option>
                                        <option value="381" class="text-capitalize"> SER (+381)
                                        </option>
                                        <option value="248" class="text-capitalize"> SEY (+248)
                                        </option>
                                        <option value="232" class="text-capitalize"> SIE (+232)
                                        </option>
                                        <option value="65" class="text-capitalize"> SIN (+65)
                                        </option>
                                        <option value="421" class="text-capitalize"> SLO (+421)
                                        </option>
                                        <option value="386" class="text-capitalize"> SLO (+386)
                                        </option>
                                        <option value="677" class="text-capitalize"> SOL (+677)
                                        </option>
                                        <option value="252" class="text-capitalize"> SOM (+252)
                                        </option>
                                        <option value="27" class="text-capitalize"> SOU (+27)
                                        </option>
                                        <option value="0" class="text-capitalize"> SOU (+0)</option>
                                        <option value="34" class="text-capitalize"> SPA (+34)
                                        </option>
                                        <option value="94" class="text-capitalize"> SRI (+94)
                                        </option>
                                        <option value="249" class="text-capitalize"> SUD (+249)
                                        </option>
                                        <option value="597" class="text-capitalize"> SUR (+597)
                                        </option>
                                        <option value="47" class="text-capitalize"> SVA (+47)
                                        </option>
                                        <option value="268" class="text-capitalize"> SWA (+268)
                                        </option>
                                        <option value="46" class="text-capitalize"> SWE (+46)
                                        </option>
                                        <option value="41" class="text-capitalize"> SWI (+41)
                                        </option>
                                        <option value="963" class="text-capitalize"> SYR (+963)
                                        </option>
                                        <option value="886" class="text-capitalize"> TAI (+886)
                                        </option>
                                        <option value="992" class="text-capitalize"> TAJ (+992)
                                        </option>
                                        <option value="255" class="text-capitalize"> TAN (+255)
                                        </option>
                                        <option value="66" class="text-capitalize"> THA (+66)
                                        </option>
                                        <option value="670" class="text-capitalize"> TIM (+670)
                                        </option>
                                        <option value="228" class="text-capitalize"> TOG (+228)
                                        </option>
                                        <option value="690" class="text-capitalize"> TOK (+690)
                                        </option>
                                        <option value="676" class="text-capitalize"> TON (+676)
                                        </option>
                                        <option value="1868" class="text-capitalize"> TRI (+1868)
                                        </option>
                                        <option value="216" class="text-capitalize"> TUN (+216)
                                        </option>
                                        <option value="90" class="text-capitalize"> TUR (+90)
                                        </option>
                                        <option value="7370" class="text-capitalize"> TUR (+7370)
                                        </option>
                                        <option value="1649" class="text-capitalize"> TUR (+1649)
                                        </option>
                                        <option value="688" class="text-capitalize"> TUV (+688)
                                        </option>
                                        <option value="256" class="text-capitalize"> UGA (+256)
                                        </option>
                                        <option value="380" class="text-capitalize"> UKR (+380)
                                        </option>
                                        <option value="971" class="text-capitalize"> UNI (+971)
                                        </option>
                                        <option value="44" class="text-capitalize"> UNI (+44)
                                        </option>
                                        <option value="1" class="text-capitalize"> UNI (+1)</option>
                                        <option value="1" class="text-capitalize"> UNI (+1)</option>
                                        <option value="598" class="text-capitalize"> URU (+598)
                                        </option>
                                        <option value="998" class="text-capitalize"> UZB (+998)
                                        </option>
                                        <option value="678" class="text-capitalize"> VAN (+678)
                                        </option>
                                        <option value="58" class="text-capitalize"> VEN (+58)
                                        </option>
                                        <option value="84" class="text-capitalize"> VIE (+84)
                                        </option>
                                        <option value="1284" class="text-capitalize"> VIR (+1284)
                                        </option>
                                        <option value="1340" class="text-capitalize"> VIR (+1340)
                                        </option>
                                        <option value="681" class="text-capitalize"> WAL (+681)
                                        </option>
                                        <option value="212" class="text-capitalize"> WES (+212)
                                        </option>
                                        <option value="967" class="text-capitalize"> YEM (+967)
                                        </option>
                                        <option value="260" class="text-capitalize"> ZAM (+260)
                                        </option>
                                        <option value="263" class="text-capitalize"> ZIM (+263)
                                        </option>
                                    </select>
                                        </div>
                                        <input type="number" required name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter your cell phone">
                                        @error('phone')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Email</label>
                                        <input type="email" required name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter your email address">
                                        @error('email')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Birthday</label>
                                        <input type="text" name="birthday" value="{{ old('birthday') }}" class="form-control" placeholder="ex: (Month/Date or 05/22) address">
                                        @error('email')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Open Text</label>
                                        <textarea name="message" id="msg_form" class="form-control" rows="2" placeholder="Notes">{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                            <div class="share_btn w-100 mt-5 mb-3">
                                <button class="btn" data-bs-toggle="modal"
                                        style="background-color: {{ $card->theme_color }}"
                                        data-bs-target="#shareModal">SHARE MY INFO
                                </button>
                            </div>

                            <div class="connect_card text-center">
                                  <p>Copyright © <a href="{{url('/')}}" target="_blank">LetsConnect</a>. All rights reserved.</p>
                                  <p class="mt-1"><a href="{{route('login')}}">Get your custom LetsConnect card here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    @isset($live)
        <div class="modal fade" id="qrcode">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::generate(route('profile', $card->card_url)) !!}
                    </div>
                </div>
            </div>
        </div>
@endisset

<!-- modal -->
    <div class="share_modal modal_one">
        <div class="modal fade" id="shareModal" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-5">
                            <h5>{{ $data['name'] ?? "" }}</h5>
                            @if(!isset($live))
                                <img src="{{asset('backend/assets/images/spencer.png')}}"
                                     alt="image">
                            @else
                                <div class="py-2 mb-4 qrcode_share">
                                    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::generate(route('profile', $card->card_url)) !!}
                                </div>
                            @endif
                            <input id="foo"
                                   value="{{ route('profile', $card->card_url) }}">
                            <button class="copy_btn" data-clipboard-target="#foo"><i
                                    class="fa fa-copy"></i><span class="copy_btn_text">copy link</span>
                            </button>
                        </div>
                        <div class="card_share text-center">
                            <h3>Share Card</h3>
                            <div class="row">
                                <div class="col-4">
                                    <ul>
                                        <li><a target="_blank" href="{{ $iconData['comment']["value"] ?? '' }}"><i
                                                    class="fa fa-comments"></i>Text</a></li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul>
                                        <li><a target="_blank" href="#" data-bs-toggle="modal"
                                               data-bs-target="#EmailModal"><i
                                                    class="fa fa-envelope"></i>By Email</a></li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul>
                                        <li><a target="_blank" href="#" data-bs-toggle="modal"
                                               data-bs-target="#SocialModal"><i
                                                    class="fa fa-share-alt"></i>Social Media</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Email form modal -->
    <div class="share_modal email_modal">
        <div class="modal fade" id="EmailModal" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal_wrapper">
                            <h3> Share {{ $data['name'] ?? '' }}'s Card</h3>
                            <p>Use the form below to enter your name and the email of your referral to share {{ $data['name'] ?? '' }}'s LetsConnect card. Your referral will receive a notification that this LetsConnect card was referred by you.</p>
                            <p>Thanks for the referral!</p>
                            <form action="{{ route('email.card', $card->card_id) }}" class="mt-4" method="post">
                                <div class="mb-3">
                                    <label for="">Your Name</label>
                                    <input type="text" name="name" value="{{ $data['name'] ?? '' }}"
                                           class="form-control"
                                           placeholder="Enter your name"
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label for="">Recipient's Email</label>
                                    <input type="email" name="email" class="form-control"
                                           placeholder="Enter recipient's email">
                                </div>
                                <div class="mb-2">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Send Card</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Modal -->
    <div class="share_modal email_modal">
        <div class="modal fade" id="SocialModal" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal_wrapper">
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- social share -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61d020a5f26d454a"></script>




