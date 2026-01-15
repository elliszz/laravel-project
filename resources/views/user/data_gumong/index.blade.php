@extends('layouts.app')

@section('title', 'Data Gumong')

@php
    use Carbon\Carbon;
@endphp

@section('content')
<style>
    /* Style tabel dengan nuansa ungu elegan */
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
        padding: 12px 15px; 
        text-align: center; 
        border-radius: 8px 8px 0 0; 
    }
    .table-gumong tbody tr { 
        background-color: #fff; 
        border-radius: 10px; 
        box-shadow: 0 2px 6px rgba(90, 42, 131, 0.08); 
    }
    .table-gumong tbody tr:nth-child(even) { background-color: #f5f0fa; }
    .table-gumong tbody tr:hover { background-color: #e3d7f7; cursor: pointer; }
    .table-gumong th, .table-gumong td { 
        padding: 14px 12px; 
        vertical-align: middle; 
        color: #3a176b; 
        white-space: nowrap; 
    }
    .table-gumong th.text-center, .table-gumong td.text-center { text-align: center; }
</style>

<div class="container-fluid px-4">
    <div class="card shadow-sm">
        <div class="card-body">

            {{-- HEADER + SEARCH --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 fw-bold">DATA GUMONG</h4>
                
                <div class="d-flex align-items-center gap-2">
                    {{-- SEARCH --}}
                    <div class="input-group input-group-sm" style="width:220px">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="searchAll" class="form-control" placeholder="Search...">
                    </div>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.data-gumong.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </a>
                    @endif
                </div>
            </div>

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- TABLE --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap table-gumong" id="gumongTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>No Sertifikat NRP</th>
                            <th>Tanggal Sertifikat NRP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Instansi Asal</th>
                            <th>ID Rekrutmen</th>
                            @if(auth()->user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataGumongs as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nrp }}</td>
                                <td>{{ $item->no_sertifikat_nrp }}</td>
                                <td class="text-center">{{ $item->tanggal_sertifikat_nrp ? Carbon::parse($item->tanggal_sertifikat_nrp)->format('d-m-Y') : '-' }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->nama_instansi_asal }}</td>
                                <td>{{ $item->id_rekrutmen }}</td>

                                @if(auth()->user()->role === 'admin')
                                <td class="text-center">
                                    <a href="{{ route('admin.data-gumong.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.data-gumong.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ auth()->user()->role === 'admin' ? 11 : 10 }}" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- SEARCH SCRIPT --}}
<script>
document.getElementById('searchAll').addEventListener('keyup', function () {
    const keyword = this.value.toLowerCase();
    const rows = document.querySelectorAll('#gumongTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(keyword) ? '' : 'none';
    });
});
</script>

@endsection
