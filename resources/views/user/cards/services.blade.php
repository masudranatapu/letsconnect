@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <style>
        a {
            text-decoration: none !important;
        }

        .form-control {
            height: 42px;
            font-size: 14px;
            outline: none !important;
            box-shadow: none !important;
        }

        textarea {
            height: 100px !important;
        }
        .title_h5 {
            margin-bottom: 15px;

        }

        .title_h5 h5 {
            color: #444;
            font-size: 18px;
            border-bottom:1px dotted #ddd;
        }
        .card{
            overflow-x:auto;
            height:800px;
        }
        button.btn.btn-submit {border-radius: 4px;
            padding: 9px 19px;
            font-weight: 500;
            background: #ed6b4d;display: inline-block;color: #fff;border: none;}

        button.btn.btn-submit:hover {opacity: .7;}
    </style>
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
    <link rel="stylesheet" href="{{ asset('css/all.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-iconpicker.min.css') }}"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <div class="col-lg-7 mb-4">
                        <div class="row">
                            <div class="card">
                                <div class="card-header mt-2 row">
                                    <div class="col-11">
                                        <h5>Basic Info</h5>
                                    </div>
                                    <div class="col-1 ml-5">
                                        <a class="btn" style="background: #ed6b4d" href="{{route('user.edit.card',$card->card_id)}}">Back</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="card-form" action="{{ route('user.update.modern-card', $card->card_id) }}"
                                          method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3 d-flex align-items-center">
                                                    <label>Theme color</label>
                                                    <input type="color" name="theme_color" value="{{ $card->theme_color }}" class="mx-2" id="color">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                    <input type="text" name="name" data-title="Name"
                                                           class="form-control"
                                                           value="{{ $fields["name"] ?? "" }}"
                                                           placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-info"></i></span>
                                                    <input type="text" name="designation"
                                                           value="{{ $fields["designation"] ?? "" }}"
                                                           class="form-control"
                                                           placeholder="Designation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                    <input type="text" name="email" data-title="Email"
                                                           class="form-control control"
                                                           value="{{ old('email', $fields["email"] ?? "") }}"
                                                           placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-handshake-o"></i></span>
                                                    <input type="number" name="connect"
                                                           value="{{ old('connect', $fields["connect"] ?? "") }}"
                                                           data-title="Connect"
                                                           class="control form-control"
                                                           placeholder="Connect">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row g-1">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <select style="font-size: 12px;" name="ccode1"
                                                                id="ccode1"
                                                                class="form-control text-capitalize" tabindex="9">
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
                                                        <input type="number" data-title="Phone" name="phone"
                                                                   class="form-control control"
                                                                   value="{{ old('phone', $fields["phone"] ?? "") }}"
                                                                   placeholder="Phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-comments"></i></span>
                                                    <input type="text" data-title="Text" name="comment"
                                                           class="form-control control"
                                                           value="{{ old('comment', $fields["comment"] ?? "") }}"
                                                           placeholder="Text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-linkedin"></i></span>
                                                    <input type="text" name="linkedin" data-title="Linkedin"
                                                           class="control form-control"
                                                           value="{{ old('linkedin', $fields["linkedin"] ?? "") }}"
                                                           placeholder="ex: www.linkedin.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                                                    <input type="text" name="facebook" data-title="Facebook"
                                                           class="control form-control"
                                                           value="{{ old('facebook', $fields["facebook"] ?? "") }}"
                                                           placeholder="ex: www.facebook.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-instagram"></i></span>
                                                    <input type="text" name="instagram" data-title="Instagram"
                                                           class="control form-control"
                                                           value="{{ old('instagram', $fields["instagram"] ?? "") }}"
                                                           placeholder="ex: www.instagram.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-address-book"></i></span>
                                                    <input type="number" data-title="Contacts" name="contacts"
                                                           class="control form-control"
                                                           value="{{ old('contacts', $fields["contacts"] ?? "") }}"
                                                           placeholder="Add Contacts">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-link"></i></span>
                                                    <input type="text" name="website" data-title="Website"
                                                           class="control form-control"
                                                           value="{{ old('website', $fields["website"] ?? "") }}"
                                                           placeholder="ex: www.website.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-youtube"></i></span>
                                                    <input type="text" name="youtube" data-title="YouTube"
                                                           class="control form-control"
                                                           value="{{ old('youtube', $fields["youtube"] ?? "") }}"
                                                           placeholder="ex: www.youtube.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-map-marker"></i></span>
                                                    <input type="text" name="map"
                                                           value="{{ old('map', $fields["map"] ?? "") }}"
                                                           data-title="Map" class="form-control"
                                                           placeholder="Map">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-snapchat"></i></span>
                                                    <input type="text" name="snapchat" data-title="Snapchat"
                                                           class="control form-control"
                                                           value="{{ old('snapchat', $fields["snapchat"] ?? "") }}"
                                                           placeholder="ex: www.snapchat.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-spotify"></i></span>
                                                    <input type="text" name="spotify" data-title="Spotify"
                                                           class="control form-control"
                                                           value="{{ old('spotify', $fields["spotify"] ?? "") }}"
                                                           placeholder="ex: www.spotify.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-twitch"></i></span>
                                                    <input type="text" name="twitch" data-title="Twitch"
                                                           class="control form-control"
                                                           value="{{ old('twitch', $fields["twitch"] ?? "") }}"
                                                           placeholder="ex: www.twitch.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-comments"></i></span>
                                                    <input type="text" name="messenger" data-title="Messenger"
                                                           class="control form-control"
                                                           value="{{ old('messenger', $fields["messenger"] ?? "") }}"
                                                           placeholder="ex: www.messenger.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-skype"></i></span>
                                                    <input type="text" name="skype" data-title="Skype"
                                                           class="control form-control"
                                                           value="{{ old('skype', $fields["skype"] ?? "") }}"
                                                           placeholder="ex: www.skype.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-soundcloud"></i></span>
                                                    <input type="text" name="soundcloud" data-title="Soundcloud"
                                                           class="control form-control"
                                                           value="{{ old('soundcloud', $fields["soundcloud"] ?? "") }}"
                                                           placeholder="ex: www.soundcloud.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-paypal"></i></span>
                                                    <input type="text" name="paypal" data-title="Paypal"
                                                           class="control form-control"
                                                           value="{{ old('paypal', $fields["paypal"] ?? "") }}"
                                                           placeholder="ex: www.paypal.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fab fa-vimeo-v"></i></span>
                                                    <input type="text" name="vimeo" data-title="Vimeo"
                                                           class="control form-control"
                                                           value="{{ old('vimeo', $fields["vimeo"] ?? "") }}"
                                                           placeholder="ex: www.vimeo.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-telegram"></i></span>
                                                    <input type="text" name="telegram" data-title="Telegram"
                                                           class="control form-control"
                                                           value="{{ old('telegram', $fields["telegram"] ?? "") }}"
                                                           placeholder="ex: www.telegram.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fab fa-flickr"></i></span>
                                                    <input type="text" name="flickr" data-title="Flickr"
                                                           class="control form-control"
                                                           value="{{ old('flickr', $fields["flickr"] ?? "") }}"
                                                           placeholder="ex: www.flickr.com">
                                                </div>
                                            </div>
                                        </div>


                                        <div id="service" class="row mt-4">
                                            <div class="title_h5">
                                                <h5>Video Section</h5>
                                            </div>
                                            <div class="row">
                                                @if(!isset($fields['videos']) || !count($fields["videos"]))
                                                    <div class="col-md-6">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" name="video_title[]"
                                                               class="form-control video-input"
                                                               placeholder="Title">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label class="form-label">Video</label>
                                                        <input type="text" name="video_url[]"
                                                               class="form-control video-input" placeholder="Video">
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <label class="form-label">Description</label>
                                                        <textarea placeholder="{{ __('Description') }}" class="form-control video-input"
                                                                  name="video_description[]"></textarea>
                                                    </div>
                                                @else
                                                    @foreach($fields["videos"] as $video)
                                                        <div class="col-md-6">
                                                            <label class="form-label">Title</label>
                                                            <input type="text" name="video_title[]"
                                                                   class="form-control video-input"
                                                                   value="{{ $video["title"] }}"
                                                                   placeholder="Title">
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label class="form-label">Video</label>
                                                            <input type="text" name="video_url[]"
                                                                   value="{{ $video["url"] }}"
                                                                   class="form-control video-input" placeholder="Video">
                                                        </div>
                                                        <div class="col-12 mb-2">
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-control video-input"
                                                                      name="video_description[]">{{ $video["description"] }}</textarea>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div id="more-services" class="row mt-2"></div>
                                            <div class="col-lg-12 mt-3 mb-4">
                                                <button type="button" onclick="addService()" class="btn btn-primary">
                                                    {{ __('Add More video') }}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="testimonial mt-3">
                                        <div class="title_h5">
                                                <h5>Testimonial Section</h5>
                                            </div>
                                            <div class="row mb-3">
                                                @if(!isset($fields['testimonials']) || !count($fields['testimonials']))
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">Content</label>
                                                        <textarea class="form-control testimonial-input"
                                                                  name="testimonial_detail[]" placeholder="Write your content" cols="4"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" name="testimonial_name[]"
                                                               class="form-control testimonial-input" placeholder="Enter your name">
                                                    </div>
                                                @else
                                                    @foreach($fields['testimonials'] as $testimony)
                                                        <div class="col-12 mb-3">
                                                            <label class="form-label">Content</label>
                                                            <textarea class="form-control testimonial-input"
                                                                      name="testimonial_detail[]" placeholder="Write your content"
                                                                      cols="4">{{ $testimony["detail"] }}</textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" name="testimonial_name[]"
                                                                   value="{{ $testimony["name"] }}"
                                                                   class="form-control testimonial-input" placeholder="Enter your name">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div id="gallery" class="row">
                                                <div id="more-gallery" class="row"></div>
                                                <div class="col-lg-12 mt-3 mb-4">
                                                    <button type="button" onclick="addGallery()"
                                                            class="btn btn-primary">
                                                        {{ __('Add More Testimonials') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="title_h5">
                                                <h5>About Section</h5>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" name="about_title"
                                                       value="{{ old('about_title', $fields["about_title"] ?? "") }}"
                                                       class="form-control" placeholder="Enter title">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Content</label>
                                                <textarea name="about_details" class="form-control"
                                                placeholder="Write content" rows="4">{{ old('about_details', $fields["about_details"] ?? "") }}</textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-submit mt-3">Submit your card</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5" id="card-view">

                    </div>
                </div>
            </div>
        </div>
        @include('user.includes.footer')
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
            $(document).ready(function () {
                updateCard();

                let updateCardWait = null;

                $(document).on('keyup', 'form#card-form', function () {
                    clearTimeout(updateCardWait);

                    updateCardWait = setTimeout(() => {
                        updateCard();
                    }, 300);
                });

                $(document).on('change', '#color', function () {
                    clearTimeout(updateCardWait);

                    updateCardWait = setTimeout(() => {
                        updateCard();
                    }, 300);
                });

                function updateCard() {
                    const cardView = $('#card-view');
                    cardView.css('opacity', '0.6')

                    $.ajax({
                        url: '{{ route('user.modern-card.view', $card->card_id) }}',
                        type: 'POST',
                        data: $('#card-form').serialize(),
                        success: function (res) {
                            cardView.html(res);
                            cardView.css('opacity', '1');

                            $('.carousel_testimonial .owl-carousel').owlCarousel({
                                loop: true,
                                dots: true,
                                nav: false,
                                smartSpeed: 500,
                                autoHeight: false,
                                autoplay: true,
                                responsive: {
                                    0: {
                                        items: 1,
                                        autoplay: true,
                                    }
                                }
                            });
                        },
                        error: function (err) {
                            cardView.css('opacity', '1');
                        }
                    });
                }
            });

            // services
            var count = 1;
            var currentSelection = 0;

            function addService() {
                "use strict";
                if (count >= {{ $plan_details->no_of_services}}) {
                    swal({
                        title: 'Oops!',
                        icon: 'warning',
                        text: 'You have reached your current plan limit.',
                        timer: 2000,
                        buttons: false,
                    });
                } else {
                    count++;
                    let id = getRandomInt();
                    let services = "<div class='row' id=" + id + "><div class='col-md-6 col-xl-6'> <label class='form-label'>Title</label> <input type='text' class='form-control video-input' name='video_title[]' placeholder='Title' required> </div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>Video</label> <input type='text' class='form-control video-input' name='video_url[]' placeholder='Video' required> </div></div><div class='col-12'> <div class='mb-3'> <label class='form-label'>Description</label> <textarea  type='text' class='form-control video-input' name='video_description[]'> </textarea> </div></div> <div class='col-md-6'><a href='#' class='btn mt-3 mb-4 btn-danger btn-sm' onclick='removeService(" + id + ")'>Remove</a></div>";
                    $("#more-services").append(services).html();
                }
            }

            function removeService(id) {
                "use strict";
                $("#" + id).remove();
                // updateVideos();
            }

            function getRandomInt() {
                min = Math.ceil(0);
                max = Math.floor(9999999999);
                return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
            }

            function openMedia(id) {
                "use strict";
                currentSelection = id;
                $('#openMediaModel').modal('show');
            }

            $(".media_image").on("click", function () {
                var imgUri = $(this).attr('id');
                $('#openMediaModel').modal('hide');
                $('.image' + currentSelection).val(imgUri);
            });
            // gallery
            var count = 1;
            var currentSelection = 0;

            function addGallery() {
                "use strict";
                if (count >= {{ $plan_details->no_of_galleries}}) {
                    swal({
                        title: 'Oops!',
                        icon: 'warning',
                        text: 'You have reached your current plan limit.',
                        timer: 2000,
                        buttons: false,
                    });
                } else {
                    count++;
                    var id = getRandomInt();
                    var gallery = "<div class='row' id=" + id + "><div class='col-12'><div class='mb-3'> <label class='form-label'>Content</label><div class='input-group mb-2'><textarea type='text' class='image" + id + " media-model form-control testimonial-input' name='testimonial_detail[]'></textarea></div></div></div><div class='col-12'> <div class='mb-3'> <label class='form-label'>Name</label> <input type='text' class='form-control testimonial-input' name='testimonial_name[]'> <a href='javascript:void(0)' class='btn mt-3 btn-danger btn-sm' onclick='removeGallery(" + id + ")'>Remove</a>  </div><br></div>";
                    $("#more-gallery").append(gallery).html();
                }
            }

            function removeGallery(id) {
                "use strict";
                $("#" + id).remove();

                // updateTestimonial();
            }

            function getRandomInt() {
                min = Math.ceil(0);
                max = Math.floor(9999999999);
                return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
            }

            function openMedia(id) {
                "use strict";
                currentSelection = id;
                $('#openMediaModel').modal('show');
            }

            $(".media_image").on("click", function () {
                var imgUri = $(this).attr('id');
                $('#openMediaModel').modal('hide');
                $('.image' + currentSelection).val(imgUri);
            });
        </script>
    @endpush
@endsection
