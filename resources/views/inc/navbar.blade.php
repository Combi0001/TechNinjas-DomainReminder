
<!--<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-customa">-->
<nav class="navbar navbar-expand-md navbar-dark "style="background-color: #540032 " >
    <div class="menu-logo">
        <div class="navbar-brand">
            <!--<span class="navbar-logo">
                <a href="/">
                     <img src="/img/icon-60x60.png" alt="domainrem" title="" style="height: 3.8rem;">
                </a>
            </span>-->
            <span class="navbar-caption-wrap"><a class="navbar-caption ml-auto text-white display-4" href="/"><img class="img-responsive" src="/img/template/logodesksmS.png"></a></span>
        </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link link text-white display-4" href="/about">
                    <span class="mbri-info mbr-iconfont mbr-iconfont-btn"></span>About
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link link text-white display-4" href="/contact">
                    <span class="mbri-info mbr-iconfont mbr-iconfont-btn"></span>Contact
                </a>
            </li>
        </ul>
        @guest
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        @else

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/domains">Domains</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </li>

        @endguest
    </div>
</nav>