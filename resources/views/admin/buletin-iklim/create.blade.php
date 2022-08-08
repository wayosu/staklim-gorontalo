@extends('layout.app', ['title' => '| Buletin Iklim | Create'])

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Form Tambah Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('buletin-iklim.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="summernote" name="desc" rows="6" class="form-control @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Pdf</label>
                        <input type="file" name="pdf" class="form-control-file">
                        <small><i class="fas fa-info-circle"></i> Extention file yang bisa di upload: PDF. Maksimal 2 MB.</small>
                        @error('pdf')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <a href="{{ route('buletin-iklim.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection