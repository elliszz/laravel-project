@extends('layouts.app')

@section('title', 'Data Dosen')

@php
    use Carbon\Carbon;
@endphp

@section('content')

<style>
    .table-dosen {
        font-size: 14px;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table-dosen thead th {
        background-color: #5a2a83;
        color: #fff;
        font-weight: 600;
        padding: 12px 15px;
        text-align: center;
        border-radius: 8px 8px 0 0;
    }

    .table-dosen tbody tr {
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(90, 42, 131, 0.08);
    }

    .table-dosen tbody tr:nth-child(even) {
        background-color: #f5f0fa;
    }

    .table-dosen th,
    .table-dosen td {
        padding: 12px;
        vertical-align: middle;
        white-space: nowrap;
        color: #3a176b;
    }
</style>

<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-body p-3">

            {{-- HEADER + SEARCH --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 fw-bold">DATA DOSEN</h4>

                <div class="d-flex align-items-center gap-2">
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

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.data-dosen.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </a>
                    @endif
                </div>
            </div>

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-success py-2">
                    {{ session('success') }}
                </div>
            @endif

            {{-- TABLE --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle table-dosen" id="dosenTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>No Sertifikat NRP</th>
                            <th>Tgl Sertifikat</th>
                            <th>NPSN LPTK</th>
                            <th>Nama LPTK</th>
                            <th>Kode Jenis</th>
                            <th>Jenis Peserta</th>
                            <th>Kode Rumpun</th>
                            <th>Nama Rumpun</th>
                            <th>Kode Bidang</th>
                            <th>Bidang Studi PPG</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>NIK</th>
                            <th>NPWP</th>
                            <th>NIDN</th>
                            <th>NUPTK</th>
                            <th>Gol ASN</th>
                            <th>Tempat Lahir</th>
                            <th>Tgl Lahir</th>
                            <th>JK</th>
                            <th>NPSN Instansi</th>
                            <th>Instansi Asal</th>
                            <th>Pendidikan</th>
                            <th>ID Rekrutmen</th>

                            @if(auth()->user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($dataDosens as $item)
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

                            @if(auth()->user()->role === 'admin')
                            <td class="text-center text-nowrap">
                                <a href="{{ route('admin.data-dosen.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.data-dosen.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'admin' ? 29 : 28 }}"
                                class="text-center text-muted">
                                Data Kosong
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- SEARCH SCRIPT (VIEW ONLY) --}}
<script>
document.getElementById('searchAll').addEventListener('keyup', function () {
    const keyword = this.value.toLowerCase();
    const rows = document.querySelectorAll('#dosenTable tbody tr');

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(keyword)
            ? ''
            : 'none';
    });
});
</script>

@endsection
