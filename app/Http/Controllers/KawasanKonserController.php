<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KawasanKonser;
use App\Models\PerencanaanPKK;

class KawasanKonserController extends Controller
{
    public function index()
    {
        $perencanaanpkk = PerencanaanPKK::all();
        return view('admin.kawasankonser.index', compact('perencanaanpkk'));
    }

    public function create()
    {

        return view('admin.kawasankonser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jpan_nomor' => 'required|string|max:255',
            'jpan_tanggal' => 'required|date',
            'jpan_mulai' => 'required|date',
            'jpan_akhir' => 'required|date',
            'jpen_nomor' => 'required|string|max:255',
            'jpen_tanggal' => 'required|date',
            'jpen_periode' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);
        PerencanaanPKK::create($request->all()); // Remove the extra dollar sign ($)

        return redirect()->route('kawasankonser.index')->with('success', 'Perusahaan Sukses diTambah');
    }

    public function edit($perencanaanpkk)
    {
        $perencanaanpkk = PerencanaanPKK::findOrFail($perencanaanpkk);
        return view('admin.kawasankonser.edit', compact('perencanaanpkk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jpan_nomor' => 'required|string|max:255',
            'jpan_tanggal' => 'required|date',
            'jpan_mulai' => 'required|date',
            'jpan_akhir' => 'required|date',
            'jpen_nomor' => 'required|string|max:255',
            'jpen_tanggal' => 'required|date',
            'jpen_periode' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $perencanaanpkk = PerencanaanPKK::findOrFail($id);
        $perencanaanpkk->update($request->all());

        return redirect()->route('kawasankonser.index')->with('success', 'Data berhasil diperbarui');
    }


    public function destroy($id)
    {
        $perencanaanpkk = PerencanaanPKK::findOrFail($id);
        $perencanaanpkk->delete();

        return redirect()->route('kawasankonser.index')->with('success', 'Data berhasil dihapus');
    }
}
