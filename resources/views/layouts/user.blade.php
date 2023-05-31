<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $settings->site_name }}</title>

    <link rel="icon" href="{{ $settings->favicon }}" sizes="96x96" type="image/png" />

    <!-- CSS files -->
    <link href="{{ asset('backend/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/styles.css?v=1') }}" rel="stylesheet" />
    <link href="{{ asset('css/pixelarity.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pixelarity-face.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script-face.js') }}"></script>

    <style type="text/css">
        #result{
            display: block;
            position: relative;
            margin-top: 40px;
        }
        .face{
            position: absolute;
            height: 0px;
            width: 0px;
            background-color: transparent;;
            border: 4px solid rgba(10,10,10,0.5);
        }
    </style>
    @yield('css')
</head>

<body class="antialiased" dir="{{(App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr')}}">
    <div id="wrapper">
        @if (isset($header) && $header)
        @include('user.includes.header')
        @endif
        @if (isset($nav) && $nav)
        @include('user.includes.nav')
        @endif
        @yield('content')
    </div>

    @include('sweet::alert')
    <!-- Tabler Core -->
    <script type="text/javascript" src="{{ asset('backend/js/tabler.min.js') }}"></script>
    @if (isset($demo) && $demo)
    <script type="text/javascript" src="{{ asset('backend/js/user-delete-query.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/datatable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/jquery-qrcode.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    @endif
    @yield('scripts')
    @stack('custom-js')
</body>

</html>
