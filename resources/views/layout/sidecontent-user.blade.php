<div class="col-md-4">
    <div class="headline">
        <h4>Informasi Iklim</h4>
    </div>
    <div class="press-release-home-bg">
        @if (!request()->routeIs('view-buletini', 'buletin-iklim'))                    
        <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-desc">
                <h3><a href="{{ route('view-buletini', $buletin->slug ?? '') }}">{{ $buletin->title ?? '' }}</a></h3>
                <ul class="blog-thumb-info">
                    @if (!empty($buletin->created_at))
                        <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $buletin->created_at)->isoFormat('LLLL') }}</li>
                    @endif
                </ul>
            </div>
        </div>
        @endif

        @if (!request()->routeIs('view-infohth','informasi-hari-tanpa-hujan'))                    
        <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-mkg wbg">
                <img data-original="{{ asset($infohth->img ?? '') }}" alt="">
            </div>
            <div class="blog-thumb-desc">
                <h3><a href="{{ route('view-infohth', $infohth->slug ?? '') }}">{{ $infohth->title ?? '' }}</a></h3>
                <ul class="blog-thumb-info">
                    @if (!empty($infohth->created_at))
                        <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $infohth->created_at)->isoFormat('LLLL') }}</li>
                    @endif
                </ul>
            </div>
        </div>
        @endif

        @if (!request()->routeIs('view-prahd', 'prakiraan-hujan-dasarian'))                    
        <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-desc">
                <div class="blog-thumb-mkg wbg">
                    <img data-original="{{ asset($prahd->first_img ?? '') }}" alt="">
                </div>
                <h3><a href="{{ route('view-prahd', $prahd->slug ?? '') }}">{{ $prahd->title ?? '' }}</a></h3>
                <ul class="blog-thumb-info">
                    @if (!empty($prahd->created_at))
                        <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $prahd->created_at)->isoFormat('LLLL') }}</li>
                    @endif
                </ul>
            </div>
        </div>
        @endif

        @if (!request()->routeIs('view-pram','prakiraan-musim'))                    
        <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-mkg wbg">
                <img data-original="{{ asset($pram->img_path ?? '') }}" alt="" style="height: 85px; object-fit:cover;">
            </div>
            <div class="blog-thumb-desc">
                <h3><a href="{{ route('view-pram', $pram->slug ?? '') }}">{{ $pram->title ?? '' }}</a></h3>
                <ul class="blog-thumb-info">
                    @if (!empty($pram->created_at))
                        <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pram->created_at)->isoFormat('LLLL') }}</li>
                    @endif
                </ul>
            </div>
        </div>
        @endif

        @if (!request()->routeIs('view-ptnbd','potensi-banjir-dasarian'))                    
        <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-mkg wbg">
                <img data-original="{{ asset($ptnbd->first_img ?? '') }}" alt="">
            </div>
            <div class="blog-thumb-desc">
                <h3><a href="{{ route('view-ptnbd', $ptnbd->slug ?? '') }}">{{ $ptnbd->title ?? '' }}</a></h3>
                <ul class="blog-thumb-info">
                    @if (!empty($infohth->created_at))
                        <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ptnbd->created_at)->isoFormat('LLLL') }}</li>
                    @endif
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>