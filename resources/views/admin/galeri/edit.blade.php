@extends('admin.layouts.app')

@section('title', 'Edit Foto Galeri')

@section('content')

<div class="admin-page-header">
    <h1>Edit Foto Galeri</h1>
    <a href="{{ route('admin.galeri.index') }}" class="btn-admin btn-admin-outline"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="admin-panel">
    <div class="admin-panel-body">
        <form method="POST" action="{{ route('admin.galeri.update', $galeri) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.galeri._form')
            <button type="submit" class="btn-admin btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan Perubahan</button>
        </form>
    </div>
</div>

@endsection
