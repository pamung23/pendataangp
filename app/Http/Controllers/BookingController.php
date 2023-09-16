<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Models\Booking; // Sesuaikan dengan model Booking Anda

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(20); // 20 adalah jumlah item per halaman

        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        return view('admin.booking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tujuan' => 'required|string|max:50',
            'pintu_masuk' => 'required|string|max:50',
            'pintu_keluar' => 'required|string|max:50',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'organisasi_nama' => 'required|string|max:255',
            'organisasi_alamat' => 'required|string|max:255',
            'organisasi_telepon' => 'required|string|max:20',
            'anggota' => 'required|string|max:255',
            'sandi' => 'required|string|max:255',
            'pembayaran' => 'required|string|max:255',
            'validasi' => 'required|string|max:255',
            'kesehatan' => 'required|string|max:255',
            'simaksi' => 'required|string|max:255',
            'agency' => 'nullable|string',
            'flag' => 'required|string|max:255',
            // 'batal' => 'nullable|boolean',
        ]);

        Booking::create($request->all());
        return redirect()->route('booking.index')->with('success', 'Data Booking berhasil disimpan.');
    }



    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            // Definisikan aturan validasi sesuai kebutuhan Anda
        ]);

        // Perbarui data Booking berdasarkan ID
        $booking = Booking::findOrFail($id);
        $booking->update($validatedData);

        return redirect()->route('booking.index')->with('success', 'Data Booking berhasil diperbarui.');
    }

    public function destroy($id)
    {

        Booking::findOrFail($id)->delete();
        return redirect()->route('booking.index')->with('success', 'Data Booking berhasil dihapus.');
    }
}
