@extends('layouts.app')

@section('title', 'Buat Outfit')

@section('content')
<div class="page-header">
    <span class="chip active mb-3"><i class="bi bi-plus-circle"></i> Add New Outfit</span>
    <h1 class="font-display text-brand mb-2">Buat Outfit Baru</h1>
    <p class="text-muted mb-0">Pilih beberapa pakaian untuk digabungkan menjadi satu outfit yang cantik.</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="soft-card p-4">
            @if($clothes->isEmpty())
                <div class="alert alert-warning">
                    Kamu belum punya data pakaian. Tambahkan pakaian dulu sebelum membuat outfit.
                </div>
                <a href="{{ route('clothes.create') }}" class="btn btn-primary">Tambah Pakaian</a>
            @else
                <form method="POST" action="{{ route('outfits.store') }}">
                    @csrf
                    @include('outfits.form')
                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-heart-fill me-1"></i> Simpan Outfit</button>
                        <a href="{{ route('outfits.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
