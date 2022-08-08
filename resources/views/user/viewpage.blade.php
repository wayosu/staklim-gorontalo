@extends('layout.app-user')

@section('content')
<div class="breadcrumbs breadcrumbs-light">
    <div class="container">
        @if (request()->routeIs('view-infohth'))
        <h1 class="pull-left">Informasi Hari Tanpa Hujan</h1>
        @elseif (request()->routeIs('view-buletini'))
        <h1 class="pull-left">Buletin Iklim</h1>
        @elseif (request()->routeIs('view-infohb'))
        <h1 class="pull-left">Informasi Hujan Bulanan</h1>
        @elseif (request()->routeIs('view-infohd'))
        <h1 class="pull-left">Informasi Hujan Dasarian</h1>
        @elseif (request()->routeIs('view-indekspt'))
        <h1 class="pull-left">Indeks Presipitasi Terstandarisasi</h1>
        @elseif (request()->routeIs('view-prahd'))
        <h1 class="pull-left">Prakiraan Hujan Dasarian</h1>
        @elseif (request()->routeIs('view-pram'))
        <h1 class="pull-left">Prakiraan Musim</h1>
        @elseif (request()->routeIs('view-ptnbd'))
        <h1 class="pull-left">Potensi Banjir Dasarian</h1>
        @endif
        <ul class="pull-right breadcrumb">
            <li><a href="../">Beranda</a></li>
            <li class="text-muted">Iklim</li>
            @if (request()->routeIs('view-infohth'))
            <li class="active">Informasi Hari Tanpa Hujan</li>
            @elseif (request()->routeIs('view-buletini'))
            <li class="active">Buletin Iklim</li>
            @elseif (request()->routeIs('view-infohb'))
            <li class="active">Informasi Hujan Bulanan</li>
            @elseif (request()->routeIs('view-infohd'))
            <li class="active">Informasi Hujan Dasarian</li>
            @elseif (request()->routeIs('view-indekspt'))
            <li class="active">Indeks Presipitasi Terstandarisasi</li>
            @elseif (request()->routeIs('view-prahd'))
            <li class="active">Prakiraan Hujan Dasarian</li>
            @elseif (request()->routeIs('view-pram'))
            <li class="active">Prakiraan Musim</li>
            @elseif (request()->routeIs('view-ptnbd'))
            <li class="active">Potensi Banjir Dasarian</li>
            @endif
        </ul>
    </div>
</div>

