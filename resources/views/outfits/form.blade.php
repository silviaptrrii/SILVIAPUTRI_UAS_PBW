<div class="row g-4">
    <div class="col-lg-4">
        <div class="card p-4 h-100">
            <h5 class="fw-bold text-brand mb-3"><i class="bi bi-journal-heart text-rose me-1"></i> Detail Outfit</h5>
            <div class="mb-3">
                <label class="form-label">Nama Outfit</label>
                <input type="text" name="nama_outfit" class="form-control" value="{{ old('nama_outfit', $outfit->nama_outfit ?? '') }}" placeholder="Contoh: Brunch with Friends" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', isset($outfit) ? $outfit->tanggal->format('Y-m-d') : date('Y-m-d')) }}" required>
            </div>
            <div class="outfit-list-card mt-2">
                <h6 class="fw-bold text-brand mb-2"><i class="bi bi-lightbulb-heart text-rose me-1"></i> Tips</h6>
                <p class="small text-muted mb-0">Pilih minimal satu pakaian dari koleksi kamu. Outfit yang tersimpan akan muncul di halaman riwayat outfit.</p>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <h5 class="fw-bold text-brand mb-3"><i class="bi bi-bag-heart text-rose me-1"></i> Pilih Pakaian</h5>
        <div class="row g-3">
            @foreach($clothes as $item)
                @php
                    $selectedIds = old('clothes_ids', isset($outfit) ? $outfit->clothes->pluck('id')->toArray() : []);
                    $isSelected = in_array($item->id, $selectedIds);
                @endphp
                <div class="col-md-6 col-xl-4">
                    <label class="card select-card h-100 p-3 {{ $isSelected ? 'is-selected' : '' }}">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="clothes_ids[]" value="{{ $item->id }}" @checked($isSelected)>
                            <span class="form-check-label fw-bold text-brand">{{ $item->nama_pakaian }}</span>
                        </div>
                        @if($item->foto)
                            <img src="{{ asset($item->foto) }}" class="rounded-4 object-fit-cover w-100 wardrobe-img" style="height: 150px" alt="{{ $item->nama_pakaian }}">
                        @else
                            <div class="empty-img rounded-4 d-flex align-items-center justify-content-center" style="height: 150px">
                                <span class="text-muted small">Tidak ada foto</span>
                            </div>
                        @endif
                        <div class="small text-muted mt-2">
                            <span class="soft-badge">{{ $item->category->nama_kategori ?? '-' }}</span>
                            <div class="mt-2"><span class="palette-dot" style="background:#F7C6D0"></span>{{ $item->warna }}</div>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
