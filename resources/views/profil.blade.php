@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<section class="page-header">
    <div class="container text-center" data-aos="fade-up">
        <h1>Profil Sekolah</h1>
        <p>Mengenal lebih dekat sejarah, visi, dan misi kami.</p>
    </div>
</section>

<section class="section-block">
    <div class="container">
        <div class="row gy-5 align-items-start">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="mb-3">Sejarah Singkat</h2>
                <p class="text-body-muted" style="white-space: pre-line;">
                    {{ $profil->sejarah ?? 'Sekolah ini berdiri dengan komitmen menghadirkan pendidikan yang berkualitas dan berkarakter. Sejak awal berdiri, kami terus berkembang mengikuti kebutuhan zaman tanpa meninggalkan nilai-nilai inti yang menjadi fondasi pembelajaran.' }}
                </p>

                <div class="mt-4">
                    <h5>Sambutan Kepala Sekolah</h5>
                    <blockquote class="quote-block">
                        {{ $profil->sambutan_kepala_sekolah ?? 'Pendidikan bukan hanya tentang nilai akademik, tetapi juga tentang membentuk karakter dan kepribadian yang tangguh untuk menghadapi masa depan.' }}
                        <footer>&mdash; {{ $profil->nama_kepala_sekolah ?? 'Kepala Sekolah' }}</footer>
                    </blockquote>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="vm-card mb-4">
                    <div class="vm-icon"><i class="bi bi-eye"></i></div>
                    <h5>Visi</h5>
                    <p>{{ $profil->visi ?? 'Menjadi lembaga pendidikan unggul yang melahirkan generasi cerdas, berkarakter, dan berdaya saing global.' }}</p>
                </div>
                <div class="vm-card">
                    <div class="vm-icon"><i class="bi bi-diagram-3"></i></div>
                    <h5>Misi</h5>
                    <p style="white-space: pre-line;">{{ $profil->misi ?? "Menyelenggarakan pembelajaran yang aktif, kreatif, dan menyenangkan.\nMembina karakter siswa berlandaskan nilai kejujuran dan disiplin.\nMengembangkan potensi siswa melalui kegiatan akademik dan non-akademik." }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-block bg-soft">
    <div class="container">
        <div class="section-heading" data-aos="fade-up">
            <h2>Tabel Informasi Profil Sekolah</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="table-responsive table-profil-wrap">
                    <table class="table table-hover table-profil align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Informasi</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="bi bi-building"></i> Nama Sekolah</td>
                                <td>{{ $profil->nama_sekolah ?? 'SMA Nusantara Bakti' }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-hash"></i> NPSN</td>
                                <td>{{ $profil->npsn ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-patch-check"></i> Status</td>
                                <td>{{ $profil->status ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-award"></i> Akreditasi</td>
                                <td>
                                    @if($profil->akreditasi ?? null)
                                        <span class="badge-akreditasi">{{ $profil->akreditasi }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-calendar3"></i> Tahun Berdiri</td>
                                <td>{{ $profil->tahun_berdiri ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-geo-alt"></i> Alamat</td>
                                <td>{{ $profil->alamat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-envelope"></i> Email</td>
                                <td>{{ $profil->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-telephone"></i> Nomor Telepon</td>
                                <td>{{ $profil->telepon ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-globe"></i> Website</td>
                                <td>
                                    @if($profil->website ?? null)
                                        <a href="https://{{ ltrim($profil->website, 'https://') }}" target="_blank" rel="noopener">{{ $profil->website }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-block">
    <div class="container">
        <div class="section-heading" data-aos="fade-up">
            <h2>Guru & Staf Pengajar</h2>
            <p>Tim pendidik berpengalaman yang membimbing siswa meraih potensi terbaiknya.</p>
        </div>

        <div class="row g-4" id="guruGrid">
    @forelse($guru as $index => $item)
        <div class="col-6 col-md-4 col-lg-3 {{ $index >= 12 ? 'guru-extra d-none' : '' }}" data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}">
            <div class="card-guru" 
     data-tilt data-tilt-max="30" data-tilt-speed="250" data-tilt-perspective="700"data-tilt-scale="1.1" data-tilt-glare data-tilt-max-glare="0.5">
                <div class="card-guru-photo">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" loading="lazy">
                    @else
                        <div class="card-guru-photo-placeholder"><i class="bi bi-person"></i></div>
                    @endif
                </div>
                <h6>{{ $item->nama }}</h6>
                <p>{{ $item->jabatan ?? 'Guru' }}</p>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-4" data-aos="fade-up">
            <p class="text-body-muted">Data guru belum tersedia.</p>
        </div>
    @endforelse
</div>

@if($guru->count() > 12)
    <div class="text-center mt-4">
        <button type="button" id="btnGuruMore" class="btn btn-outline-school">
            Lihat Selengkapnya <i class="bi bi-chevron-down"></i>
        </button>
    </div>
@endif
    </div>
</section>

@if($totalSiswa > 0)
<section class="section-block bg-soft">
    <div class="container">
        <div class="section-heading" data-aos="fade-up">
            <h2>Rekap Data Siswa</h2>
            <p>Diambil langsung dari database, ditampilkan sebagai rekap agar identitas siswa tetap terjaga.</p>
        </div>

        <div class="row justify-content-center mb-4" data-aos="fade-up">
            <div class="col-md-5">
                <div class="stat-item stat-item-total">
                    <i class="bi bi-mortarboard"></i>
                    <h3>{{ $totalSiswa }}</h3>
                    <p>Total Siswa dari Seluruh Angkatan & Jurusan</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-9">
                <div class="table-responsive table-profil-wrap">
                    <table class="table table-hover table-profil align-middle mb-0 text-center">
                        <thead>
                            <tr>
                                <th class="text-start">Angkatan</th>
                                @foreach($urutanJurusan as $jurusan)
                                    <th>{{ $jurusan }}</th>
                                @endforeach
                                <th class="table-profil-total-col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($urutanAngkatan as $angkatan)
                                <tr>
                                    <td class="text-start fw-semibold"><i class="bi bi-bookmark"></i> Kelas {{ $angkatan }}</td>
                                    @foreach($urutanJurusan as $jurusan)
                                        <td>{{ $matrixSiswa[$angkatan][$jurusan] ?? 0 }}</td>
                                    @endforeach
                                    <td class="fw-bold table-profil-total-col">{{ $totalPerAngkatan[$angkatan] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-start fw-bold">Total</td>
                                @foreach($urutanJurusan as $jurusan)
                                    <td class="fw-bold">{{ $totalPerJurusan[$jurusan] }}</td>
                                @endforeach
                                <td class="fw-bold table-profil-total-col">{{ $totalSiswa }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <p class="text-body-muted text-center mt-3" style="font-size: 13px;">
                    RPL = Rekayasa Perangkat Lunak &middot; BD = Bisnis Digital &middot;
                    TO = Teknik Otomotif &middot; APHP = Agribisnis Pengolahan Hasil Pertanian
                </p>
            </div>
        </div>
    </div>
</section>
@endif

<section class="section-block">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-lg-3" data-aos="fade-up">
                <div class="stat-item"><i class="bi bi-calendar3"></i><h3>{{ $profil->tahun_berdiri ?? '2008' }}</h3><p>Tahun Berdiri</p></div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item"><i class="bi bi-people"></i><h3>{{ $totalSiswa }}+</h3><p>Siswa</p></div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item"><i class="bi bi-person-workspace"></i><h3>{{ $totalGuru }}+</h3><p>Guru & Staf</p></div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item"><i class="bi bi-geo-alt"></i><h3>1</h3><p>Lokasi Kampus</p></div>
            </div>
        </div>
    </div>
</section>

@endsection
