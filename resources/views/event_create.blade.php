@extends('layouts.app')
@section('title', 'Tambah Acara')
@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white py-3">
        <h5 class="mb-0 fw-bold">Formulir Tambah Acara Baru</h5>
    </div>
    <div class="card-body p-4">
        <form action="/event/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Pilih Kategori Acara</label>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                    <option value="">-- Silakan Pilih --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Judul Acara</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" placeholder="Contoh: Pensi Akhir Tahun" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Tanggal Acara</label>
                    <input type="date" name="event_date" class="form-control @error('event_date') is-invalid @enderror"
                           value="{{ old('event_date') }}" required>
                    @error('event_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Lokasi Acara</label>
                    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                           value="{{ old('location') }}" placeholder="Contoh: Lapangan Utama" required>
                    @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Kuota Peserta</label>
                <input type="number" name="quota" class="form-control @error('quota') is-invalid @enderror"
                       value="{{ old('quota') }}" placeholder="Contoh: 100" min="1" required>
                @error('quota')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi Acara</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                          rows="4" placeholder="Tuliskan detail acara di sini..." required>{{ old('description') }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Poster Acara <span class="text-muted fw-normal">(Maks. 2MB)</span></label>
                <img class="img-preview img-fluid d-block mb-2 rounded shadow-sm border" style="display:none!important; max-height: 250px;" alt="Preview Poster">
                <input type="file" class="form-control @error('poster') is-invalid @enderror"
                       id="poster" name="poster" accept="image/*" onchange="previewImage()">
                @error('poster')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success btn-lg flex-grow-1 fw-bold">
                    Simpan Data Acara
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
        imgPreview.style.cssText = 'display:block!important; max-height:250px;';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
