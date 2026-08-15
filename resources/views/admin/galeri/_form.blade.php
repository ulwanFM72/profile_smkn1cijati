<div class="admin-form-group">
    <label class="admin-form-label">Judul Foto</label>
    <input type="text" name="judul" class="admin-form-control" value="{{ old('judul', $galeri->judul ?? '') }}" required>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Kategori</label>
    <input type="text" name="kategori" class="admin-form-control" value="{{ old('kategori', $galeri->kategori ?? '') }}" list="kategoriList" required>
    <datalist id="kategoriList">
        <option value="Upacara">
        <option value="Perlombaan">
        <option value="Kegiatan Belajar">
        <option value="Ekstrakurikuler">
    </datalist>
    <p class="admin-form-hint">Kategori dipakai untuk filter di halaman Galeri publik. Pakai kategori yang sudah ada supaya filter tetap rapi.</p>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Foto</label>
    @isset($galeri)
        <img src="{{ asset('storage/' . $galeri->gambar) }}" class="admin-current-img d-block" alt="Foto saat ini">
    @endisset
    <input type="file" name="gambar" class="admin-form-control" accept="image/*" {{ isset($galeri) ? '' : 'required' }}>
    <p class="admin-form-hint">Format JPG/PNG, maksimal 2MB.</p>
</div>
