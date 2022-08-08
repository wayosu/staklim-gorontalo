@extends('layout.app-user', ['title' => '| Informasi Hari Tanpa Hujan'])

@section('content')
<div class="breadcrumbs breadcrumbs-light">
    <div class="container">
        <h1 class="pull-left">Informasi Hari Tanpa Hujan</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="../">Beranda</a></li>
            <li class="active">Informasi Hari Tanpa Hujan</li>
        </ul>
    </div>
</div>

<div class="container content">
    <div class="row">
        <div class="col-md-8">
            @if ($latest->count() > 0)                
            <div class="blog-grid margin-bottom-30">
                <h2 class="blog-grid-title-lg">{{ $latest[0]->title }}</h2>
                <div class="overflow-h margin-bottom-10">
                    <ul class="blog-grid-info pull-left">
                        <li><i class="fa fa-pencil"></i> Admin STAKLIM BONBOL</li>
                        <li><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latest[0]->created_at)->isoFormat('LLLL') }}</li>
                    </ul>
                    <div class="pull-right">
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_sharing_toolbox"></div>
                    </div>
                </div>
                {{-- <img class="img-responsive" src="{{ asset($latest[0]->img_path) }}" alt=""> --}}
                <p>
                    {!!  $latest[0]->desc !!}
                    <img class="img-responsive" src="{{ asset($latest[0]->img) }}" alt="">
                </p>
                <div class="margin-bottom-30"></div>
            </div>
            @endif

            <div class="margin-bottom-30">
                <div class="headline">
                    <h4>Info Lainnya</h4>
                </div>
                <div class="margin-bottom-20">
                    @foreach ($others as $ot)
                    <div class="blog-author margin-bottom-30">
                        <div class="blog-author-desc">
                            <h4><a href="{{ route('view-infohth', $ot->slug ?? '') }}">{{ $ot->title ?? '' }}</a></h4>
                            <ul class="list-inline">
                                @if (!empty($ot->created_at))    
                                <li><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ot->created_at)->isoFormat('LLLL') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>	                     
                    @endforeach
                </div>
            </div>
        </div>

        @include('layout.sidecontent-user')
    </div>
</div>
@endsection
