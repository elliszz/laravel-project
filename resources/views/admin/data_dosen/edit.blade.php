@extends('layouts.app')

@section('title', 'Edit Data Dosen')

@section('content')

<style>
    .form-edit-dosen label {
        font-size: 14px;
        font-weight: 500;
    }

    .form-edit-dosen .form-control {
        font-size: 14px;
        padding: 8px 12px;
    }

    .form-edit-dosen h4 {
        font-weight: 600;
    }
</style>

<div class="container-fluid">

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- JUDUL --}}
            <h4 class="mb-4">Edit Data Dosen</h4>

            <form action="{{ route('admin.data-dosen.update', $dataDosen->id) }}"
                  method="POST"
                  class="form-edit-dosen">

                @csrf
                @method('PUT')

                @php
                    $fields = [
                        'nrp' => 'NRP',
                        'no_sertifikat_nrp' => 'No Sertifikat NRP',
                        'tanggal_sertifikat_nrp' => 'Tanggal Sertifikat NRP',
                        'npsn_lptk' => 'NPSN LPTK',
                        'nama_lptk' => 'Nama LPTK',
                        'kode_jenis_peserta' => 'Kode Jenis Peserta',
                        'jenis_peserta' => 'Jenis Peserta',
                        'kode_rumpun' => 'Kode Rumpun',
                        'nama_rumpun' => 'Nama Rumpun',
                        'kode_bidang_studi_ppg' => 'Kode Bidang Studi PPG',
                        'nama_bidang_studi_ppg' => 'Nama Bidang Studi PPG',
                        'kategori_peserta' => 'Kategori Peserta',
                        'nama' => 'Nama',
                        'email' => 'Email',
                        'no_hp' => 'No HP',
                        'nik' => 'NIK',
                        'npwp' => 'NPWP',
                        'nidn' => 'NIDN',
                        'nuptk' => 'NUPTK',
                        'golongan_pns_asn' => 'Golongan PNS ASN',
                        'tempat_lahir' => 'Tempat Lahir',
                        'tanggal_lahir' => 'Tanggal Lahir',
                        'jenis_kelamin' => 'Jenis Kelamin',
                        'npsn_instansi_asal' => 'NPSN Instansi Asal',
                        'nama_instansi_asal' => 'Nama Instansi Asal',
                        'pendidikan_terakhir' => 'Pendidikan Terakhir',
                        'id_rekrutmen' => 'ID Rekrutmen'
                    ];
                @endphp

                {{-- FORM GRID --}}
                <div class="row g-4">
                    @foreach($fields as $name => $label)
                        <div class="col-md-6">
                            <label class="form-label">{{ $label }}</label>

                            <input
                                type="{{ str_contains($name, 'tanggal') ? 'date' : 'text' }}"
                                name="{{ $name }}"
                                value="{{ old($name, $dataDosen->$name) }}"
                                class="form-control"
                            >
                        </div>
                    @endforeach
                </div>

                {{-- BUTTON --}}
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update
                    </button>

                    <a href="{{ route('admin.data-dosen.index') }}"
                       class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
