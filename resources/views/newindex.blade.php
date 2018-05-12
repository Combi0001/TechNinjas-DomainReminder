<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="/img/icon-60x60.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/scripts/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/scripts/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/scripts/bootstrap/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/custom/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="/css/navbar.css">

    @yield('head')

    <title>Domain Reminder</title>
</head>
<body>
    <header>
        @include('inc.navbar')
    </header>
    <div id="content">
        <div id="splash">
            <span class="splash-heading">
                Welcome to Domain Reminder
            </span>
            <span class="splash-paragraph">
                Here at domainreminder.net we do the hard work for you. Ever wanted to be informed on when a domain name that
                you want becomes available? And don’t want to have to check all the time, or perhaps you forget to check?
                Well if you let us know what domain you are after we will let you know when a change happens so that you
                are able to do what you need to with it faster! <a href="/register">Register Now</a> and get started.
            </span>
        </div>
        <div id="grid">
            <div class="grid-card">
                <div class="grid-heading">
                    Never Forget
                </div>
                <span>
                    Never have to worry about it again, we will store them so that you will never forget.
                </span>
            </div>
            <div class="grid-card">
                <div class="grid-heading">
                    We Remind You
                </div>
                <span>
                    When we find that a domain you are after has changed we will let you know. Never miss a chance at a domain again.
                </span>
            </div>
            <div class="grid-card">
                <div class="grid-heading">
                    Always Free
                </div>
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequats.
                </span>
            </div>
        </div>
        <div id="images">
            <div class="image-display">
                <div class="image">
                    <div class="placeholder-image">

                    </div>
                </div>
                <div class="image-text">
                    <div class="text-heading">
                        Unlimited Sites
                    </div>
                    <span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </span>
                </div>
            </div>
            <div class="image-display">
                <div class="image">
                    <div class="placeholder-image">

                    </div>
                </div>
                <div class="image-text">
                    <div class="text-heading">
                        Mobile Friendly
                    </div>
                    <span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </span>
                </div>
            </div>
            <div class="image-display">
                <div class="image">
                    <div class="placeholder-image">

                    </div>
                </div>
                <div class="image-text">
                    <div class="text-heading">
                        Easy Navigation
                    </div>
                    <span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </span>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-muted">
        <div>© Copyright 2018 DomainReminder - All Rights Reserved</div>
        <div>
            <a href="/about">About</a> &middot;
            <a href="/contact">Contact</a>
        </div>
    </footer>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="/js/scripts/smoothscroll/smooth-scroll.js"></script>
<script src="/js/scripts/dropdown/script.min.js"></script>
<script src="/js/scripts/touchswipe/jquery.touch-swipe.min.js"></script>
<script src="/js/scripts/mbr-tabs/mbr-tabs.js"></script>
<script src="/js/custom/index.js"></script>
</html>