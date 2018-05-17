<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="DomainReminder">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1 shrink-to-fit=no">
    <link rel="shortcut icon" href="/img/icon-60x60.png" type="image/x-icon">
    <link rel="icon" href="/img/icon-60x60.png">
    <meta name="description" content="">
    <title>Domain Reminder - @yield('title')</title>

    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
    <link rel="stylesheet" href="/css/scripts/tether/tether.min.css">
    <link rel="stylesheet" href="/css/scripts/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/scripts/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/scripts/bootstrap/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/scripts/dropdown/style.css">
    <link rel="stylesheet" href="/css/custom/index.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/custom/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="/js/scripts/jquery-3.3.1.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            }
        });
    </script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    @yield('style')

</head>
<body>
<div id="app">
    @include('inc.navbar')
        <div style="color: white; padding-left: 2%;">
            <!-- Don't think we'll want this here, we've got page title h1's in each of their views
            - delete if no longer necessary-->
            <!--<span >@yield('title')</span>-->
            @include('inc.messages')
        </div>
        @yield('content')
</div>
<footer class="footer cid-qP56U1Oxmu" >
    <div class="container align-center">
        <span class="text-muted">© Copyright 2018 DomainReminder - All Rights Reserved
            <div>
                <a href="/about">About</a> &middot;
                <a href="/contact">Contact</a>
            </div>
        </span>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="/js/scripts/smoothscroll/smooth-scroll.js"></script>
<script src="/js/scripts/dropdown/script.min.js"></script>
<script src="/js/scripts/touchswipe/jquery.touch-swipe.min.js"></script>
<script src="/js/scripts/mbr-tabs/mbr-tabs.js"></script>
<script src="/js/custom/index.js"></script>

@yield('scripts')
</body>
</html>
