<div class="navbar mega-menu" role="navigation">
    <div class="container">
        <div class="res-container">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="navbar-brand">
                <a href="{{ route('beranda') }}">
                    <img src="{{ asset('assets/user/img/logo-bmkg.png') }}" alt="Logo">
                    <span class="hidden-xs hidden-md">Stasiun Klimatologi Gorontalo</span>
                </a>
                <span class="hidden-xs hidden-md slogan">Cepat, Tepat, Akurat, Luas, dan Mudah
                    Dipahami</span>
            </div>
        </div>
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <div class="res-container">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('beranda') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="dropdown mega-menu-fullwidth">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            Profil
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 md-margin-bottom-30">
                                                <h2>Profil</h2>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul class="dropdown-link-list">
                                                            <li>
                                                                <a href="{{ route('profil-sejarah') }}">Sejarah</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('profil-visimisi') }}">Visi & Misi</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('profil-tugasfungsi') }}">Tugas & Fungsi</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="dropdown-link-list">
                                                            <li>
                                                                <a href="{{ route('profil-strukturorganisasi') }}">Struktur Organisasi</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('profil-logobmkg') }}">Logo BMKG</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown mega-menu-fullwidth">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            Iklim
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 md-margin-bottom-30">
                                                <h2>Monitoring Iklim</h2>
                                                <ul class="dropdown-link-list">
                                                    <li><a href="{{ route('informasi-hari-tanpa-hujan') }}">Informasi Hari Tanpa Hujan</a>
                                                    </li>
                                                    <li><a href="{{ route('buletin-iklim') }}">Buletin Iklim</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4 md-margin-bottom-30">
                                                <h2>Analisis Iklim</h2>
                                                <ul class="dropdown-link-list">
                                                    <li><a href="{{ route('informasi-hujan-bulanan') }}">Informasi
                                                            Hujan Bulanan</a></li>
                                                    <li><a href="{{ route('informasi-hujan-dasarian') }}">Informasi
                                                        Hujan Dasarian</a></li>
                                                    <li><a
                                                            href="{{ route('indeks-presipitasi-terstandarisasi') }}">Indeks
                                                            Presipitasi Terstandarisasi</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4 md-margin-bottom-30">
                                                <h2>Prakiraan Iklim</h2>
                                                <ul class="dropdown-link-list">
                                                    <li><a href="{{ route('prakiraan-hujan-bulanan') }}">Prakiraan
                                                            Hujan Bulanan</a></li>
                                                    <li><a href="{{ route('prakiraan-hujan-dasarian') }}">Prakiraan
                                                            Hujan Dasarian</a></li>
                                                    <li><a href="{{ route('prakiraan-musim') }}">Prakiraan
                                                            Musim</a></li>
                                                    <li><a href="{{ route('potensi-banjir-dasarian') }}">Potensi
                                                            Banjir Dasarian</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('register') }}">
                            Permohonan Data
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>