@auth
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    {{-- <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                        <div class="sb-nav-link-icon "><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a> --}}
                    <a class="nav-link {{ Request::is('honorer') ? 'active' : '' }}" href="/honorer">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Honorer
                    </a>
                    <a class="nav-link {{ Request::is('pns') ? 'active' : '' }}" href="/pns">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        PNS
                    </a>
                    <a class="nav-link {{ Request::is('daftar-kegiatan') ? 'active' : '' }}" href="/daftar-kegiatan">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Kegiatan
                    </a>

                    @auth
                        @if (Auth::user()->jabatan == 'ketua')
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link {{ Request::is('kegiatan') ? 'active' : '' }}" href="/kegiatan">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Daftar Kegiatan
                            </a>
                        @endif
                        @if (Auth::user()->jabatan == 'admin')
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link {{ Request::is('anggota') ? 'active' : '' }}" href="/anggota">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Daftar Anggota
                            </a>
                            <a class="nav-link {{ Request::is('kegiatan') ? 'active' : '' }}" href="/kegiatan">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Daftar Kegiatan
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                @auth
                    {{ Auth::user()->jabatan }}
                @else
                    Guest
                @endauth
            </div>
        </nav>
    </div>
@endauth
