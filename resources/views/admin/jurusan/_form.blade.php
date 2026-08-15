<div class="row">
    <div class="col-md-3 admin-form-group">
        <label class="admin-form-label">Singkatan</label>
        <input type="text" name="singkatan" class="admin-form-control" value="{{ old('singkatan', $jurusan->singkatan ?? '') }}" placeholder="RPL" required>
    </div>
    <div class="col-md-9 admin-form-group">
        <label class="admin-form-label">Nama Jurusan</label>
        <input type="text" name="nama" class="admin-form-control" value="{{ old('nama', $jurusan->nama ?? '') }}" placeholder="Rekayasa Perangkat Lunak" required>
    </div>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Deskripsi</label>
    <textarea name="deskripsi" rows="3" class="admin-form-control">{{ old('deskripsi', $jurusan->deskripsi ?? '') }}</textarea>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Kompetensi yang Dipelajari</label>
    <textarea name="kompetensi" rows="5" class="admin-form-control">{{ old('kompetensi', $jurusan->kompetensi ?? '') }}</textarea>
    <p class="admin-form-hint">Satu poin per baris (tekan Enter untuk poin baru) — akan ditampilkan sebagai daftar bercentang.</p>
</div>

<div class="admin-form-group">
    <label class="admin-form-label">Icon (Bootstrap Icons)</label>
    <input type="text" name="icon" class="admin-form-control" value="{{ old('icon', $jurusan->icon ?? '') }}" placeholder="Contoh: bi-code-slash">
</div>

<hr class="my-4">

<div class="row">
    <div class="col-md-6 admin-form-group">
        <label class="admin-form-label">Nama Kepala Program Keahlian</label>
        <input type="text" name="kepala_program" class="admin-form-control" value="{{ old('kepala_program', $jurusan->kepala_program ?? '') }}">
    </div>
    <div class="col-md-6 admin-form-group">
        <label class="admin-form-label">Foto Kepala Program</label>
        @isset($jurusan)
            @if($jurusan->foto_kepala_program)
                <img src="{{ asset('storage/' . $jurusan->foto_kepala_program) }}" class="admin-current-img d-block" alt="Foto kepala program saat ini">
            @endif
        @endisset
        <input type="file" name="foto_kepala_program" class="admin-form-control" accept="image/*">
    </div>
</div>

<hr class="my-4">

<div class="admin-form-group">
    <label class="admin-form-label">Foto Sampul Jurusan</label>
    @isset($jurusan)
        @if($jurusan->foto_sampul)
            <img src="{{ asset('storage/' . $jurusan->foto_sampul) }}" class="admin-current-img d-block" alt="Foto sampul saat ini">
        @endif
    @endisset
    <input type="file" name="foto_sampul" class="admin-form-control" accept="image/*">
    <p class="admin-form-hint">Format JPG/PNG, maksimal 2MB.</p>
</div>
