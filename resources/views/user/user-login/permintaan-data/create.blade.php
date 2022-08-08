@extends('layout.app', ['title' => '| Form Permintaan Data | Create'])

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Form Request Data</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.permintaan-data.store') }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data yang anda masukkan sudah benar?')">
                            @csrf
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="alert alert-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Pengantar</label>
                                        <input type="file" name="pengantar" class="form-control-file">
                                        <small><i class="fas fa-info-circle"></i> Ukuran file maksimal 2 MB.</small>
                                        @error('pengantar')
                                            <div class="alert alert-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">                                    
                                    <div class="form-group">
                                        <label>Proposal</label>
                                        <input type="file" name="proposal" class="form-control-file">
                                        <small><i class="fas fa-info-circle"></i> Ukuran file maksimal 2 MB.</small>
                                        @error('proposal')
                                            <div class="alert alert-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">                                    
                                    <div class="form-group">
                                        <label>Pernyataan</label>
                                        <input type="file" name="pernyataan" class="form-control-file">
                                        <small><i class="fas fa-info-circle"></i> Ukuran file maksimal 2 MB.</small>
                                        @error('pernyataan')
                                            <div class="alert alert-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>File Pendukung 1 <span class="small text-danger">* Opsional</span></label>
                                        <input type="file" name="pendukung1" class="form-control-file">
                                        <small><i class="fas fa-info-circle"></i> Ukuran file maksimal 2 MB.</small>
                                        @error('pendukung1')
                                            <div class="alert alert-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>File Pendukung 2 <span class="small text-danger">* Opsional</span></label>
                                        <input type="file" name="pendukung2" class="form-control-file">
                                        <small><i class="fas fa-info-circle"></i> Ukuran file maksimal 2 MB.</small>
                                        @error('pendukung2')
                                            <div class="alert alert-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Data Iklim</label>
                                <select name="unsur_iklim" class="form-control @error('unsur_iklim') is-invalid @enderror">
                                    <option value="">-Pilih Data Iklim-</option>
                                    <option value="Informasi Hari Tanpa Hujan">Informasi Hari Tanpa Hujan</option>
                                    <option value="Buletin Iklim">Buletin Iklim</option>
                                    <option value="Informasi Hujan Bulanan">Informasi Hujan Bulanan</option>
                                    <option value="Informasi Hujan Dasarian">Informasi Hujan Dasarian</option>
                                    <option value="Indeks Presipitasi Terstandarisasi">Indeks Presipitasi Terstandarisasi</option>
                                    <option value="Prakiraan Hujan Bulanan">Prakiraan Hujan Bulanan</option>
                                    <option value="Prakiraan Hujan Dasarian">Prakiraan Hujan Dasarian</option>
                                    <option value="Prakiraan Musim">Prakiraan Musim</option>
                                    <option value="Potensi Banjir Dasarian">Potensi Banjir Dasarian</option>
                                </select>
                                @error('unsur_iklim')
                                    <div class="alert alert-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{ route('user.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Data Anda</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nim</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->nim }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Universitas</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->universitas }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Prodi</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->prodi }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection