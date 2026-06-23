@extends('layouts.app')

@section('title', 'Koleksi Pakaian')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <span class="chip active mb-3"><i class="bi bi-bag-heart"></i> Wardrobe</span>
        <h1 class="font-display text-brand mb-2">Koleksi Pakaian</h1>
        <p class="text-muted mb-0">Daftar pakaian yang sudah kamu simpan dalam wardrobe digital.</p>
    </div>
    <a href="{{ route('clothes.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Tambah Pakaian</a>
</div>

<div class="d-flex flex-wrap gap-2 mb-4">
    <span class="chip active"><i class="bi bi-grid"></i> All Items</span>
    <span class="chip">Tops</span>
    <span class="chip">Bottoms</span>
    <span class="chip">Dresses</span>
    <span class="chip">Shoes</span>
    <span class="chip">Accessories</span>
</div>

<div class="row g-4">
@forelse($clothes as $item)
    <div class="col-md-6 col-xl-4">
        <div class="card wardrobe-card h-100 overflow-hidden">
            <div class="position-relative wardrobe-img">
                @if($item->foto)
                    <img src="{{ asset($item->foto) }}" class="card-img-top object-fit-cover" style="height: 240px" alt="{{ $item->nama_pakaian }}">
                @else
                    <div class="empty-img d-flex align-items-center justify-content-center" style="height: 240px">
                        <div class="text-center text-muted">
                            <i class="bi bi-image fs-1 text-rose"></i>
                            <div>Tidak ada foto</div>
                        </div>
                    </div>
                @endif
                <span class="soft-badge position-absolute top-0 start-0 m-3">{{ $item->category->nama_kategori ?? '-' }}</span>
            </div>
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start gap-2">
                    <div>
                        <h5 class="fw-bold text-brand mb-1">{{ $item->nama_pakaian }}</h5>
                        <p class="text-muted mb-2"><span class="palette-dot" style="background:#F7C6D0"></span>Warna: {{ $item->warna }}</p>
                    </div>
                    <i class="bi bi-heart text-rose fs-5"></i>
                </div>
                <p class="small text-muted mb-3">{{ \Illuminate\Support\Str::limit($item->keterangan, 85) ?: 'Belum ada keterangan.' }}</p>
                <div class="clothes-actions d-flex flex-wrap gap-2">
                    <a href="{{ route('clothes.show', $item) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye me-1"></i>Detail</a>
                    <a href="{{ route('clothes.edit', $item) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                    <form action="{{ route('clothes.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus pakaian ini?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash me-1"></i>Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="soft-card p-5 text-center text-muted">
            <i class="bi bi-bag-heart fs-1 text-rose"></i>
            <h5 class="fw-bold text-brand mt-3">Belum ada data pakaian.</h5>
            <p>Tambahkan pakaian pertama agar bisa membuat outfit planner.</p>
            <a href="{{ route('clothes.create') }}" class="btn btn-primary">Tambah Pakaian</a>
        </div>
    </div>
@endforelse
</div>

<div class="mt-4">{{ $clothes->links() }}</div>
@endsection
