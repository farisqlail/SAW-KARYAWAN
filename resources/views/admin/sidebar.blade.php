{{-- <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
  <div class="logo">
    <div class="brand">
      <img src="{{asset('assets/img/icon.png')}}" alt="logo">
    </div>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      CV.Lintas Nusa
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="{{'admin/home' == request()->path() ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('/admin/home') }}">
          <i class="material-icons">dashboard</i>
          <p>Home</p>
        </a>
      </li>
      @guest
      @else
      @if (Auth()->user()->role == 'admin')
      <li class="{{'lowongan' == request()->segment(1) ? 'active' : ''}}">
        <a class="nav-link" href="{{route('lowongan.index')}}">
          <i class="material-icons">insert_chart</i>
          <p>Lowongan</p>
        </a>
      </li>
      <li class="{{'jadwal_tes' == request()->segment(1) ? 'active' : ''}}">
        <a class="nav-link" href="{{route('jadwal_tes.index')}}">
          <i class="far fa-clock"></i>
          <p>Jadwal Tes</p>
        </a>
      </li>
      <li class="{{'perhitungan' == request()->segment(1) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('perhitungan.pelamar') }}">
          <i class="fas fa-users"></i>
          <p>Seleksi Pelamar</p>
        </a>
      </li>
      @endif
      @if (Auth()->user()->role == 'customer')
      <li class="{{'lowongan' == request()->segment(1) ? 'active' : ''}}">
        <a class="nav-link" href="{{route('lowongan.home')}}">
          <i class="material-icons">insert_chart</i>
          <p>Lihat Lowongan</p>
        </a>
      </li>
      @endif
      @endguest


    </ul>
  </div> --}}


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img src="{{ asset('assets/img/logo-jayaland.png') }}" class="img-fluid" width="200px" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div> --}}

    @if (Auth()->user()->role == 'admin')
        <li class="nav-item {{ 'lowongan' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('lowongan.index') }}">
                <i class="fas fa-user-tie"></i>
                <span>Lowongan</span></a>
        </li>
        <li class="nav-item {{ 'periode' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('lowongan.index.periode') }}">
                <i class="fas fa-user-tie"></i>
                <span>Periode Lowongan</span></a>
        </li>
        <li class="nav-item {{ 'jadwal_tes' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('jadwal_tes.index') }}">
                <i class="fas fa-clock"></i>
                <span>Jadwal Tes Dan Soal Tes</span></a>
        </li>
        <li class="nav-item {{ 'perhitungan' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('perhitungan.pelamar') }}">
                <i class="fas fa-vote-yea"></i>
                <span>Seleksi Pelamar</span></a>
        </li>
        <li class="nav-item {{ 'pengguna' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user-akses.index') }}">
                <i class="fas fa-users"></i>
                <span>Tambah Pengguna</span></a>
        </li>
        <li class="nav-item {{ 'role' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('role.index') }}">
                <i class="fas fa-user-tag"></i>
                <span>Role</span></a>
        </li>
    @elseif(Auth()->user()->role == 'direksi')
        <li class="nav-item {{ 'lowongan' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('lowongan.index') }}">
                <i class="fas fa-user-tie"></i>
                <span>Lowongan</span></a>
        </li>
        <li class="nav-item {{ 'periode' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('lowongan.index.periode') }}">
                <i class="fas fa-user-tie"></i>
                <span>Periode Lowongan</span></a>
        </li>
        <li class="nav-item {{ 'jadwal_tes' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('jadwal_tes.index') }}">
                <i class="fas fa-clock"></i>
                <span>Jadwal Tes</span></a>
        </li>
        <li class="nav-item {{ 'perhitungan' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('perhitungan.pelamar') }}">
                <i class="fas fa-vote-yea"></i>
                <span>Seleksi Pelamar</span></a>
        </li>
        <li class="nav-item {{ 'laporan' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.laporan.index') }}">
                <i class="fas fa-file"></i>
                <span>Laporan</span></a>
        </li>
        <li class="nav-item {{ 'pengguna' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user-akses.index') }}">
                <i class="fas fa-users"></i>
                <span>Tambah Pengguna</span></a>
        </li>
        <li class="nav-item {{ 'role' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('role.index') }}">
                <i class="fas fa-user-tag"></i>
                <span>Role</span></a>
        </li>
    @elseif(Auth()->user()->role == 'hrd')
        <li class="nav-item {{ 'lowongan' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('lowongan.index') }}">
                <i class="fas fa-user-tie"></i>
                <span>Lowongan</span></a>
        </li>
        {{-- <li class="nav-item {{ 'periode' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('lowongan.index.periode') }}">
                <i class="fas fa-user-tie"></i>
                <span>Periode Lowongan</span></a>
        </li> --}}
        <li class="nav-item {{ 'jadwal_tes' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('jadwal_tes.index') }}">
                <i class="fas fa-clock"></i>
                <span>Jadwal Tes</span></a>
        </li>
        <li class="nav-item {{ 'perhitungan' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('perhitungan.pelamar') }}">
                <i class="fas fa-vote-yea"></i>
                <span>Seleksi Pelamar</span></a>
        </li>
        <li class="nav-item {{ 'pelamar' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pelamar.index') }}">
                <i class="fas fa-vote-yea"></i>
                <span>Data Pelamar</span></a>
        </li>
    @elseif(Auth()->user()->role == 'divisi')
        <li class="nav-item {{ 'lowongan' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('lowongan.index') }}">
                <i class="fas fa-user-tie"></i>
                <span>Lowongan</span></a>
        </li>
        <li class="nav-item {{ 'jadwal_tes' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('jadwal_tes.index') }}">
                <i class="fas fa-clock"></i>
                <span>Jadwal Tes</span></a>
        </li>
    @endif

</ul>
<!-- End of Sidebar -->
