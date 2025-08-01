<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SIPMAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto">
                @auth
                    @role('masyarakat')
                        <li class="nav-item"><a class="nav-link" href="{{ route('pengaduan.index') }}">Pengaduan</a></li>
                    @endrole

                    @role('admin_master|petugas')
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Data Masyarakat</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('tanggapan.index') }}">Tanggapan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pengaduan.cetak.pdf') }}">Cetak PDF</a></li>
                    @endrole
                @endauth
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <span class="nav-link disabled">Login sebagai: <strong>
                            @role('admin_master') Admin Master @endrole
                            @role('petugas') Petugas @endrole
                            @role('masyarakat') Masyarakat @endrole
                        </strong></span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-light btn-sm ms-2" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
