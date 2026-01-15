@extends('layouts.app')

@section('title', 'Edit Laporan GTK')

@section('content')

<style>
    .form-label {
        font-weight: 600;
        font-size: 14px;
    }
</style>

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-body p-4">

            <h4 class="mb-4 fw-bold">Edit Data Laporan GTK</h4>

            <form action="{{ route('admin.laporan-gtk.update', $laporanGtk->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- ROW 1 --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control"
                               value="{{ old('kategori', $laporanGtk->kategori) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kode</label>
                        <input type="text" name="kode" class="form-control"
                               value="{{ old('kode', $laporanGtk->kode) }}">
                    </div>
                </div>

                {{-- ROW 2 --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Komponen RAB</label>
                        <input type="text" name="komponen_rab" class="form-control"
                               value="{{ old('komponen_rab', $laporanGtk->komponen_rab) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Rasilasi</label>
                        <select name="rasilasi" class="form-select">
                            <option value="">-- Pilih Rasilasi --</option>
                            <option value="true" {{ old('rasilasi', $laporanGtk->rasilasi) == 'true' ? 'selected' : '' }}>True</option>
                            <option value="sebagian" {{ old('rasilasi', $laporanGtk->rasilasi) == 'sebagian' ? 'selected' : '' }}>Sebagian</option>
                            <option value="false" {{ old('rasilasi', $laporanGtk->rasilasi) == 'false' ? 'selected' : '' }}>False</option>
                        </select>
                    </div>
                </div>

                {{-- ROW 3 --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control"
                               value="{{ old('tanggal', optional($laporanGtk->tanggal)->format('Y-m-d')) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">PIC</label>
                        <input type="text" name="pic" class="form-control"
                               value="{{ old('pic', $laporanGtk->pic) }}">
                    </div>
                </div>

                {{-- FULL WIDTH --}}
                <div class="mb-3">
                    <label class="form-label">Acara</label>
                    <input type="text" name="acara" class="form-control"
                           value="{{ old('acara', $laporanGtk->acara) }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi_kegiatan" class="form-control" rows="4">{{ old('deskripsi_kegiatan', $laporanGtk->deskripsi_kegiatan) }}</textarea>
                </div>

                <hr class="my-4">

                {{-- BUKTI --}}
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Folder Bukti</label>
                        <input type="text" name="folder_bukti" class="form-control"
                               value="{{ old('folder_bukti', $laporanGtk->folder_bukti) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Bukti Akademik</label>
                        <input type="text" name="bukti_akademik" class="form-control"
                               value="{{ old('bukti_akademik', $laporanGtk->bukti_akademik) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Bukti Keuangan</label>
                        <input type="text" name="bukti_keuangan" class="form-control"
                               value="{{ old('bukti_keuangan', $laporanGtk->bukti_keuangan) }}">
                    </div>
                </div>

                {{-- ACTION --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.laporan-gtk.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
