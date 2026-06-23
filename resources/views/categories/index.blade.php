@extends('layouts.app')

@section('title', 'Kategori Pakaian')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <span class="chip active mb-3"><i class="bi bi-tags"></i> Categories</span>
        <h1 class="font-display text-brand mb-2">Kategori Pakaian</h1>
        <p class="text-muted mb-0">Kelola kategori untuk mengelompokkan pakaian dengan rapi.</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Tambah Kategori</a>
</div>

<div class="soft-card p-3">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th style="width:80px">No</th>
                    <th>Nama Kategori</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                    <td>
                        <span class="soft-badge me-2"><i class="bi bi-tag-heart"></i></span>
                        <span class="fw-semibold">{{ $category->nama_kategori }}</span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash me-1"></i>Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center text-muted py-4">Belum ada kategori.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $categories->links() }}</div>
</div>
@endsection
