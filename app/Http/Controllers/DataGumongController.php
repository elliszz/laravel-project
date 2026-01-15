<?php

namespace App\Http\Controllers;

use App\Models\DataGumong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataGumongController extends Controller
{
    /**
     * Tampilkan data gumong
     */
    public function index()
    {
        $dataGumongs = DataGumong::latest()->get();

        // Pilih view sesuai role
        if (Auth::user()->role === 'admin') {
            return view('admin.data_gumong.index', compact('dataGumongs'));
        } else {
            return view('user.data_gumong.index', compact('dataGumongs'));
        }
    }

    /**
     * Form tambah data gumong (Hanya Admin)
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return view('admin.data_gumong.create');
    }

    /**
     * Simpan data gumong (Hanya Admin)
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        DataGumong::create($request->only([
            'nrp',
            'no_sertifikat_nrp',
            'tanggal_sertifikat_nrp',
            'npsn_lptk',
            'nama_lptk',
            'kode_jenis_peserta',
            'jenis_peserta',
            'kode_rumpun',
            'nama_rumpun',
            'kode_bidang_studi_ppg',
            'nama_bidang_studi_ppg',
            'kategori_peserta',
            'nama',
            'email',
            'no_hp',
            'nik',
            'npwp',
            'nidn',
            'nuptk',
            'golongan_pns_asn',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'npsn_instansi_asal',
            'nama_instansi_asal',
            'pendidikan_terakhir',
            'id_rekrutmen',
        ]));

        return redirect()
            ->route('admin.data-gumong.index')
            ->with('success', 'Data gumong berhasil ditambahkan');
    }

    /**
     * Form edit data gumong (Hanya Admin)
     */
    public function edit(DataGumong $dataGumong)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        return view('admin.data_gumong.edit', compact('dataGumong'));
    }

    /**
     * Update data gumong (Hanya Admin)
     */
    public function update(Request $request, DataGumong $dataGumong)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $dataGumong->update($request->only([
            'nrp',
            'no_sertifikat_nrp',
            'tanggal_sertifikat_nrp',
            'npsn_lptk',
            'nama_lptk',
            'kode_jenis_peserta',
            'jenis_peserta',
            'kode_rumpun',
            'nama_rumpun',
            'kode_bidang_studi_ppg',
            'nama_bidang_studi_ppg',
            'kategori_peserta',
            'nama',
            'email',
            'no_hp',
            'nik',
            'npwp',
            'nidn',
            'nuptk',
            'golongan_pns_asn',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'npsn_instansi_asal',
            'nama_instansi_asal',
            'pendidikan_terakhir',
            'id_rekrutmen',
        ]));

        return redirect()
            ->route('admin.data-gumong.index')
            ->with('success', 'Data gumong berhasil diperbarui');
    }

    /**
     * Hapus data gumong (Hanya Admin)
     */
    public function destroy(DataGumong $dataGumong)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }

        $dataGumong->delete();

        return redirect()
            ->route('admin.data-gumong.index')
            ->with('success', 'Data gumong berhasil dihapus');
    }
}
