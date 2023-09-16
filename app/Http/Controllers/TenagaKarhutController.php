<?php

namespace App\Http\Controllers;

use App\Models\TenagaKarhut1;
use App\Models\TenagaKarhut2;
use App\Models\TenagaKarhut3;
use App\Models\TenagaKarhut4;
use Illuminate\Http\Request;

class TenagaKarhutController extends Controller
{
    protected $modelMapping = [
        1 => TenagaKarhut1::class,
        2 => TenagaKarhut2::class,
        3 => TenagaKarhut3::class,
        4 => TenagaKarhut4::class,
    ];

    public function index(Request $request)
    {
        $triwulan = $request->input('triwulan', 1);
        $model = $this->modelMapping[$triwulan] ?? TenagaKarhut1::class;
        $tenagakarhut = $model::all();
        return view('admin.tenagakarhut.index', compact('tenagakarhut', 'triwulan'));
    }

    public function create($triwulan)
    {
        $model = $this->modelMapping[$triwulan] ?? null;
        if (!$model) {
            return redirect()->route('tenagakarhut.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }
        return view('admin.tenagakarhut.create', compact('triwulan', 'model'));
    }

    public function store(Request $request)
    {
        $triwulan = $request->input('triwulan', 1);
        $model = $this->modelMapping[$triwulan] ?? null;
        if (!$model) {
            return redirect()->route('tenagakarhut.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }
        $data = $request->validate([
            'manggala_agni_pns' => 'required|integer',
            'manggala_agni_nonpns' => 'required|integer',
            'jumlah_regu' => 'required|integer',
            'mpa' => 'required|integer',
            'keterangan' => 'nullable',
        ]);
        // Simpan nilai Triwulan bersama dengan data
        $data['triwulan'] = $triwulan;
        $model::create($data);
        // Arahkan pengguna kembali ke indeks triwulan yang sesuai
        return redirect()->route('tenagakarhut.index.triwulan', ['triwulan' => $triwulan])->with('success', 'Data berhasil ditambahkan.');
    }


    public function edit($triwulan, $id)
    {
        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('tenagakarhut.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $model::findOrFail($id);

        return view('admin.tenagakarhut.edit', compact('triwulan', 'data'));
    }

    public function update(Request $request, $triwulan, $id)
    {
        $triwulan = $request->input('triwulan', 1);

        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('tenagakarhut.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $request->validate([
            'manggala_agni_pns' => 'required|integer',
            'manggala_agni_nonpns' => 'required|integer',
            'jumlah_regu' => 'required|integer',
            'mpa' => 'required|integer',
            'keterangan' => 'nullable',
        ]);

        // Temukan data yang akan diperbarui berdasarkan ID
        $dataToUpdate = $model::findOrFail($id);

        // Perbarui data dengan data yang valid
        $dataToUpdate->update($data);

        // Arahkan pengguna kembali ke indeks triwulan yang sesuai
        return redirect()->route('tenagakarhut.index.triwulan', ['triwulan' => $triwulan])->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($triwulan, $id)
    {
        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('tenagakarhut.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        // Temukan data yang akan dihapus berdasarkan ID
        $dataToDelete = $model::findOrFail($id);

        // Hapus data
        $dataToDelete->delete();

        return redirect()->route('tenagakarhut.index', ['triwulan' => $triwulan])->with('success', 'Data berhasil dihapus.');
    }
}
