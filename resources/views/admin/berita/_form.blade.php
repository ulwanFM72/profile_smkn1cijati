<div class="admin-form-group">
    <label class="admin-form-label">Judul Berita</label>
    <input type="text" name="judul" class="admin-form-control" value="{{ old('judul', $berita->judul ?? '') }}" required>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Ringkasan</label>
    <input type="text" name="ringkasan" class="admin-form-control" value="{{ old('ringkasan', $berita->ringkasan ?? '') }}" required>
    <p class="admin-form-hint">Ditampilkan di card berita Beranda (maks. sekitar 100 karakter).</p>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Tanggal</label>
    <input type="date" name="tanggal" class="admin-form-control" value="{{ old('tanggal', isset($berita) ? $berita->tanggal->format('Y-m-d') : date('Y-m-d')) }}" required>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Isi Berita</label>
    <textarea name="isi" rows="6" class="admin-form-control">{{ old('isi', $berita->isi ?? '') }}</textarea>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Gambar</label>
    @isset($berita)
        @if($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" class="admin-current-img d-block" alt="Gambar saat ini">
        @endif
    @endisset
    <input type="file" name="gambar" class="admin-form-control" accept="image/*">
    <p class="admin-form-hint">Format JPG/PNG, maksimal 2MB. Kosongkan kalau tidak ingin mengganti gambar.</p>
</div>
