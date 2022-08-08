@extends('layout.app-user', ['title' => 'Profil'])

@section('content')
<div class="breadcrumbs breadcrumbs-light">
    <div class="container">
        <h1 class="pull-left">Profil</h1>
        
        <ul class="pull-right breadcrumb">
            <li><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="text-muted">Profil</li>
        </ul>
    </div>
</div>

<div class="container content">
    <div class="row">
        <div class="col-md-8">
            <div class="blog-grid margin-bottom-30">
                @if (request()->routeIs('profil-sejarah'))
                <h2 class="blog-grid-title-lg">Sejarah</h2>
                @elseif (request()->routeIs('profil-visimisi'))
                <h2 class="blog-grid-title-lg">Visi & Misi</h2>
                @elseif (request()->routeIs('profil-tugasfungsi'))
                <h2 class="blog-grid-title-lg">Tugas & Fungsi</h2>
                @elseif (request()->routeIs('profil-strukturorganisasi'))
                <h2 class="blog-grid-title-lg">Struktur Organisasi</h2>
                @elseif (request()->routeIs('profil-logobmkg'))
                <h2 class="blog-grid-title-lg">Logo BMKG</h2>
                @endif
                <div class="overflow-h margin-bottom-10">
                    <div class="pull-right">
                        <div class="addthis_sharing_toolbox"></div>
                    </div>
                </div>
                @if (request()->routeIs('profil-sejarah'))
                <p>{!! $data->desc ?? '' !!}</p>
                @elseif (request()->routeIs('profil-visimisi'))
                <p>{!! $data->desc ?? '' !!}</p>
                @elseif (request()->routeIs('profil-tugasfungsi'))
                <p>{!! $data->desc ?? '' !!}</p>
                @elseif (request()->routeIs('profil-strukturorganisasi'))
                <p>
                    <img class="aligncenter size-full wp-image-1150 img-responsive" src="{{ asset($data->img ?? '') }}" alt="Struktur Organiasasi BMKG" width="1024" height="709" />
                    {!! $data->desc ?? '' !!}
                </p>
                @elseif (request()->routeIs('profil-logobmkg'))
                <p>
                    <a href="{{ asset($data->img ?? '') }}" target="_blank" rel="noopener">
                        <img class="aligncenter wp-image-16200 size-medium" src="{{ asset($data->img ?? '') }}" alt="" width="242" height="300" />
                    </a>
                    {!! $data->desc ?? '' !!}
                </p>
                @endif
                <div class="margin-bottom-30"></div>
            </div>
        </div>

        @include('layout.sidecontent-user')
    </div>
</div>
@endsection