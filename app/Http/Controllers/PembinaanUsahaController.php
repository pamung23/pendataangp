<?php

namespace App\Http\Controllers;

use App\Exports\PembinaanUsahaExport;
use Illuminate\Http\Request;
use App\Models\PembinaanUsaha;
use App\Models\PembinaanUsaha1;
use App\Models\PembinaanUsaha2;
use App\Models\PembinaanUsaha3;
use App\Models\PembinaanUsaha4;
use Maatwebsite\Excel\Facades\Excel;

class PembinaanUsahaController extends Controller
{
    protected $modelMapping = [
        1 => PembinaanUsaha1::class,
        2 => PembinaanUsaha2::class,
        3 => PembinaanUsaha3::class,
        4 => PembinaanUsaha4::class,
    ];

    public function index(Request $request)
    {
        $triwulan = $request->input('triwulan', 1);
        $year = $request->input('year'); // Get the selected year from the request

        $model = $this->modelMapping[$triwulan] ?? PembinaanUsaha1::class;

        // Fetch data based on the selected year (if provided)
        $query = $model::query();

        if ($year) {
            $query->whereYear('created_at', $year);
        }

        $pembinaanUsahas = $query->get();

        // Fetch the unique years from the selected model
        $uniqueYears = $model::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('admin.pembinaanusaha.index', compact('pembinaanUsahas', 'triwulan', 'uniqueYears', 'year'));
    }

    public function exportToExcel(Request $request)
    {
        $triwulan = $request->query('triwulan', null);
        $year = $request->query('year', null);

        if ($year && $triwulan) {
            // Download data untuk triwulan tertentu dalam satu tahun
            return Excel::download(new PembinaanUsahaExport($triwulan, $year), 'pembinaanusaha_' . $triwulan . '_' . $year . '.xlsx');
        } elseif ($triwulan) {
            // Download data untuk semua triwulan dalam satu tahun tertentu
            return Excel::download(new PembinaanUsahaExport($triwulan, null), 'pembinaanusaha_' . $triwulan . '.xlsx');
        } elseif ($year) {
            // Download data untuk semua triwulan dalam satu tahun tertentu
            $triwulan1 = 1;
            $triwulan2 = 2;
            $triwulan3 = 3;
            $triwulan4 = 4;

            // Gabungkan keempat file Excel ke dalam satu file ZIP
            $zipFileName = 'pembinaanusaha_' . $year . '_triwulan_' . $triwulan1 . '_to_' . $triwulan4 . '.zip';
            $zip = new \ZipArchive();
            $zip->open($zipFileName, \ZipArchive::CREATE);

            for ($i = $triwulan1; $i <= $triwulan4; $i++) {
                $export = new PembinaanUsahaExport($i, $year);
                $excelFileName = 'pembinaanusaha_' . $i . '_' . $year . '.xlsx';
                $excelFilePath = storage_path('app/' . $excelFileName);
                Excel::store($export, $excelFileName);
                $zip->addFile($excelFilePath, $excelFileName);
            }

            $zip->close();

            // Hapus file Excel individu setelah digabungkan
            for ($i = $triwulan1; $i <= $triwulan4; $i++) {
                $excelFileName = 'pembinaanusaha_' . $i . '_' . $year . '.xlsx';
                $excelFilePath = storage_path('app/' . $excelFileName);
                unlink($excelFilePath);
            }

            // Kembalikan file ZIP yang diunduh
            return response()->download($zipFileName)->deleteFileAfterSend(true);
        } else {
            // Redirect to a default page if neither year nor triwulan is selected
            return redirect()->route('pembinaanusaha.index'); // Replace with your desired default route
        }
    }


    public function create($triwulan)
    {
        $model = $this->modelMapping[$triwulan] ?? null;
        if (!$model) {
            return redirect()->route('pembinaanusaha.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }
        return view('admin.pembinaanusaha.create', compact('triwulan', 'model'));
    }

    public function store(Request $request)
    {
        $triwulan = $request->input('triwulan', 1);

        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('pembinaanusaha.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $request->validate([
            'nama_kelompok' => 'required|string|max:255',
            'anggota' => 'required|integer',
            'jenis_kegiatan' => 'required|string|max:255',
            'jumlah_dana' => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'hasil_manfaat' => 'required|string',
            'pendamping' => 'required|string|max:255',
            'keterangan' => 'nullable',
        ]);

        // Simpan nilai Triwulan bersama dengan data
        $data['triwulan'] = $triwulan;

        $model::create($data);

        // Arahkan pengguna kembali ke indeks triwulan yang sesuai
        return redirect()->route('pembinaanusaha.index.triwulan', ['triwulan' => $triwulan])->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($triwulan, $id)
    {
        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('pembinaanusaha.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $model::findOrFail($id);

        return view('admin.pembinaanusaha.edit', compact('triwulan', 'data'));
    }


    public function update(Request $request, $triwulan, $id)
    {
        $triwulan = $request->input('triwulan', 1);

        $model = $this->modelMapping[$triwulan] ?? null;

        if (!$model) {
            return redirect()->route('pembinaanusaha.index.triwulan', ['triwulan' => $triwulan])->with('error', 'Triwulan tidak valid.');
        }

        $data = $request->validate([
            'no_register_kawasan' => 'required|string|max:255',
            'nama_kelompok' => 'required|string|max:255',
            'anggota' => 'required|integer',
            'jenis_kegiatan' => 'required|string|max:255',
            'jumlah_dana' => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'hasil_manfaat' => 'required|string',
            'pendamping' => 'required|string|max:255',
            'keterangan' => 'nullable',
        ]);

        // Temukan data yang akan diperbarui berdasarkan ID
        $dataToUpdate = $model::findOrFail($id);

        // Perbarui data dengan data yang valid
        $dataToUpdate->update($data);

        // Arahkan pengguna kembali ke indeks triwulan yang sesuai
        return redirect()->route('pembinaanusaha.index.triwulan', ['triwulan' => $triwulan])->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($triwulan, $id)
    {
        $model = $this->modelMapping[$triwulan] ?? PembinaanUsaha1::class;

        // Temukan data yang akan dihapus berdasarkan ID
        $dataToDelete = $model::findOrFail($id);

        // Hapus data
        $dataToDelete->delete();

        return redirect()->route('pembinaanusaha.index', ['triwulan' => $triwulan])->with('success', 'Data berhasil dihapus.');
    }
}
