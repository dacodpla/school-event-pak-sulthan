@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 fw-bold">Tambah Kategori Acara</h5>
            </div>
            <div class="card-body p-4">
                <form action="/dashboard/category/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Kategori</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">URL Slug</label>
                        <input type="text" name="slug"
                               class="form-control @error('slug') is-invalid @enderror"
                               value="{{ old('slug') }}" placeholder="contoh: ekstra-pramuka" required>
                        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <hr>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success flex-grow-1 fw-bold">Simpan Kategori</button>
                        <a href="/dashboard" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
