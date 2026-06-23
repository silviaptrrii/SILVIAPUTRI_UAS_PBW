@extends('layouts.app')

@section('title', 'Riwayat Outfit')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <span class="chip active mb-3"><i class="bi bi-calendar-heart"></i> Outfit Planner</span>
        <h1 class="font-display text-brand mb-2">Riwayat Outfit</h1>
        <p class="text-muted mb-0">Outfit yang sudah kamu rencanakan dan simpan.</p>
    </div>
    <a href="{{ route('outfits.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Buat Outfit</a>
</div>

<div class="soft-card p-3 mb-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Outfit Name</th>
                    <th>Tanggal</th>
                    <th>Jumlah Item</th>
                    <th>Item</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($outfits as $outfit)
                <tr>
                    <td class="fw-bold text-brand">{{ $outfit->nama_outfit }}</td>
                    <td class="text-muted">{{ $outfit->tanggal->format('d M Y') }}</td>
                    <td><span class="soft-badge">{{ $outfit->clothes->count() }} item</span></td>
                    <td>
                        <div class="d-flex flex-wrap gap-1">
                            @foreach($outfit->clothes->take(3) as $item)
                                <span class="badge text-bg-light border">{{ $item->nama_pakaian }}</span>
                            @endforeach
                            @if($outfit->clothes->count() > 3)
                                <span class="badge text-bg-light border">+{{ $outfit->clothes->count() - 3 }}</span>
                            @endif
                        </div>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('outfits.show', $outfit) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('outfits.edit', $outfit) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('outfits.destroy', $outfit) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus outfit ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada riwayat outfit.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="row g-4">
@foreach($outfits as $outfit)
    <div class="col-md-6">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start gap-3">
                <div>
                    <span class="soft-badge mb-2 d-inline-block">{{ $outfit->tanggal->format('d M Y') }}</span>
                    <h5 class="fw-bold text-brand mb-1">{{ $outfit->nama_outfit }}</h5>
                    <p class="text-muted mb-3">{{ $outfit->clothes->count() }} item dalam outfit ini</p>
                </div>
                <i class="bi bi-heart text-rose fs-4"></i>
            </div>
            <div class="d-flex flex-wrap gap-2 mb-3">
                @foreach($outfit->clothes as $item)
                    <span class="chip"><i class="bi bi-bag-heart"></i>{{ $item->nama_pakaian }}</span>
                @endforeach
            </div>
            <div class="d-flex gap-2 mt-auto flex-wrap">
                <a href="{{ route('outfits.show', $outfit) }}" class="btn btn-outline-primary btn-sm">Detail</a>
                <a href="{{ route('outfits.edit', $outfit) }}" class="btn btn-warning btn-sm">Edit</a>
            </div>
        </div>
    </div>
@endforeach
</div>

<div class="mt-4">{{ $outfits->links() }}</div>
@endsection
