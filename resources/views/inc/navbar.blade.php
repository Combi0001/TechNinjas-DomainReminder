<!--<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-customa">-->
<nav class="navbar navbar-expand-md navbar-dark ">
    <div class="menu-logo">
        <a href="/">
            <img class="img-responsive" src="/img/template/domainreminderlogo.png">
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link link text-white" href="/about">
                    <span class="mbri-info mbr-iconfont mbr-iconfont-btn"></span>About
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link link text-white" href="/contact">
                    <span class="mbri-info mbr-iconfont mbr-iconfont-btn"></span>Contact
                </a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link link text-blue" href="{{ route('login') }}">
                    <span class="mbri-info mbr-iconfont mbr-iconfont-btn"></span>{{ __('Login') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link lin text-blue" href="{{ route('register') }}">
                    <span class="mbri-info mbr-iconfont mbr-iconfont-btn"></span>{{ __('Register') }}
                </a>
            </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-blue dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <ul>
                            <li><a href="/home">Home</a></li>
                            <li><a href="/domains">Domains</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
