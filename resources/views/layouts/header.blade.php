<style>
    html, body {
        margin-top: 65px !important;
    }

    /*.header {*/
    /*    position: absolute;*/
    /*    top: 0;*/
    /*    width: 100%;*/
    /*    height: 50px;*/
    /*}*/
</style>

<header class="navbar navbar-light navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ str_replace('_', '-', env('APP_NAME')) }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
            </ul>

            @if(Auth::isAuthEnabled())
                <ul class="nav navbar-nav ml-auto">
                    @if(Auth::check())
                        @if(!request()->is('dashboard'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        @endif

                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <strong>{{ Auth::user()->name }}</strong>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" href="{{ route('password.request') }}">Change Password</a>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </div>
                    @else
                        @if(Auth::isRegistrationEnabled())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif

                        @if(Auth::isLoginEnabled())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif
                    @endif
                </ul>
            @endif
        </div>
    </div>
</header>

