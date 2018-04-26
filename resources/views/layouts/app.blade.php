<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="DomainReminder">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="/img/icon-60x60.png" type="image/x-icon">
    <meta name="description" content="">
    <title>Domain Reminder - @yield('title')</title>
    <link rel="stylesheet" href="/css/scripts/tether/tether.min.css">
    <link rel="stylesheet" href="/css/scripts/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/scripts/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/scripts/bootstrap/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/scripts/dropdown/style.css">
    <link rel="stylesheet" href="/css/custom/index.css">
    <link rel="stylesheet" href="/css/custom/mbr-additional.css" type="text/css">
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

</head>
<body>
<div id="app">
    @include('inc.navbar')

        <div style="background-color: #2e112d !important; color: white; padding-left: 2%;">
            <span >@yield('title')</span>
        </div>
        @yield('content')
</div>
<section once="" class="cid-qP56U1Oxmu" id="footer6-l">

    <div class="container">
        <div class="media-container-column align-center mbr-white">
            <div class="col-12 ">
                    <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    © Copyright 2018 DomainReminder - All Rights Reserved -
                        <a href="/about">About</a>
                        <a href="/contact">Contact</a>
                    </p>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('js/app.js') }}" ></script>
<script src="/js/scripts/jquery/jquery.min.js"></script>
<script src="/js/scripts/popper/popper.min.js"></script>
<script src="/js/scripts/tether/tether.min.js"></script>
<script src="/js/scripts/bootstrap/bootstrap.min.js"></script>
<script src="/js/scripts/smoothscroll/smooth-scroll.js"></script>
<script src="/js/scripts/dropdown/script.min.js"></script>
<script src="/js/scripts/touchswipe/jquery.touch-swipe.min.js"></script>
<script src="/js/scripts/mbr-tabs/mbr-tabs.js"></script>
<script src="/js/custom/index.js"></script>


</body>
</html>
