@extends('layouts.app')

@section('title', 'Data Laporan GTK')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')

<style>
    :root {
        --ungu-dark: #4b2e83;
        --ungu-hover: #40276f;
        --ungu-soft: #c7b9e6;
        --ungu-soft-hover: #b6a5dd;
    }

    .table-gtk { font-size: 13px; }
    .table-gtk th, .table-gtk td { padding: 6px 8px; vertical-align: top; }
    .table-gtk thead th { font-size: 13px; white-space: nowrap; }
    .wrap-text { white-space: normal !important; word-break: break-word; }
    .table-gtk .badge { font-size: 11px; padding: 4px 8px; }
    .table-gtk .btn-sm { padding: 3px 6px; font-size: 12px; }
    .table-gtk i { font-size: 14px; }

    .table-dark { background-color: var(--ungu-dark) !important; color: #fff; }
    .table-dark th { background-color: var(--ungu-dark) !important; border-color: rgba(255,255,255,0.15); }

    .btn-primary { background-color: var(--ungu-dark); border-color: var(--ungu-dark); }
    .btn-primary:hover { background-color: var(--ungu-hover); border-color: var(--ungu-hover); }

    .btn-warning { background-color: var(--ungu-soft); border-color: var(--ungu-soft); color: #3b2b63; }
    .btn-warning:hover { background-color: var(--ungu-soft-hover); border-color: var(--ungu-soft-hover); color: #2f234f; }

    .card { border: 1px solid #e3dcf3; }

    .icon-doc { display: inline-flex; align-items: center; justify-content: center; width: 38px; height: 38px; border-radius: 10px; color: #fff; text-decoration: none; transition: all 0.3s ease; }
    .icon-doc:hover { transform: scale(1.15); box-shadow: 0 0 12px rgba(75,46,131,0.4); color: #fff; }

    .bg-doc-1 { background: linear-gradient(135deg,#5a3d9a,#4b2e83); }
    .bg-doc-2 { background: linear-gradient(135deg,#6b52a8,#4b2e83); }
    .bg-doc-3 { background: linear-gradient(135deg,#8e7cc3,#5a3d9a); }
</style>

<div class="container-fluid px-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 fw-bold">DATA LAPORAN GTK</h4>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.laporan-gtk.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Tambah
                    </a>
                @endif
            </div>

            @if(session('success'))
                <div class="alert alert-success py-2">
                    <i class="bi bi-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle table-gtk">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Kode</th>
                            <th style="min-width:260px">Komponen RAB</th>
                            <th>Rasilasi</th>
                            <th>Tanggal</th>
                            <th style="min-width:120px">PIC</th>
                            <th style="min-width:300px">Acara</th>
                            <th style="min-width:300px">Deskripsi Kegiatan</th>
                            <th style="min-width:180px">Folder Bukti</th>
                            <th style="min-width:240px">Bukti Akademik</th>
                            <th style="min-width:240px">Bukti Keuangan</th>
                            @if(auth()->user()->role === 'admin')
                                <th width="120">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporanGtks as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td class="text-center">{{ $item->kode }}</td>
                            <td class="wrap-text">{{ $item->komponen_rab }}</td>
                            <td class="text-center">
                                @php
                                    $color = match($item->rasilasi) {
                                        'true' => 'success',
                                        'false' => 'danger',
                                        'sebagian' => 'warning',
                                        default => 'secondary',
                                    };
                                @endphp
                                <span class="badge bg-{{ $color }}">{{ ucfirst($item->rasilasi) }}</span>
                            </td>
                            <td class="text-center text-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="wrap-text">{{ $item->pic }}</td>
                            <td class="wrap-text">{{ $item->acara }}</td>
                            <td class="wrap-text">{{ $item->deskripsi_kegiatan }}</td>
                            <td class="text-center">
                                @if($item->folder_bukti && Str::startsWith($item->folder_bukti, ['http://','https://']))
                                    <a href="{{ $item->folder_bukti }}" target="_blank" class="icon-doc bg-doc-1" title="📂 Folder Bukti"><i class="bi bi-folder-fill"></i></a>
                                @else
                                    {{ $item->folder_bukti ?? '-' }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->bukti_akademik && Str::startsWith($item->bukti_akademik, ['http://','https://']))
                                    <a href="{{ $item->bukti_akademik }}" target="_blank" class="icon-doc bg-doc-2" title="📄 Bukti Akademik"><i class="bi bi-file-earmark-text"></i></a>
                                @else
                                    {{ $item->bukti_akademik ?? '-' }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->bukti_keuangan && Str::startsWith($item->bukti_keuangan, ['http://','https://']))
                                    <a href="{{ $item->bukti_keuangan }}" target="_blank" class="icon-doc bg-doc-3" title="💰 Bukti Keuangan"><i class="bi bi-cash-coin"></i></a>
                                @else
                                    {{ $item->bukti_keuangan ?? '-' }}
                                @endif
                            </td>
                            @if(auth()->user()->role === 'admin')
                            <td class="text-center text-nowrap">
                                <a href="{{ route('admin.laporan-gtk.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.laporan-gtk.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'admin' ? 13 : 12 }}" class="text-center text-muted">Data belum ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
        new bootstrap.Tooltip(el);
    });
});
</script>

@endsection
