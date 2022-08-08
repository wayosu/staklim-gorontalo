@extends('layout.app-user', ['title' => '| Prakiraan Hujan Bulanan'])

@section('content')
<div class="breadcrumbs breadcrumbs-light">
    <div class="container">
        <h1 class="pull-left">Prakiraan Iklim</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="../">Beranda</a></li>
            <li class="active">Prakiraan Iklim</li>
        </ul>
    </div>
</div>

<div class="container content">
    <div class="row">
        <div class="col-md-8 margin-bottom-20">
            <div class="blog-grid margin-bottom-30">
                <h2 class="blog-grid-title-lg">Prakiraan Hujan Bulanan</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                {{ $month_name1 ?? '' }}
                            </th>
                            
                            <th>
                                {{ $month_name2 ?? '' }}
                            </th>
                            
                            <th>
                                {{ $month_name3 ?? '' }}
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#" data-toggle="modal" data-target="#BC1">{{ $month_curah1->title ?? '-' }}</a></td>
                            <td><a href="#" data-toggle="modal" data-target="#BC2">{{ $month_curah2->title ?? '-' }}</a></td>
                            <td><a href="#" data-toggle="modal" data-target="#BC3">{{ $month_curah3->title ?? '-' }}</a></td>
                        </tr>
                        <tr>
                            <td><a href="#" data-toggle="modal" data-target="#BS1">{{ $month_sifat1->title ?? '-' }}</a></td>
                            <td><a href="#" data-toggle="modal" data-target="#BS2">{{ $month_sifat2->title ?? '-' }}</a></td>
                            <td><a href="#" data-toggle="modal" data-target="#BS3">{{ $month_sifat3->title ?? '-' }}</a></td>
                        </tr> 
                    </tbody>
                </table>
                <br><br>
                <p><b>Prakiraan Curah Hujan Probabilistik</b></p>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ $month_name1 ?? '' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($month_peluang1 as $mp1)                                    
                                <tr>
                                    <td><a href="#" data-toggle="modal" data-target="#BPSATU{{ $loop->iteration }}">{{ $mp1->title ?? '-' }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-12 col-md-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ $month_name2 ?? '' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($month_peluang2 as $mp2)                                    
                                <tr>
                                    <td><a href="#" data-toggle="modal" data-target="#BPDUA{{ $loop->iteration }}">{{ $mp2->title ?? '-' }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-12 col-md-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ $month_name3 ?? '' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($month_peluang3 as $mp3)                                    
                                <tr>
                                    <td><a href="#" data-toggle="modal" data-target="#BPTIGA{{ $loop->iteration }}">{{ $mp3->title ?? '-' }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layout.sidecontent-user')
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="BC1" tabindex="-1" role="dialog" aria-labelledby="BC1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Prakiraan Curah Hujan</h4>
        </div>
        <div class="modal-body">
            <img src="{{ asset($month_curah1->img ?? '') }}" width="100%">
            <p class="m-0">{{ $month_curah1->desc ?? '' }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="BC2" tabindex="-1" role="dialog" aria-labelledby="BC2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Prakiraan Curah Hujan</h4>
        </div>
        <div class="modal-body">
            <img src="{{ asset($month_curah2->img ?? '') }}" width="100%">
            <p class="m-0">{{ $month_curah2->desc ?? '' }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="BC3" tabindex="-1" role="dialog" aria-labelledby="BC3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Prakiraan Curah Hujan</h4>
        </div>
        <div class="modal-body">
            <img src="{{ asset($month_curah3->img ?? '') }}" width="100%">
            <p class="m-0">{{ $month_curah3->desc ?? '' }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="BS1" tabindex="-1" role="dialog" aria-labelledby="BS1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Prakiraan Sifat Hujan</h4>
        </div>
        <div class="modal-body">
            <img src="{{ asset($month_sifat1->img ?? '') }}" width="100%">
            <p class="m-0">{{ $month_sifat1->desc ?? '' }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="BS2" tabindex="-1" role="dialog" aria-labelledby="BS2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Prakiraan Sifat Hujan</h4>
        </div>
        <div class="modal-body">
            <img src="{{ asset($month_sifat2->img ?? '') }}" width="100%">
            <p class="m-0">{{ $month_sifat2->desc ?? '' }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="BS3" tabindex="-1" role="dialog" aria-labelledby="BS3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Prakiraan Sifat Hujan</h4>
        </div>
        <div class="modal-body">
            <img src="{{ asset($month_sifat3->img ?? '') }}" width="100%">
            <p class="m-0">{{ $month_sifat3->desc ?? '' }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
</div>

@foreach ($month_peluang1 as $mp1)
<div class="modal fade" id="BPSATU{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="BPSATU{{ $loop->iteration }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Prakiraan Peluang Hujan</h4>
        </div>
        <div class="modal-body">
            <img src="{{ asset($mp1->img ?? '') }}" width="100%">
            <p class="m-0">{{ $mp1->desc ?? '' }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($month_peluang2 as $mp2)
<div class="modal fade" id="BPDUA{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="BPDUA{{ $loop->iteration }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Prakiraan Peluang Hujan</h4>
        </div>
        <div class="modal-body">
            <img src="{{ asset($mp2->img ?? '') }}" width="100%">
            <p class="m-0">{{ $mp2->desc ?? '' }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($month_peluang3 as $mp3)
<div class="modal fade" id="BPTIGA{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="BPTIGA{{ $loop->iteration }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Prakiraan Peluang Hujan</h4>
        </div>
        <div class="modal-body">
            <img src="{{ asset($mp3->img ?? '') }}" width="100%">
            <p class="m-0">{{ $mp3->desc ?? '' }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
</div>
@endforeach

@endsection