<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('jadwal-kegiatan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                    Jadwal
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->nama }}
        </div>
    </nav>
</div>
