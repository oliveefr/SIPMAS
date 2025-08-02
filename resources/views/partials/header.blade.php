<header id="header" class="header sticky-top">
    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="d-none d-md-flex align-items-center">
                <i class="bi bi-clock me-1"></i>
                <span id="current-time"></span>
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-phone me-1"></i> Hubungi Kami +62 821-3462-6573
            </div>
        </div>
    </div>

    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-end">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('assets/img/logo/logo-SIPMAS.png') }}" alt="" style="height: 90px; width: auto;">
            </a>

            <nav id="navmenu" class="menu">

                @auth
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/img/akun-profil.png') }}" alt="profil" class="rounded-circle me-2"
                                style="width: 40px; height: 40px; object-fit: cover;">
                            <strong class="text-dark">{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person me-2"></i> Profil
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endif
                @endauth

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>