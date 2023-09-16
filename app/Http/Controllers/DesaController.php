<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desa = Desa::all();
        return view('admin.desa.index', compact('desa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'desa' => 'required|string|max:255',

        ]);
        Desa::create($data);
        return redirect()->route('desa.index')->with('success', 'Data successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $desa = Desa::findOrfail($id);
        return view('admin.desa.edit', compact('desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'desa' => 'required|string|max:255',

        ]);
        Desa::where('id', $id)->update($data);

        return redirect()->route('desa.index')
            ->with('success', 'Data perencanaan pemulihan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Desa::findOrFail($id)->delete();
        return redirect()->route('desa.index')
            ->with('success', 'Data Rencana Realisasi Pemulihan Ekosistem berhasil dihapus.');
    }
}
