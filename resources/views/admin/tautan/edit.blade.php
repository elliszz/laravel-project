@extends('layouts.app')

@section('title', 'Edit Tautan Bahan')

@section('content')

<style>
    .form-tautan label {
        font-size: 14px;
        font-weight: 500;
    }

    .form-tautan .form-control {
        font-size: 14px;
        padding: 8px 12px;
    }

    .form-tautan h4 {
        font-weight: 600;
    }
</style>

<div class="container-fluid px-4">

    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="mb-4">Edit Tautan Bahan</h4>

            <form action="{{ route('tautan.update', $tautan->id) }}"
                  method="POST"
                  class="form-tautan">

                @csrf
                @method('PUT')

                {{-- ROW 1 --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Judul / Nama Tautan</label>
                        <input type="text"
                               name="isi_tautan"
                               class="form-control"
                               value="{{ old('isi_tautan', $tautan->isi_tautan) }}"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date"
                               name="tanggal_tautan"
                               class="form-control"
                               value="{{ old('tanggal_tautan', optional($tautan->tanggal_tautan)->format('Y-m-d')) }}">
                    </div>
                </div>

                {{-- ROW 2 --}}
                <div class="mb-3">
                    <label class="form-label">Tautan Drive (URL)</label>
                    <input type="url"
                           name="tautan"
                           class="form-control"
                           value="{{ old('tautan', $tautan->tautan) }}">
                </div>

                {{-- ROW 3 --}}
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan"
                              class="form-control"
                              rows="4">{{ old('keterangan', $tautan->keterangan) }}</textarea>
                </div>

                {{-- ROW 4 --}}
                <div class="mb-4">
                    <label class="form-label">Sumber</label>
                    <input type="text"
                           name="sumber"
                           class="form-control"
                           value="{{ old('sumber', $tautan->sumber) }}">
                </div>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.tautan.index') }}"
                       class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
