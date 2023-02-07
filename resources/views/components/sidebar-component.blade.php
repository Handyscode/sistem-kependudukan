<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon">
      <img src="{{ asset('img/logo_pemkot_serang.svg') }}" width="50" height="50">
    </div>
    <div class="sidebar-brand-text mx-3 text-left" style="font-size: 12px;">Sistem Informasi Kependudukan</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Dashboard
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  @if (Auth::user()->role == 'admin')
    <li class="nav-item  {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
      <a class="nav-link" href="/">
        <i class="fa-solid fa-house"></i>
        <span>Home</span>
      </a>
    </li>

    <li class="nav-item  {{ request()->routeIs('datawarga*') ? 'active' : '' }}">
      <a class="nav-link" href="/data-warga">
        <i class="fa-solid fa-users-rectangle"></i>
        <span>Data Warga</span>
      </a>
    </li>

    <li class="nav-item  {{ request()->routeIs('laporan*') ? 'active' : '' }}">
      <a class="nav-link" href="/laporan">
        <i class="fa-solid fa-scroll"></i>
        <span>Laporan</span>
      </a>
    </li>

    <li class="nav-item  {{ request()->routeIs('datauser*') ? 'active' : '' }}">
      <a class="nav-link" href="/data-user">
        <i class="fa-solid fa-users"></i>
        <span>Data User</span>
      </a>
    </li>
  @else
    <li class="nav-item {{ request()->routeIs('input*') ? 'active' : '' }}">
      <a class="nav-link " href="/input">
        <i class="fas fa-fw fa-keyboard"></i>
        <span>Input Data</span>
      </a>
    </li>

    <li class="nav-item  {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
      <a class="nav-link" href="/">
        <i class="fa-solid fa-boxes-stacked"></i>
        <span>Data Saya</span>
      </a>
    </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>