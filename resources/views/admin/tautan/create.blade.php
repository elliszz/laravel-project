@extends('layouts.app')

@section('title', 'Tambah Tautan Bahan')

@section('content')

<div class="container-fluid px-4">

    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="mb-4 fw-bold">Tambah Tautan Bahan</h4>

            <form action="{{ route('tautan.store') }}" method="POST">
                @csrf

                {{-- ROW 1 --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Judul / Nama Tautan</label>
                        <input type="text"
                               name="isi_tautan"
                               class="form-control"
                               placeholder="Contoh: Modul Pembelajaran"
                               value="{{ old('isi_tautan') }}"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date"
                               name="tanggal_tautan"
                               class="form-control"
                               value="{{ old('tanggal_tautan') }}">
                    </div>
                </div>

                {{-- ROW 2 --}}
                <div class="mb-3">
                    <label class="form-label">Tautan Drive (URL)</label>
                    <input type="url"
                           name="tautan"
                           class="form-control"
                           placeholder="https://drive.google.com/..."
                           value="{{ old('tautan') }}">
                </div>

                {{-- ROW 3 --}}
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan"
                              class="form-control"
                              rows="4"
                              placeholder="Deskripsi singkat">{{ old('keterangan') }}</textarea>
                </div>

                {{-- ROW 4 --}}
                <div class="mb-4">
                    <label class="form-label">Sumber</label>
                    <input type="text"
                           name="sumber"
                           class="form-control"
                           placeholder="Contoh: Google Drive / Website Resmi"
                           value="{{ old('sumber') }}">
                </div>

                <hr>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.tautan.index') }}"
                       class="btn btn-secondary">
                        Batal
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
