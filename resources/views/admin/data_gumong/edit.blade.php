@extends('layouts.app')

@section('title', 'Edit Data Gumong')

@section('content')

<style>
    .form-edit-gumong label {
        font-size: 14px;
        font-weight: 500;
    }

    .form-edit-gumong .form-control {
        font-size: 14px;
        padding: 8px 12px;
    }

    .form-edit-gumong h4 {
        font-weight: 600;
    }
</style>

<div class="container-fluid px-4">

    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="mb-4">Edit Data Gumong</h4>

            <form action="{{ route('admindata-gumong.update', $dataGumong->id) }}"
                  method="POST"
                  class="form-edit-gumong">

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

                <div class="row g-4">
                    @foreach($fields as $name => $label)
                        <div class="col-md-6">
                            <label class="form-label">{{ $label }}</label>

                            <input
                                type="{{ str_contains($name, 'tanggal') ? 'date' : 'text' }}"
                                name="{{ $name }}"
                                value="{{ old($name, $dataGumong->$name) }}"
                                class="form-control"
                            >
                        </div>
                    @endforeach
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update
                    </button>

                    <a href="{{ route('admin.data-gumong.index') }}"
                       class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
