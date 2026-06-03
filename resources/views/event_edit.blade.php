@extends('layouts.app')
@section('title', 'Edit Acara')
@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-warning text-dark py-3">
        <h5 class="mb-0 fw-bold">Edit Data Acara</h5>
    </div>
    <div class="card-body p-4">
        <form action="/event/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Kategori Acara</label>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Judul Acara</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', $event->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Tanggal</label>
                    <input type="date" name="event_date" class="form-control"
                           value="{{ old('event_date', $event->event_date) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Lokasi</label>
                    <input type="text" name="location" class="form-control"
                           value="{{ old('location', $event->location) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Kuota</label>
                    <input type="number" name="quota" class="form-control"
                           value="{{ old('quota', $event->quota) }}" min="1" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                          rows="4" required>{{ old('description', $event->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Poster <span class="text-muted fw-normal">(kosongkan jika tidak diganti)</span></label>
                @if($event->poster)
                    <img src="{{ asset('storage/' . $event->poster) }}"
                         class="img-preview img-fluid d-block mb-2 rounded border shadow-sm"
                         style="max-height: 250px;" alt="Poster saat ini">
                @else
                    <img class="img-preview img-fluid rounded" style="display:none; max-height:250px;" alt="Preview">
                @endif
                <input type="file" class="form-control" id="poster" name="poster"
                       accept="image/*" onchange="previewImage()">
            </div>

            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-lg flex-grow-1 fw-bold">
                    Simpan Perubahan
                </button>
                <a href="/events" class="btn btn-outline-secondary btn-lg">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#poster');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
