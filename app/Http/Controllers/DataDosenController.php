<?php

namespace App\Http\Controllers;

use App\Models\DataDosen;
use Illuminate\Http\Request;

class DataDosenController extends Controller
{
    /**
     * ADMIN & USER (BEDA VIEW)
     */
    public function index()
    {
        $dataDosens = DataDosen::latest()->get();

        if (auth()->user()->role === 'admin') {
            return view('admin.data_dosen.index', compact('dataDosens'));
        }

        // USER → VIEW SAJA
        return view('user.data_dosen.index', compact('dataDosens'));
    }

    /**
     * ADMIN ONLY
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.data_dosen.create');
    }

    /**
     * ADMIN ONLY
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
        ]);

        DataDosen::create($request->all());

        return redirect()
            ->route('admin.data-dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan');
    }

    /**
     * ADMIN ONLY
     */
    public function edit(DataDosen $dataDosen)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.data_dosen.edit', compact('dataDosen'));
    }

    /**
     * ADMIN ONLY
     */
    public function update(Request $request, DataDosen $dataDosen)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
        ]);

        $dataDosen->update($request->all());

        return redirect()
            ->route('admin.data-dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui');
    }

    /**
     * ADMIN ONLY
     */
    public function destroy(DataDosen $dataDosen)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $dataDosen->delete();

        return redirect()
            ->route('admin.data-dosen.index')
            ->with('success', 'Data dosen berhasil dihapus');
    }
}
