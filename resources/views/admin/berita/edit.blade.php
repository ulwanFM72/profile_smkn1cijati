@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')

<div class="admin-page-header">
    <h1>Edit Berita</h1>
    <a href="{{ route('admin.berita.index') }}" class="btn-admin btn-admin-outline"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="admin-panel">
    <div class="admin-panel-body">
        <form method="POST" action="{{ route('admin.berita.update', $berita) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.berita._form')
            <button type="submit" class="btn-admin btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan Perubahan</button>
        </form>
    </div>
</div>

@endsection
