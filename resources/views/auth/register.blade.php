@extends('layouts.app', ['title' => 'Register -'])

@section('content')
<div class="row">
    {{-- <div class="col-lg-4 d-none d-lg-block bg-register-image"></div> --}}
    <div class="col-lg-7 border border-right">
        <div class="p-5">
            <div class="text-center">
                <div class="d-flex align-items-center flex-column">
                    <img src="{{ asset('assets/LOGOBMKG.png') }}" alt="logo" width="80">
                    <h5 class="m-0 mt-3 text-dark text-uppercase" style="font-weight: 700">Stasiun Klimatologi <br>Gorontalo</h5>
                </div>
                <hr>
                <h1 class="h5 text-gray-700 mt-3 mb-3">Buat Akun!</h1>
            </div>
            <form action="{{ route('register') }}" method="post" class="user">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleInputEmail" placeholder="Nama Lengkap">
                    @error('name')                        
                    <div class="alert alert-danger small py-2 mt-1 form-control-user">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="nim" class="form-control form-control-user @error('nim') is-invalid @enderror" id="exampleInputEmail" placeholder="Nim">
                    @error('nim')                        
                    <div class="alert alert-danger small py-2 mt-1 form-control-user">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="universitas" class="form-control form-control-user @error('universitas') is-invalid @enderror" id="exampleInputEmail" placeholder="Universitas">
                    @error('universitas')                        
                    <div class="alert alert-danger small py-2 mt-1 form-control-user">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="prodi" class="form-control form-control-user @error('prodi') is-invalid @enderror" id="exampleInputEmail" placeholder="Program Studi">
                    @error('prodi')                        
                    <div class="alert alert-danger small py-2 mt-1 form-control-user">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address">
                    @error('email')                        
                    <div class="alert alert-danger small py-2 mt-1 form-control-user">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                        @error('password')                        
                        <div class="alert alert-danger small py-2 mt-1 form-control-user">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="password" name="repeat_password" class="form-control form-control-user @error('repeat_password') is-invalid @enderror" id="exampleRepeatPassword" placeholder="Repeat Password">
                        @error('repeat_password')                        
                        <div class="alert alert-danger small py-2 mt-1 form-control-user">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Daftarkan Akun
                </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('login') }}">Sudah punya akun? Login!</a>
                <br>
                <a class="small" href="{{ route('beranda') }}">Kembali ke beranda.</a>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="p-5">
            <div class="my-logcon">
                <h4>Form Permintaan Data Non Komersil</h5>
                <hr>
                <h6><span class="text-danger" style="font-weight: bold;">HARAP DIBACA</span> SEBELUM MENGAJUKAN PERMOHONAN DATA:</h6>
                <hr>
                <table class="text-justify">
                    <tr>
                        <td>1. Wajib daftarkan akun terlebih dahulu.</td>
                    </tr>
                    <tr>
                        <td>2. Manyiapkan surat pengantar dari Rektor, Dekan, Ketua Jurusan.</td>
                    </tr>
                    <tr>
                        <td>3. Membuat pernyataan tertulis.</td>
                    </tr>
                    <tr>
                        <td>4. Manyiapkan proposal penelitian.</td>
                    </tr>
                    <tr>
                        <td>5. Fotocopy/Scan Kartu Mahasiswa.</td>
                    </tr>
                    <tr>
                        <td>6. Semua file dalam format pdf (max 5 mb).</td>
                    </tr>
                    <tr>
                        <td>7. Semua form wajib diisi kecuali dua file pendukung (opsional) .</td>
                    </tr>
                    <tr>
                        <td>8. Permohonan data hanya untuk mahasiswa/wi yang mengerjakan tugas dari dosen/kampus.</td>
                    </tr>
                    <tr>
                        <td>9. Maksimal permohonan data 3 tahun berbentuk data bulanan bukan harian.</td>
                    </tr>
                    <tr>
                        <td>10. Bagi mahasiswa/wi yang mengerjakan tugas skripsi harus membawa salinan skripsinya untuk dijadikan arsip.</td>
                    </tr>
                    <tr>
                        <td>11. Permohonan data tidak akan kami tanggapi/proses jika tidak sesuai dengan ketentuan diatas.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
