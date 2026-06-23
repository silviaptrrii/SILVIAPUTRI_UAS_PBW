@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="soft-card">
            <div class="card-header-soft">
                <h3 class="fw-bold text-brand mb-1"><i class="bi bi-plus-circle text-rose me-1"></i> Tambah Kategori</h3>
                <p class="text-muted mb-0">Contoh kategori: Casual, Kampus, Formal, Party, Sepatu.</p>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    @include('categories.form')
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
