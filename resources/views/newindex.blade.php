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
                    Domain reminder is free to use, and always will be.
                </span>
            </div>
        </div>
        <div id="images">
            <div class="image-display">
                <div class="image">
                    <img src="/img/domains.png" alt="Domain List"/>
                </div>
                <div class="image-text">
                    <div class="text-heading">
                        Unlimited Sites
                    </div>
                    <span>
                        Domain Reminder has no limits to how many domains you can add.
                    </span>
                </div>
            </div>
            <div class="image-display">
                <div class="image">
                    <img src="/img/mobile.png" alt="Domain List"/>
                </div>
                <div class="image-text">
                    <div class="text-heading">
                        Mobile Friendly
                    </div>
                    <span>
                        Domain Reminder is designed to be usable on any platform.
                    </span>
                </div>
            </div>
            <div class="image-display">
                <div class="image">
                    <img src="/img/domains.png" alt="Domain List"/>
                </div>
                <div class="image-text">
                    <div class="text-heading">
                        Easy Navigation
                    </div>
                    <span>
                        Domain Reminder's simple design makes it easy to navigate and use.
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