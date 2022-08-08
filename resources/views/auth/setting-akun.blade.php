@extends('layout.app', ['title' => '| Setting Akun'])

@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="d-flex align-items-center mb-3">
            @role('admin')
            <a href="{{ route('admin') }}" class="btn btn-circle btn-sm btn-secondary"><i class="fas fa-chevron-left"></i></a>
            @endrole
            @role('kepalabidang')
            <a href="{{ route('kepalabidang') }}" class="btn btn-circle btn-sm btn-secondary"><i class="fas fa-chevron-left"></i></a>
            @endrole
            @role('user')
            <a href="{{ route('berandauser') }}" class="btn btn-circle btn-sm btn-secondary"><i class="fas fa-chevron-left"></i></a>
            @endrole
            <h4 class="ml-3 m-0">Setting Akun & Password</h4>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        @role('admin')
                        <form action="{{ route('admin.pengaturan.akun.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @endrole
                        @role('kepalabidang')
                        <form action="{{ route('kepalabidang.pengaturan.akun.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @endrole
                        @role('user')
                        <form action="{{ route('pengaturan.akun.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @endrole
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @role('user')
                            <div class="form-group">
                                <label>Nim</label>
                                <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ Auth::user()->nim }}">
                                @error('nim')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Universitas</label>
                                <input type="text" name="universitas" class="form-control @error('universitas') is-invalid @enderror" value="{{ Auth::user()->universitas }}">
                                @error('universitas')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Program Studi</label>
                                <input type="text" name="prodi" class="form-control @error('prodi') is-invalid @enderror" value="{{ Auth::user()->prodi }}">
                                @error('prodi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @endrole
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}">
                                @error('email')
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        @role('admin')
                        <form action="{{ route('admin.pengaturan.pass.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @endrole
                        @role('kepalabidang')
                        <form action="{{ route('kepalabidang.pengaturan.pass.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @endrole
                        @role('user')
                        <form action="{{ route('pengaturan.pass.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @endrole
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Password Sekarang</label>
                                <input type="password" name="password_sekarang" class="form-control @error('password_sekarang') is-invalid @enderror">
                                @error('password_sekarang')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="password_baru" class="form-control @error('password_baru') is-invalid @enderror">
                                @error('password_baru')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" name="konfirmasi_password" class="form-control @error('konfirmasi_password') is-invalid @enderror">
                                @error('konfirmasi_password')
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
    </div>
</div>
@endsection