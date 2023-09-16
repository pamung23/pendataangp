<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermasalahanKawasan;
use App\Models\PermasalahanKawasan1;
use App\Models\PermasalahanKawasan2;
use App\Models\PermasalahanKawasan3;
use App\Models\PermasalahanKawasan4;

class PermasalahanKawasanController extends Controller
{
    protected $modelMapping = [
        1 => PermasalahanKawasan1::class,
        2 => PermasalahanKawasan2::class,
        3 => PermasalahanKawasan3::class,
        4 => PermasalahanKawasan4::class,
    ];

    public function index(Request $request)
    {
        $triwulan = $request->input('triwulan', 1);

        $model = $this->modelMapping[$triwulan] ?? PermasalahanKawasan1::class;

        $permasalahanKawasan = $model::all();

        return view('admin.permasalahankawasan.index', compact('permasalahanKawasan', 'triwulan'));
    }

    public function create($triwulan)
    {
        $model = $this->modelMapping[$triwulan] ?? null;
        if (!$model) {
            return redirect()->route('permasalahankawasan.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }
        return view('admin.permasalahankawasan.create', compact('triwulan', 'model'));
    }

    public function store(Request $request)
    {
        $triwulan = $request->input('triwulan', 1);

        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('permasalahankawasan.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $request->validate([
            'jenis_permasalahan' => 'required|string|max:255',
            'uraian_permasalahan' => 'required|string',
            'progres_penyelesaian' => 'required|string|max:255',
            'keterangan' =>  'required|string|max:255',
        ]);

        // Simpan nilai Triwulan bersama dengan data
        $data['triwulan'] = $triwulan;

        $model::create($data);

        // Arahkan pengguna kembali ke indeks triwulan yang sesuai
        return redirect()->route('permasalahankawasan.index.triwulan', ['triwulan' => $triwulan])->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($triwulan, $id)
    {
        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('permasalahankawasan.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $model::findOrFail($id);

        return view('admin.permasalahankawasan.edit', compact('triwulan', 'data'));
    }

    public function update(Request $request, $triwulan, $id)
    {
        $triwulan = $request->input('triwulan', 1);

        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('permasalahankawasan.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $request->validate([
            'no_register_kawasan' => 'required|string|max:255',
            'jenis_permasalahan' => 'required|string|max:255',
            'uraian_permasalahan' => 'required|string',
            'progres_penyelesaian' => 'required|string|max:255',
            'keterangan' =>  'required|string|max:255',
        ]);

        // Temukan data yang akan diperbarui berdasarkan ID
        $dataToUpdate = $model::findOrFail($id);

        // Perbarui data dengan data yang valid
        $dataToUpdate->update($data);

        // Arahkan pengguna kembali ke indeks triwulan yang sesuai
        return redirect()->route('permasalahankawasan.index.triwulan', ['triwulan' => $triwulan])->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($triwulan, $id)
    {
        $model = $this->modelMapping[$triwulan] ?? PermasalahanKawasan1::class;

        // Temukan data yang akan dihapus berdasarkan ID
        $dataToDelete = $model::findOrFail($id);

        // Hapus data
        $dataToDelete->delete();

        return redirect()->route('permasalahankawasan.index', ['triwulan' => $triwulan])->with('success', 'Data berhasil dihapus.');
    }
}
