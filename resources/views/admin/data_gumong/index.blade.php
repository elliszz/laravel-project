@extends('layouts.app')

@section('title', 'Data Gumong')

@php
    use Carbon\Carbon;
@endphp

@section('content')
<style>
    .table-gumong {
        font-size: 14px;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table-gumong thead th {
        background-color: #5a2a83;
        color: #fff;
        font-weight: 600;
        vertical-align: middle;
        padding: 12px 15px;
        white-space: nowrap;
        border: none;
        border-radius: 8px 8px 0 0;
        box-shadow: inset 0 -3px 5px rgba(0,0,0,0.15);
        text-align: center;
    }

    .table-gumong tbody tr {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(90, 42, 131, 0.08);
        transition: background-color 0.25s ease;
    }

    .table-gumong tbody tr:nth-child(even) {
        background-color: #f5f0fa;
    }

    .table-gumong tbody tr:hover {
        background-color: #e3d7f7;
        cursor: pointer;
    }

    .table-gumong th,
    .table-gumong td {
        padding: 14px 12px;
        vertical-align: middle;
        border: none;
        color: #3a176b;
        white-space: nowrap;
    }

    .table-gumong th.text-center,
    .table-gumong td.text-center {
        text-align: center;
    }

    .btn-sm {
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        border-radius: 6px;
    }

    .btn-primary {
        background-color: #5a2a83;
        border-color: #5a2a83;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #7b52b3;
        border-color: #7b52b3;
    }

    .btn-warning {
        background-color: #b07fdb;
        border-color: #b07fdb;
        color: #3a176b;
    }

    .btn-warning:hover {
        background-color: #9a70d4;
        border-color: #9a70d4;
        color: #fff;
    }

    .btn-danger {
        background-color: #d9534f;
        border-color: #d9534f;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c9302c;
        border-color: #c9302c;
        color: #fff;
    }
</style>

<div class="container-fluid px-4">
    <div class="card shadow-sm">
        <div class="card-body">

            {{-- HEADER + SEARCH --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 fw-bold">DATA GUMONG</h4>

                <div class="d-flex gap-2 align-items-center">
                    {{-- SEARCH VIEW ONLY --}}
                    <div class="input-group input-group-sm" style="width:230px">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text"
                               id="searchAll"
                               class="form-control"
                               placeholder="Search...">
                    </div>

                    <a href="{{ route('admin.data-gumong.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Tambah
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap table-gumong" id="gumongTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>No Sertifikat NRP</th>
                            <th>Tanggal Sertifikat NRP</th>
                            <th>NPSN LPTK</th>
                            <th>Nama LPTK</th>
                            <th>Kode Jenis Peserta</th>
                            <th>Jenis Peserta</th>
                            <th>Kode Rumpun</th>
                            <th>Nama Rumpun</th>
                            <th>Kode Bidang Studi PPG</th>
                            <th>Nama Bidang Studi PPG</th>
                            <th>Kategori Peserta</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>NIK</th>
                            <th>NPWP</th>
                            <th>NIDN</th>
                            <th>NUPTK</th>
                            <th>Golongan PNS ASN</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>NPSN Instansi Asal</th>
                            <th>Nama Instansi Asal</th>
                            <th>Pendidikan Terakhir</th>
                            <th>ID Rekrutmen</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataGumongs as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nrp }}</td>
                            <td>{{ $item->no_sertifikat_nrp }}</td>
                            <td class="text-center">
                                {{ $item->tanggal_sertifikat_nrp
                                    ? Carbon::parse($item->tanggal_sertifikat_nrp)->format('d-m-Y')
                                    : '-' }}
                            </td>
                            <td>{{ $item->npsn_lptk }}</td>
                            <td>{{ $item->nama_lptk }}</td>
                            <td>{{ $item->kode_jenis_peserta }}</td>
                            <td>{{ $item->jenis_peserta }}</td>
                            <td>{{ $item->kode_rumpun }}</td>
                            <td>{{ $item->nama_rumpun }}</td>
                            <td>{{ $item->kode_bidang_studi_ppg }}</td>
                            <td>{{ $item->nama_bidang_studi_ppg }}</td>
                            <td>{{ $item->kategori_peserta }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->npwp }}</td>
                            <td>{{ $item->nidn }}</td>
                            <td>{{ $item->nuptk }}</td>
                            <td>{{ $item->golongan_pns_asn }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td class="text-center">
                                {{ $item->tanggal_lahir
                                    ? Carbon::parse($item->tanggal_lahir)->format('d-m-Y')
                                    : '-' }}
                            </td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->npsn_instansi_asal }}</td>
                            <td>{{ $item->nama_instansi_asal }}</td>
                            <td>{{ $item->pendidikan_terakhir }}</td>
                            <td>{{ $item->id_rekrutmen }}</td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('admin.data-gumong.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.data-gumong.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="29" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- SCRIPT SEARCH VIEW ONLY --}}
<script>
document.getElementById('searchAll').addEventListener('keyup', function () {
    const keyword = this.value.toLowerCase();
    const rows = document.querySelectorAll('#gumongTable tbody tr');

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(keyword)
            ? ''
            : 'none';
    });
});
</script>

@endsection
