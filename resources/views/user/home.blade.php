@extends('layout.app-user')

@section('content')
    <section id="berita-press-release">
        <div class="container">
            <div class="row">
                <div class="berita-utama-home col-md-8 md-margin-bottom-20">
                    <div class="headline">
                        <h4>Informasi Iklim</h4>
                    </div>
                    @if ($sliderpeta->count())        
                    <div class="berita-utama-home margin-bottom-30">
                        <div class="master-slider ms-skin-black-2 round-skin" id="masterslider">

                            @foreach ($sliderpeta as $item)                                
                            <div class="ms-slide blog-slider">
                                <img src="{{ asset('assets/user/img/blank.gif') }}" data-src="{{ asset($item->img) }}" />
                                <div class="ms-info"></div>
                                <div class="blog-slider-title">
                                    <span class="blog-slider-posted">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->isoFormat('LLLL') }}</span>
                                    <h2>
                                        <a href="{{ asset($item->img) }}" class="fancybox img-hover-v1" rel="gallery">
                                            {{ $item->title }}
                                        </a>
                                        {{-- <img class="img-responsive" data-original="{{ asset($prahd->first_img)  }}" alt="Prakiraan Hujan Dasarian"> --}}
                                        
                                    </h2>
                                </div>
                                <div class="ms-thumb">
                                    <p>
                                        {{ $item->desc }}
                                    </p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-md-4 md-margin-bottom-10">
                    <div class="headline">
                        <h4>Analisis Iklim</h4>
                    </div>
                    <div class="press-release-home-bg margin-bottom-20">
                        @if (!empty($infohth))
                        <div class="blog-thumb margin-bottom-20">
                            <div class="blog-thumb-mkg">
                                <img src="{{ asset($infohth->img ?? '') }}" alt="">
                            </div>
                            <div class="blog-thumb-desc">
                                <h3><a href="{{ route('view-infohth', $infohth->slug ?? '') }}">{{ $infohth->title ?? '' }}</a></h3>
                                <ul class="blog-thumb-info">
                                    <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $infohth->created_at)->isoFormat('LLLL') }}</li>
                                </ul>
                            </div>  
                        </div>
                        @endif
                        @if (!empty($infohb))
                        <div class="blog-thumb margin-bottom-20">
                            <div class="blog-thumb-mkg">
                                <img src="{{ asset($infohb->first_img ?? '') }}" alt="">
                            </div>
                            <div class="blog-thumb-desc">
                                <h3><a href="{{ route('view-infohb', $infohb->slug ?? '' ?? '') }}">{{ $infohb->title ?? '' }}</a></h3>
                                <ul class="blog-thumb-info">
                                    <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $infohb->created_at)->isoFormat('LLLL') }}</li>
                                </ul>
                            </div>  
                        </div>
                        @endif
                        @if (!empty($infohd))        
                        <div class="blog-thumb margin-bottom-20">
                            <div class="blog-thumb-mkg">
                                <img src="{{ asset($infohd->first_img ?? '') }}" alt="">
                            </div>
                            <div class="blog-thumb-desc">
                                <h3><a href="{{ route('view-infohd', $infohd->slug ?? '') }}">{{ $infohd->title ?? '' }}</a></h3>
                                <ul class="blog-thumb-info">
                                    <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $infohd->created_at)->isoFormat('LLLL') }}</li>
                                </ul>
                            </div>  
                        </div>
                        @endif
                        @if (!empty($indekspt))
                        <div class="blog-thumb margin-bottom-20">
                            <div class="blog-thumb-mkg">
                                <img src="{{ asset($indekspt->first_img ?? '') }}" alt="">
                            </div>
                            <div class="blog-thumb-desc">
                                <h3><a href="{{ route('view-indekspt', $indekspt->slug ?? '') }}">{{ $indekspt->title ?? '' }}</a></h3>
                                <ul class="blog-thumb-info">
                                    <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $indekspt->created_at)->isoFormat('LLLL') }}</li>
                                </ul>
                            </div>  
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="klimatologi">
        <div class="container">
            <div class="row margin-bottom-30 md-margin-bottom-10">
                @if (!empty($prahd))
                <div class="col-md-4 col-sm-6 md-margin-bottom-20">
                    <div class="headline"><h4>Prakiraan Hujan Dasarian</h4></div>
                    <div class="img-mkg-home-bg">
                        <a href="{{ asset($prahd->first_img) }}" class="fancybox img-hover-v1" rel="gallery" title="Prakiraan Hujan Dasarian">
                            <img class="img-responsive" data-original="{{ asset($prahd->first_img)  }}" alt="Prakiraan Hujan Dasarian">
                        </a>
                    </div>
                </div>
                @endif

                @if (!empty($pram))
                <div class="col-md-4 col-sm-6 md-margin-bottom-20">
                    <div class="headline"><h4>Prakiraan Musim</h4></div>
                    <div class="img-mkg-home-bg">
                        <a href="{{ route('prakiraan-musim') }}" class="img-hover-v1" rel="gallery" title="Prakiraan Musim">
                            <img class="img-responsive" src="{{ asset($pram->img_path)  }}" alt="Prakiraan Musim" style="width:100%; height: 242px;object-fit:cover;">
                        </a>
                    </div>
                </div>
                @endif

                @if (!empty($ptnbd))
                <div class="col-md-4 col-sm-6 md-margin-bottom-20">
                    <div class="headline"><h4>Potensi Banjir Dasarian</h4></div>
                    <div class="img-mkg-home-bg">
                        <a href="{{ route('potensi-banjir-dasarian') }}" class="img-hover-v1" rel="gallery" title="Prakiraan Hujan Dasarian">
                            <img class="img-responsive" src="{{ asset($ptnbd->first_img)  }}" alt="Prakiraan Hujan Dasarian">
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection
