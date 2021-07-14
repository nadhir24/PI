<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="index.html">Forex Academy</a>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a 
                    class="nav-link {{ request()->is('/') ? 'active' : '' }}" 
                href="{{ route('home') }}">Home</a></li>
                <li class="nav-item {{ request()->is('artikel') ? 'active' : '' }}"><a class="nav-link" href="{{ route('artikel') }}">artikel</a></li>
                <li class="nav-item {{ request()->is('berita') ? 'active' : '' }}"><a class="nav-link" href="{{ route('berita') }}">berita</a></li>
                <li class="nav-item"><a class="nav-link" href="about-us.html">analisa</a></li>
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="#">faq</a></li>
              {{-- </ul><a href="login.html">login/register</a> --}}
              @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Log Out</button>
                    </form>
                </li>
              @endauth
              
              @guest
                <li class="nav-item {{ request()->is('login') ? 'active' : '' }}"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              @endguest
        </div><button data-target="#navcol-1" data-toggle="collapse" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    </div>
</nav>