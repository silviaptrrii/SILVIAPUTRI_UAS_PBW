@extends('layouts.app')

@section('title', 'Edit Outfit')

@section('content')
<div class="page-header">
    <span class="chip active mb-3"><i class="bi bi-pencil-heart"></i> Edit Outfit</span>
    <h1 class="font-display text-brand mb-2">Edit Outfit</h1>
    <p class="text-muted mb-0">Perbarui nama, tanggal, dan daftar pakaian untuk outfit ini.</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="soft-card p-4">
            <form method="POST" action="{{ route('outfits.update', $outfit) }}">
                @csrf
                @method('PUT')
                @include('outfits.form')
                <div class="d-flex gap-2 mt-4">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-check-lg me-1"></i> Update Outfit</button>
                    <a href="{{ route('outfits.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
