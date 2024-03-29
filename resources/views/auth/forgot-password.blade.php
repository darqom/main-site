@extends('layouts.auth', ['title' => 'Lupa Password'])

@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="/assets/img/logo-sekolah.png" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>
                
                <div class="card card-primary">
                    <div class="card-header"><h4>Lupa Password</h4></div>
                    
                    <div class="card-body">
                        <p class="text-muted">Kami akan mengirimkan url untuk mereset password anda</p>
                        @if (Session::get('status'))
                        <div class="alert alert-info">
                            Email konfirmasi berhasil dikirimkan
                        </div>
                        @endif
                        <form accept="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; SMK Darul Muqomah
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
