<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->


    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <link rel="icon" href="{{ url('/') }}{{ $business_card_details->profile }}" sizes="96x96" type="image/png"/>

    <!-- CSS files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        .modal-body svg {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body class="antialiased text-body font-body" style="background-color:#fff;" dir="{{(App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr')}}">


<div class="main_template">
    @if(session()->has('success'))
        <div class="alert alert-success">
            <span class="p-1">{{ session()->get('success') }}</span>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            <span class="p-1">{{ session()->get('error') }}</span>
        </div>
    @endif
    @include('vcard.modern-card-view', ['card' => $card_details, 'live' => true])
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/owl.carousel.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('.copy_btn').click(function () {
            $($(this).data('clipboard-target')).select();
            document.execCommand('copy');
            $('.copy_btn_text').text('copied');
        });

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
    })
</script>

</body>

</html>
