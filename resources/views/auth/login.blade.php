@extends('layouts.auth', ['title' => 'Login'])

@section('content')
<section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
            <div class="p-4 m-3">
                <img src="/assets/img/logo-sekolah.png" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Admin Page</span></h4>
                <p class="text-muted">Login terlebih dahulu sebeleum anda memulai.</p>
                
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autofocus>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group text-right">
                        <a href="auth-forgot-password.html" class="float-left mt-3">
                            Lupa password?
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                            Login
                        </button>
                    </div>
                </form>
                
                <div class="text-center mt-5 text-small">
                    Copyright &copy; {{ date('Y') }} SMK Darul Muqomah.
                    <br />
                    Developed by <a href="https://facebook.com/irsyadulibad.dev">Ahmad Irsyadul Ibad</a>
                </div>

            </div>
        </div>
        
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="/assets/img/login-image.jpg">
            <div class="absolute-bottom-left index-2">
                <div class="text-light p-5 pb-2">
                    <div class="mb-5 pb-3">
                        <h1 class="mb-2 display-4 font-weight-bold">@greet</h1>
                        <h5 class="font-weight-normal text-muted-transparent">Gumukmas, Jember</h5>
                    </div>
                    Photo by <a class="text-light bb" target="_blank" href="https://facebook.com/faid.eksan.9">M. Faid Eksan</a> on <a class="text-light bb" href="/">SMK Darul Muqomah</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
