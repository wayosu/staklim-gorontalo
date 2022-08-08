@extends('layout.app', ['title' => '| Buletin Iklim | Edit'])

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Form Edit Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('buletin-iklim.update', $buletiniklim->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $buletiniklim->title }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="summernote" name="desc" rows="6" class="form-control @error('desc') is-invalid @enderror">{!! $buletiniklim->desc !!}</textarea>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Pdf</label>
                        <input type="hidden" name="pdf_lama" value="{{ $buletiniklim->pdf_path }}">
                        <input type="file" name="pdf" class="form-control-file">
                        <small><i class="fas fa-info-circle"></i> Extention file yang bisa di upload: PDF. Maksimal 2 MB.</small>
                        @error('pdf')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <a href="{{ route('buletin-iklim.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body p-0">
                <iframe src="{{ asset($buletiniklim->pdf_path) }}" height="700px" width="100%" class="d-block"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection