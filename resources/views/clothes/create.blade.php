@extends('layouts.app')

@section('title', 'Tambah Pakaian')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="soft-card">
            <div class="card-header-soft">
                <h3 class="fw-bold text-brand mb-1"><i class="bi bi-bag-plus text-rose me-1"></i> Tambah Pakaian</h3>
                <p class="text-muted mb-0">Lengkapi data pakaian agar koleksi wardrobe terlihat rapi.</p>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('clothes.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('clothes.form')
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                        <a href="{{ route('clothes.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
