@extends('layouts.app')
@section('title', $event->title)
@section('content')

<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
    </ol>
</nav>

<div class="card border-0 shadow-sm">
    <div class="row g-0">
        <div class="col-md-5">
            @if($event->poster)
                <img src="{{ asset('storage/' . $event->poster) }}"
                     class="img-fluid rounded-start w-100"
                     alt="Poster {{ $event->title }}"
                     style="height: 100%; object-fit: cover; min-height: 350px;">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center h-100"
                     style="min-height: 350px;">
                    <span class="text-muted">Tanpa Poster</span>
                </div>
            @endif
        </div>
        <div class="col-md-7">
            <div class="card-body p-4">
                @if($event->category)
                    <span class="badge bg-info text-dark mb-2">{{ $event->category->name }}</span>
                @endif
                <h1 class="card-title fw-bold text-primary">{{ $event->title }}</h1>

                <div class="row g-3 my-3 border-top border-bottom py-3">
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Tanggal Pelaksanaan</small>
                        <strong>{{ date('d F Y', strtotime($event->event_date)) }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Kuota Peserta</small>
                        <strong>{{ $event->quota }} orang</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Lokasi</small>
                        <strong>{{ $event->location }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block">Status</small>
                        <span class="badge bg-{{ $event->status === 'published' ? 'success' : 'secondary' }}">
                            {{ ucfirst($event->status) }}
                        </span>
                    </div>
                </div>

                <h5 class="fw-bold mt-4">Deskripsi Acara</h5>
                <p class="card-text" style="white-space: pre-line;">{{ $event->description }}</p>

                <div class="mt-4">
                    <a href="/" class="btn btn-outline-primary">&larr; Kembali ke Katalog</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
