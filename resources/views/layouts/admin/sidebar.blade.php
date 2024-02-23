<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link @yield('beranda')" href="{{ route('admin.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Beranda
                </a>
                <a class="nav-link @yield('jadwal')" href="{{ route('kalender.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                    Jadwal
                </a>
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link @yield('kegiatan')" href="{{ route('kegiatan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list-check"></i></div>
                    Kegiatan
                </a>
                <a class="nav-link @yield('pengguna')" href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Pengguna
                </a>
                <a class="nav-link @yield('bidang')" href="{{ route('bidang.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Bidang
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk Sebagai:</div>
            {{ Auth::user()->nama }}
        </div>
    </nav>
</div>
