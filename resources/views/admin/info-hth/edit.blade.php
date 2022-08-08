@extends('layout.app', ['title' => '| Informasi Hari Tanpa Hujan | Edit'])

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Form Edit Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('update_infohth', $infohth->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $infohth->title }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" rows="6" class="form-control @error('desc') is-invalid @enderror">{{ $infohth->desc }}</textarea>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <img src="{{ asset($infohth->img) }}" alt="" width="300" class="d-block mb-3">
                        <input type="hidden" name="img_lama" value="{{ $infohth->img }}">
                        <input type="file" name="img" class="form-control-file">
                        <small><i class="fas fa-info-circle"></i> Extention gambar yang bisa di upload: PNG, JPG, JPEG. Maksimal 2 MB.</small>
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <a href="{{ route('infohth') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection