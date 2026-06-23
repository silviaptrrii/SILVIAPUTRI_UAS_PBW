@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center align-items-center g-4">
    <div class="col-lg-6">
        <div class="soft-card p-4 p-md-5">
            <div class="text-center mb-4">
                <div class="brand-icon mx-auto mb-3"><i class="bi bi-heart"></i></div>
                <h1 class="font-display text-brand mb-1">Create Your Style Space</h1>
                <p class="text-muted mb-0">Buat akun untuk mulai menyimpan koleksi pakaian dan outfit.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    </div>
                </div>
                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-person-plus me-1"></i> Register</button>
            </form>
            <p class="text-center mt-4 mb-0 text-muted">Sudah punya akun? <a class="fw-semibold" href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</div>
@endsection
