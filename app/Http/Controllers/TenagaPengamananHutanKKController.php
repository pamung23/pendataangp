<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenagaPengamananHutanKK1;
use App\Models\TenagaPengamananHutanKK2;
use App\Models\TenagaPengamananHutanKK3;
use App\Models\TenagaPengamananHutanKK4;

class TenagaPengamananHutanKKController extends Controller
{
    protected $modelMapping = [
        1 => TenagaPengamananHutanKK1::class,
        2 => TenagaPengamananHutanKK2::class,
        3 => TenagaPengamananHutanKK3::class,
        4 => TenagaPengamananHutanKK4::class,
    ];

    public function index(Request $request)
    {
        $triwulan = $request->input('triwulan', 1);

        $model = $this->modelMapping[$triwulan] ?? TenagaPengamananHutanKK1::class;

        $tenagaPengamananHutan = $model::all();

        return view('admin.tenaga_pengamanan_hutan.index', compact('tenagaPengamananHutan', 'triwulan'));
    }

    public function create($triwulan)
    {
        $model = $this->modelMapping[$triwulan] ?? null;
        if (!$model) {
            return redirect()->route('tenaga_pengamanan_hutan.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }
        return view('admin.tenaga_pengamanan_hutan.create', compact('triwulan', 'model'));
    }

    public function store(Request $request)
    {
        $triwulan = $request->input('triwulan', 1);

        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('tenaga_pengamanan_hutan.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $request->validate([
            'polhut' => 'required|integer',
            'ppns' => 'required|integer',
            'tphl' => 'required|integer',
            'mmp' => 'required|integer',
            'keterangan' => 'nullable',
        ]);

        // Simpan nilai Triwulan bersama dengan data
        $data['triwulan'] = $triwulan;

        $model::create($data);

        // Arahkan pengguna kembali ke indeks triwulan yang sesuai
        return redirect()->route('tenaga_pengamanan_hutan.index.triwulan', ['triwulan' => $triwulan])->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($triwulan, $id)
    {
        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('tenaga_pengamanan_hutan.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $model::findOrFail($id);

        return view('admin.tenaga_pengamanan_hutan.edit', compact('triwulan', 'data'));
    }

    public function update(Request $request, $triwulan, $id)
    {
        $triwulan = $request->input('triwulan', 1);

        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('tenaga_pengamanan_hutan.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $request->validate([
            'polhut' => 'required|integer',
            'ppns' => 'required|integer',
            'tphl' => 'required|integer',
            'mmp' => 'required|integer',
            'keterangan' => 'nullable',
        ]);

        // Temukan data yang akan diperbarui berdasarkan ID
        $dataToUpdate = $model::findOrFail($id);

        // Perbarui data dengan data yang valid
        $dataToUpdate->update($data);

        // Arahkan pengguna kembali ke indeks triwulan yang sesuai
        return redirect()->route('tenaga_pengamanan_hutan.index.triwulan', ['triwulan' => $triwulan])->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($triwulan, $id)
    {
        $model = $this->modelMapping[$triwulan] ?? TenagaPengamananHutanKK1::class;

        // Temukan data yang akan dihapus berdasarkan ID
        $dataToDelete = $model::findOrFail($id);

        // Hapus data
        $dataToDelete->delete();

        return redirect()->route('tenaga_pengamanan_hutan.index', ['triwulan' => $triwulan])->with('success', 'Data berhasil dihapus.');
    }
}
