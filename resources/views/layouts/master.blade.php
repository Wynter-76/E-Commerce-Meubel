<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title dinamis -->
    <title>@yield('title', 'Dwijaya Mebel')</title>

    <!-- CSS -->
    <link href="{{ asset('template_customer/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('template_customer/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('template_customer/css/style.css') }}" rel="stylesheet">
</head>

<body>

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- Hero  --}}
    @yield('hero')

    {{-- HALAMAN ISI --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('layouts.footer')

    {{-- JS --}}
    <script src="{{ asset('template_customer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template_customer/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('template_customer/js/custom.js') }}"></script>

</body>
</html>
