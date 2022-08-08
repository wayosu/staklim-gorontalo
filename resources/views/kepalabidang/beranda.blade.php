@extends('layout.app', ['title' => 'Beranda'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Beranda</h4>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body p-0">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($sliderpetas as $indicator)  
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($sliderpetas as $key => $item)                    
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img class="d-block" src="{{ asset($item->img) }}" alt="First slide" style="width: 100%;height: 600px;object-fit: cover;object-position:center;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4>{{ $item->title }}</h5>
                                        <p>{{ $item->desc }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-primary shadow py-2 mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 mb-0 font-weight-bold text-gray-800">
                                    {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-left-success shadow py-2 mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h3 mb-0 font-weight-bold text-gray-800">
                                    <span id="jam"></span> : <span id="menit"></span> : <span id="detik"></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function refreshTime() {
        var waktu = new Date();
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
    
    setInterval(refreshTime, 1000);
</script>
@endsection
