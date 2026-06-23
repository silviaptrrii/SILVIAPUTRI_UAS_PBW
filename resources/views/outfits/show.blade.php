@extends('layouts.app')

@section('title', 'Detail Outfit')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <span class="chip active mb-3"><i class="bi bi-heart"></i> Outfit Detail</span>
        <h1 class="font-display text-brand mb-2">{{ $outfit->nama_outfit }}</h1>
        <p class="text-muted mb-0">Tanggal: {{ $outfit->tanggal->format('d M Y') }}</p>
    </div>
    <a href="{{ route('outfits.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="row g-4">
@foreach($outfit->clothes as $item)
    <div class="col-md-6 col-xl-4">
        <div class="card wardrobe-card h-100 overflow-hidden">
            @if($item->foto)
                <img src="{{ asset($item->foto) }}" class="card-img-top object-fit-cover wardrobe-img" style="height: 230px" alt="{{ $item->nama_pakaian }}">
            @else
                <div class="empty-img d-flex align-items-center justify-content-center" style="height: 230px">
                    <span class="text-muted">Tidak ada foto</span>
                </div>
            @endif
            <div class="card-body p-4">
                <span class="soft-badge mb-2 d-inline-block">{{ $item->category->nama_kategori ?? '-' }}</span>
                <h5 class="fw-bold text-brand">{{ $item->nama_pakaian }}</h5>
                <p class="text-muted mb-0">Warna: {{ $item->warna }}</p>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
