@extends('layouts.app')

@section('title', 'Edit Pakaian')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="soft-card">
            <div class="card-header-soft">
                <h3 class="fw-bold text-brand mb-1"><i class="bi bi-pencil-heart text-rose me-1"></i> Edit Pakaian</h3>
                <p class="text-muted mb-0">Perbarui detail pakaian sesuai data terbaru.</p>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('clothes.update', $clothes) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('clothes.form')
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-check-lg me-1"></i> Update</button>
                        <a href="{{ route('clothes.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
