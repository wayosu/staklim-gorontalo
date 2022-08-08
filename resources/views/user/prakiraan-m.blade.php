@extends('layout.app-user', ['title' => '| Prakiraan Musim'])

@section('content')
<div class="breadcrumbs breadcrumbs-light">
    <div class="container">
        <h1 class="pull-left">Prakiraan Musim</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="../">Beranda</a></li>
            <li class="active">Prakiraan Musim</li>
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
                <img class="img-responsive" src="{{ asset($latest[0]->img_path) }}" alt="">
                <div class="margin-bottom-20"></div>
                <p>
                    {!!  $latest[0]->desc !!}
                    <iframe src="{{ asset($latest[0]->pdf_path) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                <div class="margin-bottom-30"></div>
            </div>
            @endif

            <div class="margin-bottom-30">
                <div class="headline">
                    <h4>Info Lainnya</h4>
                </div>
                <div class="row margin-bottom-20">
                    @foreach ($others as $ot)                        
                    <div class="col-md-3 col-xs-6 sm-margin-bottom-30">
                        <div class="blog-thumb-v4">
                            <img class="img-responsive margin-bottom-10" src="{{ asset($ot->img_path) }}" width="250px" height="150px" style="widht: 250px; height: 150px; object-fit: cover; object-position: center;">
                            <h3><a href="#">{{ $ot->title }}</a></h3>
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
