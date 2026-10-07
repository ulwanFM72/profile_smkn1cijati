@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')

<div class="admin-page-header">
    <h1>Tambah Berita</h1>
    <a href="{{ route('admin.berita.index') }}" class="btn-admin btn-admin-outline"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="admin-panel">
    <div class="admin-panel-body">
        <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.berita._form')
            <button type="submit" class="btn-admin btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan Berita</button>
        </form>
    </div>
</div>

@endsection
