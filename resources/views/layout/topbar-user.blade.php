<div class="blog-topbar">
    <div class="topbar-search-block">
        <div class="container">
            <form action="">
                <input type="text" class="form-control" placeholder="Pencarian...">
                <div class="search-close"><i class="icon-close"></i></div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="topbar-time hari-digit hidden-xs">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</div>
                <div class="topbar-toggler"><span class="fa fa-angle-down"></span></div>
                <ul class="topbar-list topbar-menu">
                    <li class="hidden-sm hidden-md hidden-lg hari-digit">Kamis, 28 Juli 2022</li>
                    <li class="hidden-sm hidden-md hidden-lg" id="timecontainer1"></li>
                </ul>
            </div>
            <div class="col-sm-8 col-xs-12 clearfix">
                @auth
                <div class="topbar-time pull-right">
                    @role('admin')
                    <a href="{{ route('admin') }}" style="color: white; font-size: 12px;">
                        <span>Kembali</span> 
                        <i class="fa fa-angle-right"></i>
                    </a>
                    @endrole
                    @role('kepalabidang')
                    <a href="{{ route('kepalabidang') }}" style="color: white; font-size: 12px;">
                        <span>Kembali</span> 
                        <i class="fa fa-angle-right"></i>
                    </a>
                    @endrole
                    @role('user')
                    <a href="{{ route('berandauser') }}" style="color: white; font-size: 12px;">
                        <span>Kembali</span> 
                        <i class="fa fa-angle-right"></i>
                    </a>
                    @endrole
                </div>
                @else
                <div class="topbar-time pull-right">
                    <a href="{{ route('login') }}" style="color: white; font-size: 12px;">
                        <span>Login</span> 
                    </a>
                </div>
                @endauth
                <div id="timecontainer" class="topbar-time pull-right hidden-xs"></div>
            </div>
        </div>
    </div>
</div>