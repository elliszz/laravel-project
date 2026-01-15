@extends('layouts.app')

@section('title', 'Tambah Data Dosen')

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

            <h4 class="mb-4 fw-bold">Tambah Data Dosen</h4>

            <form action="{{ route('admin.data-dosen.store') }}" method="POST">
                @csrf

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

                <div class="row g-3">
                    @foreach($fields as $name => $label)
                        <div class="col-md-6">
                            <label class="form-label">{{ $label }}</label>
                            <input
                                type="{{ str_contains($name, 'tanggal') ? 'date' : 'text' }}"
                                name="{{ $name }}"
                                class="form-control"
                                value="{{ old($name) }}">
                        </div>
                    @endforeach
                </div>

                <hr class="my-4">

                {{-- ACTION --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.data-dosen.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
