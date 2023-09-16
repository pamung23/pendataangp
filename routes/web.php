<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ZonaBlokController;
use App\Http\Controllers\DesaBinaanController;
use App\Http\Controllers\DesainTapakController;
use App\Http\Controllers\KawasanKonserController;
use App\Http\Controllers\PembinaanUsahaController;
use App\Http\Controllers\DaerahPenyanggaController;
use App\Http\Controllers\RencanaRealisasiController;
use App\Http\Controllers\PenangananPerkaraController;
use App\Http\Controllers\KemitraanKonservasiController;
use App\Http\Controllers\PemanfaatanZonaBlokController;
use App\Http\Controllers\PermasalahanKawasanController;
use App\Http\Controllers\PerencanaanPemulihanController;
use App\Http\Controllers\TenagaKarhutController;
use App\Http\Controllers\TenagaPengamananController;
use App\Http\Controllers\TenagaPengamananHutanKKController;
use App\Http\Controllers\TenagaPengamananSatkerController;
use App\Models\DaerahPenyangga;
use App\Models\PemanfaatanZonaBlok;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.layouts.app');
});
Route::prefix('admin')->group(function () {
    Route::resource('kawasankonser', KawasanKonserController::class);

    Route::get('/desaintapak', [DesainTapakController::class, 'index'])->name('desaintapak.index');
    Route::get('/desaintapak/create', [DesainTapakController::class, 'create'])->name('desaintapak.create');
    Route::post('/desaintapak', [DesainTapakController::class, 'store'])->name('desaintapak.store');
    Route::get('/desaintapak/{desaintapak}/edit', [DesainTapakController::class, 'edit'])->name('desaintapak.edit');
    Route::put('/desaintapak/{desaintapak}', [DesainTapakController::class, 'update'])->name('desaintapak.update');
    Route::delete('/desaintapak/{desaintapak}', [DesainTapakController::class, 'destroy'])->name('desaintapak.destroy');
    Route::get('/desaintapak/export', [DesainTapakController::class, 'exportToExcel'])->name('desaintapak.export');

    Route::get('/kemitraankonservasi', [KemitraanKonservasiController::class, 'index'])->name('kemitraankonservasi.index');
    Route::get('/kemitraankonservasi/create', [KemitraanKonservasiController::class, 'create'])->name('kemitraankonservasi.create');
    Route::post('/kemitraankonservasi', [KemitraanKonservasiController::class, 'store'])->name('kemitraankonservasi.store');
    Route::get('/kemitraankonservasi/{kemitraankonservasi}/edit', [KemitraanKonservasiController::class, 'edit'])->name('kemitraankonservasi.edit');
    Route::put('/kemitraankonservasi/{kemitraankonservasi}', [KemitraanKonservasiController::class, 'update'])->name('kemitraankonservasi.update');
    Route::delete('/kemitraankonservasi/{kemitraankonservasi}', [KemitraanKonservasiController::class, 'destroy'])->name('kemitraankonservasi.destroy');
    Route::get('/kemitraankonservasi/export', [KemitraanKonservasiController::class, 'exportToExcel'])->name('kemitraankonservasi.export');

    Route::get('/perencanaanpemulihan', [PerencanaanPemulihanController::class, 'index'])->name('perencanaanpemulihan.index');
    Route::get('/perencanaanpemulihan/create', [PerencanaanPemulihanController::class, 'create'])->name('perencanaanpemulihan.create');
    Route::post('/perencanaanpemulihan', [PerencanaanPemulihanController::class, 'store'])->name('perencanaanpemulihan.store');
    Route::get('/perencanaanpemulihan/{perencanaanpemulihan}/edit', [PerencanaanPemulihanController::class, 'edit'])->name('perencanaanpemulihan.edit');
    Route::put('/perencanaanpemulihan/{perencanaanpemulihan}', [PerencanaanPemulihanController::class, 'update'])->name('perencanaanpemulihan.update');
    Route::delete('/perencanaanpemulihan/{perencanaanpemulihan}', [PerencanaanPemulihanController::class, 'destroy'])->name('perencanaanpemulihan.destroy');
    Route::get('/perencanaanpemulihan/export', [PerencanaanPemulihanController::class, 'exportToExcel'])->name('perencanaanpemulihan.export');

    Route::get('/rencanarealisasi', [RencanaRealisasiController::class, 'index'])->name('rencanarealisasi.index');
    Route::get('/rencanarealisasi/create', [RencanaRealisasiController::class, 'create'])->name('rencanarealisasi.create');
    Route::post('/rencanarealisasi', [RencanaRealisasiController::class, 'store'])->name('rencanarealisasi.store');
    Route::get('/rencanarealisasi/{rencanarealisasi}/edit', [RencanaRealisasiController::class, 'edit'])->name('rencanarealisasi.edit');
    Route::put('/rencanarealisasi/{rencanarealisasi}', [RencanaRealisasiController::class, 'update'])->name('rencanarealisasi.update');
    Route::delete('/rencanarealisasi/{rencanarealisasi}', [RencanaRealisasiController::class, 'destroy'])->name('rencanarealisasi.destroy');
    Route::get('/rencanarealisasi/export', [RencanaRealisasiController::class, 'exportToExcel'])->name('rencanarealisasi.export');

    Route::get('/daerahpenyangga', [DaerahPenyanggaController::class, 'index'])->name('daerahpenyangga.index');
    Route::get('/daerahpenyangga/create', [DaerahPenyanggaController::class, 'create'])->name('daerahpenyangga.create');
    Route::post('/daerahpenyangga', [DaerahPenyanggaController::class, 'store'])->name('daerahpenyangga.store');
    Route::get('/daerahpenyangga/{daerahpenyangga}/edit', [DaerahPenyanggaController::class, 'edit'])->name('daerahpenyangga.edit');
    Route::put('/daerahpenyangga/{daerahpenyangga}', [DaerahPenyanggaController::class, 'update'])->name('daerahpenyangga.update');
    Route::delete('/daerahpenyangga/{daerahpenyangga}', [DaerahPenyanggaController::class, 'destroy'])->name('daerahpenyangga.destroy');
    Route::get('/daerahpenyangga/export', [DaerahPenyanggaController::class, 'exportToExcel'])->name('daerahpenyangga.export');

    Route::get('/desabinaans', [DesaBinaanController::class, 'index'])->name('desabinaans.index');
    Route::get('/desabinaans/create', [DesaBinaanController::class, 'create'])->name('desabinaans.create');
    Route::post('/desabinaans', [DesaBinaanController::class, 'store'])->name('desabinaans.store');
    Route::get('/desabinaans/{desabinaans}/edit', [DesaBinaanController::class, 'edit'])->name('desabinaans.edit');
    Route::put('/desabinaans/{desabinaans}', [DesaBinaanController::class, 'update'])->name('desabinaans.update');
    Route::delete('/desabinaans/{desabinaans}', [DesaBinaanController::class, 'destroy'])->name('desabinaans.destroy');
    Route::get('/desabinaans/export', [DesaBinaanController::class, 'exportToExcel'])->name('desabinaans.export');

    Route::get('/zonablok', [ZonaBlokController::class, 'index'])->name('zonablok.index');
    Route::get('/zonablok/create', [ZonaBlokController::class, 'create'])->name('zonablok.create');
    Route::post('/zonablok', [ZonaBlokController::class, 'store'])->name('zonablok.store');
    Route::get('/zonablok/{zonablok}/edit', [ZonaBlokController::class, 'edit'])->name('zonablok.edit');
    Route::put('/zonablok/{zonablok}', [ZonaBlokController::class, 'update'])->name('zonablok.update');
    Route::delete('/zonablok/{zonablok}', [ZonaBlokController::class, 'destroy'])->name('zonablok.destroy');
    Route::get('/zonablok/export', [ZonaBlokController::class, 'exportToExcel'])->name('zonablok.export');

    Route::get('/pemanfaatanzona', [PemanfaatanZonaBlokController::class, 'index'])->name('pemanfaatanzona.index');
    Route::get('/pemanfaatanzona/create', [PemanfaatanZonaBlokController::class, 'create'])->name('pemanfaatanzona.create');
    Route::post('/pemanfaatanzona', [PemanfaatanZonaBlokController::class, 'store'])->name('pemanfaatanzona.store');
    Route::get('/pemanfaatanzona/{pemanfaatanzona}/edit', [PemanfaatanZonaBlokController::class, 'edit'])->name('pemanfaatanzona.edit');
    Route::put('/pemanfaatanzona/{pemanfaatanzona}', [PemanfaatanZonaBlokController::class, 'update'])->name('pemanfaatanzona.update');
    Route::delete('/pemanfaatanzona/{pemanfaatanzona}', [PemanfaatanZonaBlokController::class, 'destroy'])->name('pemanfaatanzona.destroy');
    Route::get('/pemanfaatanzona/export', [PemanfaatanZonaBlokController::class, 'exportToExcel'])->name('pemanfaatanzona.export');

    Route::resource('desa', DesaController::class);
    Route::resource('booking', BookingController::class);

    // Rute untuk menampilkan halaman index dengan triwulan yang berbeda
    Route::get('pembinaanusaha', [PembinaanUsahaController::class, 'index'])->name('pembinaanusaha.index');
    Route::get('pembinaanusaha/triwulan/{triwulan}', [PembinaanUsahaController::class, 'index'])->name('pembinaanusaha.index.triwulan');
    Route::get('pembinaanusaha/export/{triwulan}/{year}', 'PembinaanUsahaController@exportToExcel')->name('pembinaanusaha.export');
    Route::get('pembinaanusaha/create/{triwulan}', [PembinaanUsahaController::class, 'create'])->name('pembinaanusaha.create');
    Route::post('pembinaanusaha', [PembinaanUsahaController::class, 'store'])->name('pembinaanusaha.store');
    Route::get('/pembinaanusaha/{triwulan}/{id}/edit', [PembinaanUsahaController::class, 'edit'])->name('pembinaanusaha.edit');
    Route::put('/pembinaanusaha/{triwulan}/{id}/update', [PembinaanUsahaController::class, 'update'])->name('pembinaanusaha.update');
    Route::delete('/pembinaanusaha/{triwulan}/{id}/destroy', [PembinaanUsahaController::class, 'destroy'])->name('pembinaanusaha.destroy');
    Route::get('permasalahankawasan', [PermasalahanKawasanController::class, 'index'])->name('permasalahankawasan.index');
    Route::get('permasalahankawasan/triwulan/{triwulan}', [PermasalahanKawasanController::class, 'index'])->name('permasalahankawasan.index.triwulan');

    // Rute untuk menampilkan formulir tambah dengan triwulan yang dinamis
    Route::get('permasalahankawasan/create/{triwulan}', [PermasalahanKawasanController::class, 'create'])
        ->name('permasalahankawasan.create');
    // Rute untuk menangani penyimpanan data
    Route::post('permasalahankawasan', [PermasalahanKawasanController::class, 'store'])->name('permasalahankawasan.store');

    // Rute untuk menampilkan formulir edit
    Route::get('/permasalahankawasan/{triwulan}/{id}/edit', [PermasalahanKawasanController::class, 'edit'])->name('permasalahankawasan.edit');
    Route::put('/permasalahankawasan/{triwulan}/{id}/update', [PermasalahanKawasanController::class, 'update'])->name('permasalahankawasan.update');
    Route::delete('/permasalahankawasan/{triwulan}/{id}/destroy', [PermasalahanKawasanController::class, 'destroy'])->name('permasalahankawasan.destroy');

    // Route::resource('penanganan_perkara', PenangananPerkaraController::class)->parameters([
    //     'penanganan-perkara' => 'triwulan' // Ganti nama parameter sesuai kebutuhan Anda
    // ]);
    Route::get('penanganan_perkara', [PenangananPerkaraController::class, 'index'])->name('penanganan_perkara.index');
    Route::get('penanganan_perkara/triwulan/{triwulan}', [PenangananPerkaraController::class, 'index'])->name('penanganan_perkara.index.triwulan');

    // Rute untuk menampilkan formulir tambah dengan triwulan yang dinamis
    Route::get('penanganan_perkara/create/{triwulan}', [PenangananPerkaraController::class, 'create'])
        ->name('penanganan_perkara.create');
    // Rute untuk menangani penyimpanan data
    Route::post('penanganan_perkara', [PenangananPerkaraController::class, 'store'])->name('penanganan_perkara.store');

    // Rute untuk menampilkan formulir edit
    Route::get('/penanganan_perkara/{triwulan}/{id}/edit', [PenangananPerkaraController::class, 'edit'])->name('penanganan_perkara.edit');
    Route::put('/penanganan_perkara/{triwulan}/{id}/update', [PenangananPerkaraController::class, 'update'])->name('penanganan_perkara.update');
    Route::delete('/penanganan_perkara/{triwulan}/{id}/destroy', [PenangananPerkaraController::class, 'destroy'])->name('penanganan_perkara.destroy');

    //
    Route::get('tenaga_pengamanan_hutan', [TenagaPengamananHutanKKController::class, 'index'])->name('tenaga_pengamanan_hutan.index');
    Route::get('tenaga_pengamanan_hutan/triwulan/{triwulan}', [TenagaPengamananHutanKKController::class, 'index'])->name('tenaga_pengamanan_hutan.index.triwulan');

    // Rute untuk menampilkan formulir tambah dengan triwulan yang dinamis
    Route::get('tenaga_pengamanan_hutan/create/{triwulan}', [TenagaPengamananHutanKKController::class, 'create'])
        ->name('tenaga_pengamanan_hutan.create');
    // Rute untuk menangani penyimpanan data
    Route::post('tenaga_pengamanan_hutan', [TenagaPengamananHutanKKController::class, 'store'])->name('tenaga_pengamanan_hutan.store');

    // Rute untuk menampilkan formulir edit
    Route::get('/tenaga_pengamanan_hutan/{triwulan}/{id}/edit', [TenagaPengamananHutanKKController::class, 'edit'])->name('tenaga_pengamanan_hutan.edit');
    Route::put('/tenaga_pengamanan_hutan/{triwulan}/{id}/update', [TenagaPengamananHutanKKController::class, 'update'])->name('tenaga_pengamanan_hutan.update');
    Route::delete('/tenaga_pengamanan_hutan/{triwulan}/{id}/destroy', [TenagaPengamananHutanKKController::class, 'destroy'])->name('tenaga_pengamanan_hutan.destroy');

    //
    Route::get('tenagapengamansatker', [TenagaPengamananSatkerController::class, 'index'])->name('tenagapengamansatker.index');
    Route::get('tenagapengamansatker/triwulan/{triwulan}', [TenagaPengamananSatkerController::class, 'index'])->name('tenagapengamansatker.index.triwulan');

    // Rute untuk menampilkan formulir tambah dengan triwulan yang dinamis
    Route::get('tenagapengamansatker/create/{triwulan}', [TenagaPengamananSatkerController::class, 'create'])->name('tenagapengamansatker.create');
    // Rute untuk menangani penyimpanan data
    Route::post('tenagapengamansatker', [TenagaPengamananSatkerController::class, 'store'])->name('tenagapengamansatker.store');

    // Rute untuk menampilkan formulir edit
    Route::get('/tenagapengamansatker/{triwulan}/{id}/edit', [TenagaPengamananSatkerController::class, 'edit'])->name('tenagapengamansatker.edit');
    Route::put('/tenagapengamansatker/{triwulan}/{id}/update', [TenagaPengamananSatkerController::class, 'update'])->name('tenagapengamansatker.update');
    Route::delete('/tenagapengamansatker/{triwulan}/{id}/destroy', [TenagaPengamananSatkerController::class, 'destroy'])
        ->name('tenagapengamansatker.destroy');

    //
    Route::get('tenagakarhut', [TenagaKarhutController::class, 'index'])->name('tenagakarhut.index');
    Route::get('tenagakarhut/triwulan/{triwulan}', [TenagaKarhutController::class, 'index'])->name('tenagakarhut.index.triwulan');

    // Rute untuk menampilkan formulir tambah dengan triwulan yang dinamis
    Route::get('tenagakarhut/create/{triwulan}', [TenagaKarhutController::class, 'create'])->name('tenagakarhut.create');
    // Rute untuk menangani penyimpanan data
    Route::post('tenagakarhut', [TenagaKarhutController::class, 'store'])->name('tenagakarhut.store');

    // Rute untuk menampilkan formulir edit
    Route::get('/tenagakarhut/{triwulan}/{id}/edit', [TenagaKarhutController::class, 'edit'])->name('tenagakarhut.edit');
    Route::put('/tenagakarhut/{triwulan}/{id}/update', [TenagaKarhutController::class, 'update'])->name('tenagakarhut.update');
    Route::delete('/tenagakarhut/{triwulan}/{id}/destroy', [TenagaKarhutController::class, 'destroy'])
        ->name('tenagakarhut.destroy');
});
