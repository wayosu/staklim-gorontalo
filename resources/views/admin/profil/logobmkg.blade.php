@extends('layout.app', ['title' => '| Logo BMKG'])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="m-0">Logo BMKG</h4>
</div>
<div class="row justify-content-center mb-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('logobmkg.update', $logobmkg->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="summernote2" name="desc" class="form-control @error('desc') is-invalid @enderror">{!! $logobmkg->desc !!}</textarea>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="file" name="img" class="form-control-file">
                        <input type="hidden" name="img_lama" value="{{ $logobmkg->img }}">
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <img src="{{ asset($logobmkg->img) }}" alt="Logo BMKG" width="100%">
            </div>
        </div>
    </div>
</div>
@endsection