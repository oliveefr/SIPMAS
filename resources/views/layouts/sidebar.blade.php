<li class="nav-item">
  <a class="nav-link" href="{{ route('dashboard') }}">
    <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
    <span class="menu-title">Dashboard</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ route('users.index') }}">
    <i class="mdi mdi-account-group-outline menu-icon"></i>
    <span class="menu-title">Masyarakat</span>
  </a>
</li>
{{-- 
<li class="nav-item">
  <a class="nav-link" href="{{ route('pengaduan.index') }}">
    <i class="mdi mdi-comment-alert-outline menu-icon"></i>
    <span class="menu-title">Pengaduan</span>
  </a>
</li> --}}

<li class="nav-item">
  <a class="nav-link" href="{{ route('tanggapan.index') }}">
    <i class="mdi mdi-message-reply-text menu-icon"></i>
    <span class="menu-title">Tanggapan</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ route('pengaduan.cetak.pdf') }}">
    <i class="mdi mdi-file-pdf-box menu-icon"></i>
    <span class="menu-title">Laporan</span>
  </a>
</li>

<li class="nav-item">
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="nav-link" type="submit">
      <i class="mdi mdi-logout menu-icon"></i>
      <span class="menu-title">Logout</span>
    </button>
  </form>
</li>
