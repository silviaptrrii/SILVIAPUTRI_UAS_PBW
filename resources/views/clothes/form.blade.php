<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Nama Pakaian</label>
        <input type="text" name="nama_pakaian" class="form-control" value="{{ old('nama_pakaian', $clothes->nama_pakaian ?? '') }}" placeholder="Contoh: Blush Knit Sweater" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $clothes->category_id ?? '') == $category->id)>
                    {{ $category->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Warna</label>
        <input type="text" name="warna" class="form-control" value="{{ old('warna', $clothes->warna ?? '') }}" placeholder="Contoh: Pink Pastel" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Foto Pakaian</label>
        <input type="file" name="foto" id="fotoInput" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp">
        <img id="fotoPreview" class="rounded-4 object-fit-cover border mt-3 d-none" style="height:150px;width:150px" alt="Preview foto">
        <div class="form-text text-muted">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.</div>
    </div>
</div>

@if(isset($clothes) && $clothes->foto)
    <div class="mb-3">
        <label class="form-label">Foto Saat Ini</label>
        <div>
            <img src="{{ asset($clothes->foto) }}" class="rounded-4 object-fit-cover border" style="height: 150px; width: 150px" alt="Foto lama">
        </div>
    </div>
@endif

<div class="mb-4">
    <label class="form-label">Keterangan</label>
    <textarea name="keterangan" rows="4" class="form-control" placeholder="Contoh: Cocok untuk kuliah, hangout, atau presentasi">{{ old('keterangan', $clothes->keterangan ?? '') }}</textarea>
</div>


@push('scripts')
<script>
    const fotoInput = document.getElementById('fotoInput');
    const fotoPreview = document.getElementById('fotoPreview');

    if (fotoInput && fotoPreview) {
        fotoInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;

            fotoPreview.src = URL.createObjectURL(file);
            fotoPreview.classList.remove('d-none');
        });
    }
</script>
@endpush
