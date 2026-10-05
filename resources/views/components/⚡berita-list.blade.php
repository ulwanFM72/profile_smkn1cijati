<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Berita;

new class extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function with(): array
    {
        return [
            'berita' => Berita::when($this->search, function ($query) {
                    $query->where('judul', 'like', '%' . $this->search . '%');
                })
                ->orderByDesc('tanggal')
                ->paginate(9),
        ];
    }
};
?>

<div>
    <div class="mb-4" data-aos="fade-up">
        <input type="text" wire:model.live.debounce.400ms="search"
               class="form-control" placeholder="Cari judul berita...">
    </div>

    <div wire:loading class="text-center mb-3">
        <span class="spinner-border spinner-border-sm"></span> Mencari...
    </div>

    <div class="row g-4">
        @forelse($berita as $index => $item)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="card-berita">
                    <div class="card-berita-img">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" loading="lazy">
                        <span class="card-berita-date">
                            <i class="bi bi-calendar-event"></i> {{ $item->tanggal->translatedFormat('d M Y') }}
                        </span>
                    </div>
                    <div class="card-berita-body">
                        <h5>{{ $item->judul }}</h5>
                        <p>{{ Str::limit($item->ringkasan, 100) }}</p>
                        <a href="{{ route('berita.show', $item->slug) }}" class="card-berita-link">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5" data-aos="fade-up">
                <i class="bi bi-newspaper display-4 text-muted"></i>
                <p class="mt-3 text-body-muted">Tidak ada berita yang cocok dengan pencarian.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $berita->links('pagination::bootstrap-5') }}
    </div>
</div>