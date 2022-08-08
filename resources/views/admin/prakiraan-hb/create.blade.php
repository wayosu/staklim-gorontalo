@extends('layout.app', ['title' => '| Prakiraan Hujan Bulanan | Create'])

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Form Tambah Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('prakiraan-hujan-bulanan.store') }}" method="post" enctype="multipart/form-data">
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
                        <textarea name="desc" rows="6" class="form-control @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="" hidden>-Pilih Kategori-</option>
                            <option value="curah">Curah Hujan</option>
                            <option value="sifat">Sifat Hujan</option>
                            <option value="peluang">Peluang Hujan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bulan Tahun</label>
                        <input type="month" class="form-control" name="bulan_tahun">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="img" class="form-control-file">
                        <small><i class="fas fa-info-circle"></i> Extention gambar yang bisa di upload: PNG, JPG, JPEG. Maksimal 2 MB.</small>
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <a href="{{ route('prakiraan-hujan-bulanan.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection