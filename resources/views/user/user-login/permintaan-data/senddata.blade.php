@extends('layout.app', ['title' => '| Permintaan Data | Kirim Data Permintaan'])

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Form Kirim Data Permintaan</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.permintaan-data.sendingdata', $data->id) }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data yang anda masukkan sudah benar?')">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Pesan</label>
                                <textarea name="pesan" class="form-control" rows="4"></textarea>
                                @error('pesan')
                                    <div class="alert alert-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>File Data Permintaan</label>
                                <input type="file" name="file_data" class="form-control-file">
                                <small><i class="fas fa-info-circle"></i> Ukuran file maksimal 4 MB.</small>
                                @error('file_data')
                                    <div class="alert alert-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{ route('admin.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Kirim Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Data Permintaan</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ $data->user->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nim</label>
                            <input type="text" class="form-control" value="{{ $data->user->nim }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Universitas</label>
                            <input type="text" class="form-control" value="{{ $data->user->universitas }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Prodi</label>
                            <input type="text" class="form-control" value="{{ $data->user->prodi }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ $data->user->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Data yang diminta</label>
                            <input type="text" class="form-control" value="{{ $data->unsur_iklim }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection