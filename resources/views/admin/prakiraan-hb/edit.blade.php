@extends('layout.app', ['title' => '| Prakiraan Hujan Bulanan | Edit'])

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Form Edit Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('prakiraan-hujan-bulanan.update', $phb->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $phb->title }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" rows="6" class="form-control @error('desc') is-invalid @enderror">{{ $phb->desc }}</textarea>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="" hidden>-Pilih Kategori-</option>
                            <option value="curah" {{ $phb->kategori == 'curah' ? 'selected' : '' }}>Curah Hujan</option>
                            <option value="sifat" {{ $phb->kategori == 'sifat' ? 'selected' : '' }}>Sifat Hujan</option>
                            <option value="peluang" {{ $phb->kategori == 'peluang' ? 'selected' : '' }}>Peluang Hujan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bulan Tahun</label>
                        <input type="month" class="form-control" name="bulan_tahun" value="{{ $phb->bulan_tahun }}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="hidden" name="img_lama" value="{{ $phb->img }}">
                        <input type="file" name="img" class="form-control-file">
                        <small><i class="fas fa-info-circle"></i> Extention gambar yang bisa di upload: PNG, JPG, JPEG. Maksimal 2 MB.</small>
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <a href="{{ route('prakiraan-hujan-bulanan.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Image</h4>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <img src="{{ asset($phb->img) }}" alt="img" width="100%">
            </div>
        </div>
    </div>
</div>
@endsection