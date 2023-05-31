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
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    @yield('css')
</head>

<body class="antialiased" dir="{{(App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr')}}">
    <div id="wrapper">
        @if (isset($header) && $header)
        @include('admin.includes.header')
        @endif
        @if (isset($nav) && $nav)
        @include('admin.includes.nav')
        @endif
        @yield('content')
    </div>

    @include('sweet::alert')
    <!-- Tabler Core -->
    <script type="text/javascript" src="{{ asset('backend/js/tabler.min.js') }}"></script>
    @if (isset($demo) && $demo)
    <script type="text/javascript" src="{{ asset('backend/js/admin-delete-query.js') }}"></script>
    @endif
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/datatable.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    @yield('scripts')
    <script>
        function deleteContactMsg(parameter) {
    "use strict";
    $("#contact-modal").modal("show");
    var link = document.getElementById("contact_user_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/contacts/delete?id=" + parameter);
}
    </script>
</body>

</html>
