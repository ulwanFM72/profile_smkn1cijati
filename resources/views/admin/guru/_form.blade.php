<div class="admin-form-group">
    <label class="admin-form-label">Nama Lengkap (dengan gelar)</label>
    <input type="text" name="nama" class="admin-form-control" value="{{ old('nama', $guru->nama ?? '') }}" placeholder="Contoh: Dra. Siti Rahayu, M.Pd." required>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Jabatan</label>
    <input type="text" name="jabatan" class="admin-form-control" value="{{ old('jabatan', $guru->jabatan ?? '') }}" placeholder="Contoh: Kepala Sekolah / Guru Matematika">
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Foto</label>
    @isset($guru)
        @if($guru->foto)
            <img src="{{ asset('storage/' . $guru->foto) }}" class="admin-current-img d-block" style="border-radius: 50%;" alt="Foto saat ini">
        @endif
    @endisset
    <input type="file" name="foto" class="admin-form-control" accept="image/*">
    <p class="admin-form-hint">Format JPG/PNG, maksimal 2MB. Kosongkan kalau tidak ingin mengganti foto.</p>
</div>