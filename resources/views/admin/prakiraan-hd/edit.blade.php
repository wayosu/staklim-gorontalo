@extends('layout.app', ['title' => '| Prakiraan Hujan Dasarian | Edit'])

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Form Edit Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('prakiraan-hujan-dasarian.update', $prahd->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $prahd->title }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="summernote" name="desc" rows="6" class="form-control @error('desc') is-invalid @enderror">{!! $prahd->desc !!}</textarea>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="form-group">
                            <label>Image 1</label>
                            <input type="hidden" name="first_img_lama" value="{{ $prahd->first_img }}">
                            <input type="file" name="first_img" class="form-control-file">
                            <small><i class="fas fa-info-circle"></i> Extention gambar yang bisa di upload: PNG, JPG, JPEG. Maksimal 2 MB.</small>
                        @error('first_img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Image 2</label>
                            <input type="hidden" name="second_img_lama" value="{{ $prahd->second_img }}">
                            <input type="file" name="second_img" class="form-control-file">
                            <small><i class="fas fa-info-circle"></i> Extention gambar yang bisa di upload: PNG, JPG, JPEG. Maksimal 2 MB.</small>
                        @error('second_img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Image 3</label>
                            <input type="hidden" name="three_img_lama" value="{{ $prahd->three_img }}">
                            <input type="file" name="three_img" class="form-control-file">
                            <small><i class="fas fa-info-circle"></i> Extention gambar yang bisa di upload: PNG, JPG, JPEG. Maksimal 2 MB.</small>
                        @error('three_img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="form-group">
                            <label>Pdf 1</label>
                            <input type="hidden" name="first_pdf_lama" value="{{ $prahd->first_pdf }}">
                            <input type="file" name="first_pdf" class="form-control-file">
                            <small><i class="fas fa-info-circle"></i> Extention file yang bisa di upload: PDF. Maksimal 2 MB.</small>
                        @error('first_pdf')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Pdf 2</label>
                            <input type="hidden" name="second_pdf_lama" value="{{ $prahd->second_pdf }}">
                            <input type="file" name="second_pdf" class="form-control-file">
                            <small><i class="fas fa-info-circle"></i> Extention file yang bisa di upload: PDF. Maksimal 2 MB.</small>
                        @error('second_pdf')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Pdf 3</label>
                            <input type="hidden" name="three_pdf_lama" value="{{ $prahd->three_pdf }}">
                            <input type="file" name="three_pdf" class="form-control-file">
                            <small><i class="fas fa-info-circle"></i> Extention file yang bisa di upload: PDF. Maksimal 2 MB.</small>
                        @error('three_pdf')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <a href="{{ route('prakiraan-hujan-dasarian.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12 col-md-4">
        <div class="card mb-3">
            <div class="card-body p-0">
                <img src="{{ asset($prahd->first_img) }}" width="100%" height="500px" class="d-block" style="object-fit: cover;">
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body p-0">
                <iframe src="{{ asset($prahd->first_pdf) }}" height="500px" width="100%" class="d-block"></iframe>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card mb-3">
            <div class="card-body p-0">
                <img src="{{ asset($prahd->second_img) }}" width="100%" height="500px" class="d-block" style="object-fit: cover;">
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body p-0">
                <iframe src="{{ asset($prahd->second_pdf) }}" height="500px" width="100%" class="d-block"></iframe>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card mb-3">
            <div class="card-body p-0">
                <img src="{{ asset($prahd->three_img) }}" width="100%" height="500px" class="d-block" style="object-fit: cover;">
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body p-0">
                <iframe src="{{ asset($prahd->three_pdf) }}" height="500px" width="100%" class="d-block"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection