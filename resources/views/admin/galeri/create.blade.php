@extends('admin.layouts.app')

@section('title', 'Tambah Foto Galeri')

@section('content')

<div class="admin-page-header">
    <h1>Tambah Foto Galeri</h1>
    <a href="{{ route('admin.galeri.index') }}" class="btn-admin btn-admin-outline"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="admin-panel">
    <div class="admin-panel-body">
        <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.galeri._form')
            <button type="submit" class="btn-admin btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan</button>
        </form>
    </div>
</div>

@endsection
