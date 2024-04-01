<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" type="image/x-icon"
        href="https://kb-sla.wika.co.id/uploads/images/system/2024-01/rosi-g2-text-trial.png" />
    <title>{{ $title }}</title>
    <!-- CSS files -->
    @include('layouts.head')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .layout-ask {
            min-height: 0% !important;
        }
    </style>
</head>

<body>
    <script src="{{ asset('template/back/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page {{ $title == 'Tanya AI' ? 'layout-ask' : '' }}">
        <!-- Navbar -->
        @include('layouts_front.navbar')
        <div class="page-wrapper">
            <!-- Page header -->
            @yield('content_front')
            @include('layouts.footer')
        </div>
    </div>
    <!-- Libs JS -->
    @include('layouts.foot')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
