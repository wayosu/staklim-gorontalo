<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img src="{{asset('assets/LOGOBMKG.png')}}" alt="" width="40px">
        <div class="sidebar-brand-text mx-3"><small>STAKLIM Gorontalo</small></div>
    </a>

    <!-- GARIS -->
    <hr class="sidebar-divider my-0">

    @role('admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Iklim
    </div>

    <!-- NAV ITEM MONITORING IKLIM -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#monitoringiklim"
            aria-expanded="true" aria-controls="monitoringiklim">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Monitoring Iklim</span>
        </a>
        <div id="monitoringiklim" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Monitoring Iklim:</h6>
                <a class="collapse-item" href="{{ route('infohth') }}">Informasi Hari<br>Tanpa Hujan</a>
                <a class="collapse-item" href="{{ route('buletin-iklim.index') }}">Buletin Iklim</a>
            </div>
        </div>
    </li>

    <!-- NAV ITEM ANALISIS IKLIM -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#analisiiklim"
            aria-expanded="true" aria-controls="analisiiklim">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Analisis Iklim</span>
        </a>
        <div id="analisiiklim" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Analisis Iklim:</h6>
                <a class="collapse-item" href="{{ route('informasi-hujan-bulanan.index') }}">Informasi Hujan<br>Bulanan</a>
                <a class="collapse-item" href="{{ route('informasi-hujan-dasarian.index') }}">Informasi Hujann<br>Dasarian</a>
                <a class="collapse-item" href="{{ route('indekspt.index') }}">Indeks Presipitasi<br>Terstandarisasi</a>
            </div>
        </div>
    </li>

     <!-- NAV ITEM PRAKIRAAN IKLIM -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#prakiraaniklim"
            aria-expanded="true" aria-controls="prakiraaniklim">
            <i class="fas fa-fw fa-cloud-sun-rain"></i>
            <span>Prakiraan Iklim</span>
        </a>
        <div id="prakiraaniklim" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Prakiraan Iklim:</h6>
                <a class="collapse-item" href="{{ route('prakiraan-hujan-bulanan.index') }}">Prakiraan Hujan<br>Bulanan</a>
                <a class="collapse-item" href="{{ route('prakiraan-hujan-dasarian.index') }}">Prakiraan Hujan<br>Dasarian</a>
                <a class="collapse-item" href="{{ route('prakiraan-musim.index') }}">Prakiraan Musim</a>
                <a class="collapse-item" href="{{ route('potensi-banjir-dasarian.index') }}">Potensi Banjir<br>Dasarian</a>
            </div>
        </div>
    </li>

    <!-- GARIS -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Permohonan Data
    </div>

    <!-- NAV PERMOHONAN DATA -->
    <li class="nav-item">   
        <a class="nav-link" href="{{ route('admin.permintaan-data') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Permohonan Data</span></a>
    </li>

    <!-- GARIS -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Lainnya
    </div>

    <li class="nav-item">   
        <a class="nav-link" href="{{ route('sliderpeta') }}">
            <i class="fas fa-fw fa-map"></i>
            <span>Slider Peta</span></a>
    </li>

    <!-- Navigasi Pengaturan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#profil"
            aria-expanded="true" aria-controls="profil">
            <i class="fas fa-fw fa-building"></i>
            <span>Profil</span>
        </a>
        <div id="profil" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Profil:</h6>
                <a class="collapse-item" href="{{ route('sejarah') }}">Sejarah</a>
                <a class="collapse-item" href="{{ route('visimisi') }}">Visi & Misi</a>
                <a class="collapse-item" href="{{ route('tugasfungsi') }}">Tugas & Fungsi</a>
                <a class="collapse-item" href="{{ route('strukturorganisasi') }}">Struktur Organisasi</a>
                <a class="collapse-item" href="{{ route('logobmkg') }}">Logo BMKG</a>
            </div>
        </div>
    </li>
    @endrole

    @role('kepalabidang')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kepalabidang') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- NAV PERMOHONAN DATA -->
    <li class="nav-item">   
        <a class="nav-link" href="{{ route('kepalabidang.permintaan-data') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Permohonan Data</span></a>
    </li>
    @endrole

    @role('user')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('berandauser') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- NAV PERMOHONAN DATA -->
    <li class="nav-item">   
        <a class="nav-link" href="{{ route('user.permintaan-data') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Permohonan Data</span></a>
    </li>
    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->