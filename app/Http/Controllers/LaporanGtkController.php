<?php

namespace App\Http\Controllers;

use App\Models\LaporanGtk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanGtkController extends Controller
{
    /**
     * Tampilkan daftar laporan GTK
     */
    public function index()
    {
        $laporanGtks = LaporanGtk::latest()->get();

        if (Auth::user()->role === 'admin') {
            return view('admin.laporan-gtk.index', compact('laporanGtks'));
        } else {
            return view('user.laporan-gtk.index', compact('laporanGtks'));
        }
    }

    /**
     * Form tambah laporan GTK (Admin saja)
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return view('admin.laporan-gtk.create');
    }

    /**
     * Simpan laporan GTK (Admin saja)
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $validated = $request->validate([
            'kategori' => 'required',
            'kode' => 'required',
            'komponen_rab' => 'required',
            'rasilasi' => 'required|in:true,false,sebagian',
            'tanggal' => 'required|date',
            'deskripsi_kegiatan' => 'required',
            'pic' => 'required',
            'acara' => 'required',

            'folder_bukti' => 'nullable',
            'bukti_akademik' => 'nullable',
            'bukti_keuangan' => 'nullable',
        ]);

        LaporanGtk::create($validated);

        return redirect()
            ->route('admin.laporan-gtk.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Lihat detail laporan GTK (Admin & User)
     */
    public function show(LaporanGtk $laporanGtk)
    {
        if (Auth::user()->role === 'admin') {
            return view('admin.laporan-gtk.show', compact('laporanGtk'));
        } else {
            return view('user.laporan-gtk.show', compact('laporanGtk'));
        }
    }

    /**
     * Form edit laporan GTK (Admin saja)
     */
    public function edit(LaporanGtk $laporanGtk)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return view('admin.laporan-gtk.edit', compact('laporanGtk'));
    }

    /**
     * Update laporan GTK (Admin saja)
     */
    public function update(Request $request, LaporanGtk $laporanGtk)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $validated = $request->validate([
            'kategori' => 'required',
            'kode' => 'required',
            'komponen_rab' => 'required',
            'rasilasi' => 'required|in:true,false,sebagian',
            'tanggal' => 'required|date',
            'deskripsi_kegiatan' => 'required',
            'pic' => 'required',
            'acara' => 'required',

            'folder_bukti' => 'nullable',
            'bukti_akademik' => 'nullable',
            'bukti_keuangan' => 'nullable',
        ]);

        $laporanGtk->update($validated);

        return redirect()
            ->route('admin.laporan-gtk.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Hapus laporan GTK (Admin saja)
     */
    public function destroy(LaporanGtk $laporanGtk)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $laporanGtk->delete();

        return redirect()
            ->route('admin.laporan-gtk.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
