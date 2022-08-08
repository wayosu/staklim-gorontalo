@extends('layout.app', ['title' => '| Struktur Organisasi'])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="m-0">Struktur Organisasi</h4>
</div>
<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('strukturorganisasi.update', $strukturorganisasi->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="summernote2" name="desc" class="form-control @error('desc') is-invalid @enderror">{!! $strukturorganisasi->desc !!}</textarea>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="file" name="img" class="form-control-file">
                        <input type="hidden" name="img_lama" value="{{ $strukturorganisasi->img }}">
                        <small><i class="fas fa-info-circle"></i> Extention gambar yang bisa di upload: PNG, JPG, JPEG. Maksimal 2 MB.</small>
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <img src="{{ asset($strukturorganisasi->img) }}" alt="struktur organisasi" width="100%">
            </div>
        </div>
    </div>
</div>
@endsection