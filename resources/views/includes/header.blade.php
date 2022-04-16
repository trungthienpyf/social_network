<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                @if(Auth::user())

                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-link"> Xin chao {{Auth::user()->name}}</li>
                    <li class="nav-link"><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
                    @endif


        </div>
    </nav>

</header>
