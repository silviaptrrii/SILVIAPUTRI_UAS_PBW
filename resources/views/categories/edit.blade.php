@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="soft-card">
            <div class="card-header-soft">
                <h3 class="fw-bold text-brand mb-1"><i class="bi bi-pencil-heart text-rose me-1"></i> Edit Kategori</h3>
                <p class="text-muted mb-0">Perbarui nama kategori agar koleksi tetap tertata.</p>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('categories.update', $category) }}">
                    @csrf
                    @method('PUT')
                    @include('categories.form')
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-check-lg me-1"></i> Update</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
