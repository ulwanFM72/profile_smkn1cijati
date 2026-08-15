<div class="admin-form-group">
    <label class="admin-form-label">Nama Ekstrakurikuler</label>
    <input type="text" name="nama" class="admin-form-control" value="{{ old('nama', $ekstrakurikuler->nama ?? '') }}" required>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Deskripsi</label>
    <textarea name="deskripsi" rows="4" class="admin-form-control">{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 admin-form-group">
        <label class="admin-form-label">Pembina</label>
        <input type="text" name="pembina" class="admin-form-control" value="{{ old('pembina', $ekstrakurikuler->pembina ?? '') }}" placeholder="Contoh: Bpk. Jaya Nursetiadi">
    </div>
    <div class="col-md-6 admin-form-group">
        <label class="admin-form-label">Jadwal Latihan</label>
        <input type="text" name="jadwal" class="admin-form-control" value="{{ old('jadwal', $ekstrakurikuler->jadwal ?? '') }}" placeholder="Contoh: Selasa & Kamis, 15.30 - 17.00">
    </div>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Icon (Bootstrap Icons)</label>
    <input type="text" name="icon" class="admin-form-control" value="{{ old('icon', $ekstrakurikuler->icon ?? '') }}" placeholder="Contoh: bi-trophy">
    <p class="admin-form-hint">Cari nama icon di <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener">icons.getbootstrap.com</a>, salin nama class-nya (diawali "bi-").</p>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Foto</label>
    @isset($ekstrakurikuler)
        @if($ekstrakurikuler->gambar)
            <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" class="admin-current-img d-block" alt="Foto saat ini">
        @endif
    @endisset
    <input type="file" name="gambar" class="admin-form-control" accept="image/*">
    <p class="admin-form-hint">Format JPG/PNG, maksimal 2MB. Kosongkan kalau tidak ingin mengganti foto.</p>
</div>
