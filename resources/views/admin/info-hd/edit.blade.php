@extends('layout.app', ['title' => '| Informasi Hujan Dasarian | Edit'])

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Form Edit Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('informasi-hujan-dasarian.update', $infohd->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $infohd->title }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" rows="6" class="form-control @error('desc') is-invalid @enderror">{{ $infohd->desc }}</textarea>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image 1</label>
                        <input type="hidden" name="first_img_lama" value="{{ $infohd->first_img }}">
                        <input type="file" name="first_img" class="form-control-file">
                        <small><i class="fas fa-info-circle"></i> Extention gambar yang bisa di upload: PNG, JPG, JPEG. Maksimal 2 MB.</small>
                        @error('first_img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image 2</label>
                        <input type="hidden" name="second_img_lama" value="{{ $infohd->second_img }}">
                        <input type="file" name="second_img" class="form-control-file">
                        <small><i class="fas fa-info-circle"></i> Extention gambar yang bisa di upload: PNG, JPG, JPEG. Maksimal 2 MB.</small>
                        @error('second_img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <a href="{{ route('informasi-hujan-dasarian.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card mb-3">
            <div class="card-body p-0">
                <img src="{{ asset($infohd->first_img) }}" width="100%" height="300px" class="d-block" style="object-fit: cover;">
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <img src="{{ asset($infohd->second_img) }}" width="100%" height="300px" class="d-block" style="object-fit: cover;">
            </div>
        </div>
    </div>
</div>
@endsection