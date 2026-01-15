@extends('layouts.app')

@section('title', 'Tambah Data Gumong')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="mb-4">Tambah Data Gumong</h4>

            <form action="{{ route('admin.data-gumong.store') }}" method="POST">
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

                <div class="row g-4">
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

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.data-gumong.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
