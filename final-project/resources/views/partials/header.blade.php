<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route("home")}}">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route("home")}}">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route("about")}}">About</a></li>
                {{-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.html">Sample Post</a></li>                --}}
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route("contact")}}">Contact</a>
                </li>
                @auth
                    @if (Auth::user()->isAdmin())
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{route("admin.dashboard")}}">Admin</a></li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout')}}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link px-lg-3 py-3 py-lg-4"
                                style="background: none; border: none; cursor: pointer; color: #fff; text-transform: uppercase; font-size: 0.75rem; font-weight: 800; letter-spacing: 0.0625em;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route("login")}}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
