@extends('admin.layouts.app')

@section('title', 'Tambah Jurusan')

@section('content')

<div class="admin-page-header">
    <h1>Tambah Jurusan</h1>
    <a href="{{ route('admin.jurusan.index') }}" class="btn-admin btn-admin-outline"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="admin-panel">
    <div class="admin-panel-body">
        <form method="POST" action="{{ route('admin.jurusan.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.jurusan._form')
            <button type="submit" class="btn-admin btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan Jurusan</button>
        </form>
    </div>
</div>

@endsection
