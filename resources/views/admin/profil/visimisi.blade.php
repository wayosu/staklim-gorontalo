@extends('layout.app', ['title' => '| Visi & Misi'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Visi & Misi</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('visimisi.update', $visimisi->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="summernote2" name="desc" class="form-control @error('desc') is-invalid @enderror">{!! $visimisi->desc !!}</textarea>
                        @error('desc')
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
</div>
@endsection