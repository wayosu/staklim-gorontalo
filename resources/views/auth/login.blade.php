@extends('layouts.app', ['title' => 'Login -'])

@section('content')
<div class="row">
    {{-- <div class="col-lg-5 d-none d-lg-block bg-login-image"></div> --}}
    <div class="col-lg-12">
        <div class="p-5 my-logcon">
            <div class="text-center">
                <div class="d-flex align-items-center flex-column">
                    <img src="{{ asset('assets/LOGOBMKG.png') }}" alt="logo" width="80">
                    <h5 class="m-0 mt-3 text-dark text-uppercase" style="font-weight: 700">Stasiun Klimatologi <br> Gorontalo</h5>
                </div>
                <hr>
                <h1 class="h5 text-gray-700 mt-3 mb-3">Welcome Back!</h1>
            </div>
            <form action="{{ route('login') }}" class="user" method="post">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalis @enderror" placeholder="Enter Email Address...">
                    @error('email')                        
                    <div class="alert alert-danger small py-2 mt-1 form-control-user">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user @error('password') is-invalis @enderror" placeholder="Password">
                    @error('password')                        
                    <div class="alert alert-danger small py-2 mt-1 form-control-user">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('register') }}">Buat akun baru!</a>
                <br>
                <a class="small" href="{{ route('beranda') }}">Kembali ke beranda.</a>
            </div>
        </div>
    </div>
</div>
@endsection
