@extends('layouts.app')

@section('title', 'Detail Pakaian')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="soft-card overflow-hidden">
            @if($clothes->foto)
                <img src="{{ asset($clothes->foto) }}" class="w-100 object-fit-cover wardrobe-img" style="height: 380px" alt="{{ $clothes->nama_pakaian }}">
            @else
                <div class="empty-img d-flex align-items-center justify-content-center" style="height: 320px">
                    <div class="text-center text-muted">
                        <i class="bi bi-image fs-1 text-rose"></i>
                        <div>Tidak ada foto</div>
                    </div>
                </div>
            @endif
            <div class="p-4 p-md-5">
                <span class="soft-badge mb-3 d-inline-block">{{ $clothes->category->nama_kategori ?? '-' }}</span>
                <h1 class="font-display text-brand mb-2">{{ $clothes->nama_pakaian }}</h1>
                <p class="mb-2"><strong>Warna:</strong> {{ $clothes->warna }}</p>
                <p class="text-muted"><strong>Keterangan:</strong> {{ $clothes->keterangan ?: '-' }}</p>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('clothes.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('clothes.edit', $clothes) }}" class="btn btn-warning"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