<div class="container content">
    <div class="row">
        <div class="col-md-8">
            <div class="blog-grid margin-bottom-30">
                <h2 class="blog-grid-title-lg">{{ $data->title }}</h2>
                <div class="overflow-h margin-bottom-10">
                    <ul class="blog-grid-info pull-left">
                        <li><i class="fa fa-pencil"></i> Admin STAKLIM BONBOL</li>
                        <li><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->isoFormat('LLLL') }}</li>
                    </ul>
                    <div class="pull-right">
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_sharing_toolbox"></div>
                    </div>
                </div>
                {{-- <img class="img-responsive" src="{{ asset($latest[0]->img_path) }}" alt=""> --}}
                @if (request()->routeIs('view-infohth'))
                <p>
                    {!!  $data->desc !!}
                    <img class="img-responsive" src="{{ asset($data->img) }}" alt="">
                </p>
                @elseif (request()->routeIs('view-buletini'))
                <p>
                    {!!  $data->desc !!}
                    <iframe src="{{ asset($data->pdf_path) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                @elseif (request()->routeIs('view-infohb'))
                {!!  $data->desc !!}
                <img class="img-responsive" src="{{ asset($data->first_img) }}" alt="">
                <img class="img-responsive" src="{{ asset($data->second_img) }}" alt="">
                @elseif (request()->routeIs('view-infohd'))
                {!!  $data->desc !!}
                <img class="img-responsive" src="{{ asset($data->first_img) }}" alt="">
                <img class="img-responsive" src="{{ asset($data->second_img) }}" alt="">
                @elseif (request()->routeIs('view-indekspt'))
                {!!  $data->desc !!}
                <img class="img-responsive" src="{{ asset($data->first_img) }}" alt="">
                <p>
                    <iframe src="{{ asset($data->first_pdf) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                <img class="img-responsive" src="{{ asset($data->second_img) }}" alt="">
                <p>
                    <iframe src="{{ asset($data->second_pdf) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                @elseif (request()->routeIs('view-prahd'))
                {!! $data->desc ?? '' !!}
                <div class="margin-bottom-10"></div>
                <img class="img-responsive" src="{{ asset($data->first_img) }}" alt="">
                <p>
                    <iframe src="{{ asset($data->first_pdf) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                <img class="img-responsive" src="{{ asset($data->second_img) }}" alt="">
                <p>
                    <iframe src="{{ asset($data->second_pdf) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                <img class="img-responsive" src="{{ asset($data->three_img) }}" alt="">
                <p>
                    <iframe src="{{ asset($data->three_pdf) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                @elseif (request()->routeIs('view-pram'))
                <img class="img-responsive" src="{{ asset($data->img_path) }}" alt="">
                <div class="margin-bottom-20"></div>
                <p>
                    {!!  $data->desc !!}
                    <iframe src="{{ asset($data->pdf_path) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                @elseif (request()->routeIs('view-ptnbd'))
                {!! $data->desc ?? '' !!}
                <div class="margin-bottom-10"></div>
                <img class="img-responsive" src="{{ asset($data->first_img) }}" alt="">
                <p>
                    <iframe src="{{ asset($data->first_pdf) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                <img class="img-responsive" src="{{ asset($data->second_img) }}" alt="">
                <p>
                    <iframe src="{{ asset($data->second_pdf) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                <img class="img-responsive" src="{{ asset($data->three_img) }}" alt="">
                <p>
                    <iframe src="{{ asset($data->three_pdf) }}"
                        width="100%" height="750px" allowfullscreen="allowfullscreen"></iframe>
                </p>
                @endif
                <div class="margin-bottom-30"></div>
            </div>

            <div class="margin-bottom-30">
                <div class="headline">
                    <h4>Info Lainnya</h4>
                </div>
                <div class="margin-bottom-20">
                    @foreach ($others as $ot)
                    <div class="blog-author margin-bottom-30">
                        <div class="blog-author-desc">
                            <h4>
                                @if (request()->routeIs('view-infohth'))
                                <a href="{{ route('view-infohth', $ot->slug) }}">{{ $ot->title }}</a>
                                @elseif (request()->routeIs('view-buletini'))
                                <a href="{{ route('view-buletini', $ot->slug) }}">{{ $ot->title }}</a>
                                @elseif (request()->routeIs('view-infohb'))
                                <a href="{{ route('view-infohb', $ot->slug) }}">{{ $ot->title }}</a>
                                @elseif (request()->routeIs('view-infohd'))
                                <a href="{{ route('view-infohd', $ot->slug) }}">{{ $ot->title }}</a>
                                @elseif (request()->routeIs('view-indekspt'))
                                <a href="{{ route('view-indekspt', $ot->slug) }}">{{ $ot->title }}</a>
                                @elseif (request()->routeIs('view-prahd'))
                                <a href="{{ route('view-prahd', $ot->slug) }}">{{ $ot->title }}</a>
                                @elseif (request()->routeIs('view-pram'))
                                <a href="{{ route('view-pram', $ot->slug) }}">{{ $ot->title }}</a>
                                @elseif (request()->routeIs('view-ptnbd'))
                                <a href="{{ route('view-ptnbd', $ot->slug) }}">{{ $ot->title }}</a>
                                @endif
                            </h4>
                            <ul class="list-inline">
                                <li><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ot->created_at)->isoFormat('LLLL') }}</a></li>
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
