@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm border-warning">
            <div class="card-header bg-warning text-dark py-3">
                <h5 class="mb-0 fw-bold">Edit Kategori Acara</h5>
            </div>
            <div class="card-body p-4">
                <form action="/kategori/{{ $category->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Kategori</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $category->name) }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">URL Slug</label>
                        <input type="text" name="slug" class="form-control"
                               value="{{ old('slug', $category->slug) }}" required>
                    </div>
                    <hr>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-grow-1 fw-bold">Simpan Perubahan</button>
                        <a href="/dashboard" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
