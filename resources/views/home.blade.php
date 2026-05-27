@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Hero --}}
<div class="p-4 p-md-5 mb-4 rounded-3 bg-primary text-white shadow-sm">
    <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold">Selamat Datang di SchoolEvent</h1>
        <p class="col-md-8 fs-5 mb-0">
            Katalog resmi acara dan ekstrakurikuler SMK Plus Pelita Nusantara.
            Jelajahi acara terbaru di bawah ini.
        </p>
    </div>
</div>

{{-- Katalog Acara --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold text-primary mb-0">Acara Terbaru</h3>
    <span class="badge bg-secondary fs-6">{{ $events->count() }} acara</span>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @forelse($events as $event)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                @if($event->poster)
                    <img src="{{ asset('storage/' . $event->poster) }}"
                         class="card-img-top"
                         alt="Poster {{ $event->title }}"
                         style="height: 220px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center"
                         style="height: 220px;">
                        <span class="text-muted">Tanpa Poster</span>
                    </div>
                @endif
                <div class="card-body d-flex flex-column">
                    @if($event->category)
                        <span class="badge bg-info text-dark align-self-start mb-2">
                            {{ $event->category->name }}
                        </span>
                    @endif
                    <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                    <p class="card-text text-muted small mb-2">
                        <i class="bi bi-calendar"></i>
                        {{ date('d M Y', strtotime($event->event_date)) }}
                        &middot; Kuota {{ $event->quota }}
                    </p>
                    <p class="card-text flex-grow-1">
                        {{ \Illuminate\Support\Str::limit($event->description, 90) }}
                    </p>
                    <a href="/event/{{ $event->id }}" class="btn btn-primary mt-auto fw-semibold">
                        Lihat Detail Acara
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-light text-center border py-5">
                <p class="text-muted fw-bold mb-0">
                    Belum ada acara yang dipublikasi. Silakan kembali lagi nanti.
                </p>
            </div>
        </div>
    @endforelse
</div>

@endsection
