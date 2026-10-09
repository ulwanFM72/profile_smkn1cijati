@extends('layouts.app')

@section('title', 'Berita Sekolah')

@section('content')

<section class="page-header">
    <div class="container text-center" data-aos="fade-up">
        <h1>Berita Kegiatan Sekolah</h1>
        <p>Kumpulan informasi dan dokumentasi kegiatan terbaru di sekolah kami.</p>
    </div>
</section>

<section class="section-block">
    <div class="container">
        <livewire:berita-list />
    </div>
</section>

@endsection