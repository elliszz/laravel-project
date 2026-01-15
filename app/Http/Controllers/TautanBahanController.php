<?php

namespace App\Http\Controllers;

use App\Models\TautanBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TautanBahanController extends Controller
{
    /**
     * Tampilkan daftar tautan
     */
    public function index()
    {
        $data = TautanBahan::latest()->get();

        if (Auth::user()->role === 'admin') {
            return view('admin.tautan.index', compact('data'));
        } else {
            return view('user.tautan.index', compact('data'));
        }
    }

    /**
     * Form tambah tautan (Admin saja)
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return view('admin.tautan.create');
    }

    /**
     * Simpan tautan (Admin saja)
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $request->validate([
            'tautan' => 'nullable|string|max:255',
            'isi_tautan' => 'required|string',
            'keterangan' => 'nullable|string',
            'tanggal_tautan' => 'nullable|date',
            'sumber' => 'nullable|string',
        ]);

        TautanBahan::create([
            'tautan' => $request->tautan ?: null,
            'isi_tautan' => $request->isi_tautan,
            'keterangan' => $request->keterangan,
            'tanggal_tautan' => $request->tanggal_tautan,
            'sumber' => $request->sumber,
        ]);

        return redirect()
            ->route('admin.tautan.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Form edit tautan (Admin saja)
     */
    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $tautan = TautanBahan::findOrFail($id);
        return view('admin.tautan.edit', compact('tautan'));
    }

    /**
     * Update tautan (Admin saja)
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $request->validate([
            'tautan' => 'nullable|string|max:255',
            'isi_tautan' => 'required|string',
            'keterangan' => 'nullable|string',
            'tanggal_tautan' => 'nullable|date',
            'sumber' => 'nullable|string',
        ]);

        $data = TautanBahan::findOrFail($id);

        $data->update([
            'tautan' => $request->tautan ?: null,
            'isi_tautan' => $request->isi_tautan,
            'keterangan' => $request->keterangan,
            'tanggal_tautan' => $request->tanggal_tautan,
            'sumber' => $request->sumber,
        ]);

        return redirect()
            ->route('admin.tautan.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Hapus tautan (Admin saja)
     */
    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $data = TautanBahan::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('admin.tautan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
