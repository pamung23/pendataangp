@extends('admin.layouts.app')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
<link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h3>Triwulan {{ $triwulan }}</h3>
                            <h4>Tambah Data Pembinaan Usaha Ekonomi Produktif pada Daerah Penyangga Kawasan Konservasi
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                            <form action="{{ route('pembinaanusaha.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="triwulan" value="{{ $triwulan }}">
                                <div class="form-group">
                                    <label for="nama_kelompok">Nama Kelompok</label>
                                    <input type="text" class="form-control @error('nama_kelompok') is-invalid @enderror"
                                        id="nama_kelompok" name="nama_kelompok" required>
                                </div>
                                <div class="form-group">
                                    <label for="anggota">Anggota</label>
                                    <input type="number" class="form-control @error('anggota') is-invalid @enderror"
                                        id="anggota" name="anggota" required>

                                </div>
                                <div class="form-group">
                                    <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                    <input type="text"
                                        class="form-control @error('jenis_kegiatan') is-invalid @enderror"
                                        id="jenis_kegiatan" name="jenis_kegiatan" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_dana">Jumlah Dana</label>
                                    <input type="number" class="form-control @error('jumlah_dana') is-invalid @enderror"
                                        id="jumlah_dana" name="jumlah_dana" required>
                                </div>
                                <div class="form-group">
                                    <label for="sumber_dana">Sumber Dana</label>
                                    <input type="text" class="form-control @error('sumber_dana') is-invalid @enderror"
                                        id="sumber_dana" name="sumber_dana" required>

                                </div>
                                <div class="form-group">
                                    <label for="hasil_manfaat">Hasil Manfaat</label>
                                    <input type="text" class="form-control @error('hasil_manfaat') is-invalid @enderror"
                                        id="hasil_manfaat" name="hasil_manfaat" required>
                                </div>
                                <div class="form-group">
                                    <label for="pendamping">Pendamping</label>
                                    <input type="text" class="form-control @error('pendamping') is-invalid @enderror"
                                        id="pendamping" name="pendamping" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4" id="submit-button">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
<script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('plugins/flatpickr/custom-flatpickr.js') }}"></script>
<script>
    // Fungsi untuk menampilkan pesan pemberitahuan
    function showValidationMessage() {
        var validationMessage = document.getElementById("validation-message");
        validationMessage.style.display = "block";
    }

    // Fungsi untuk menyembunyikan pesan pemberitahuan
    function hideValidationMessage() {
        var validationMessage = document.getElementById("validation-message");
        validationMessage.style.display = "none";
    }

    // Fungsi untuk memeriksa apakah semua input telah diisi
    function validateForm() {
        var namaKelompok = document.forms["pembinaan-form"]["nama_kelompok"].value;
        var anggota = document.forms["pembinaan-form"]["anggota"].value;
        var jenisKegiatan = document.forms["pembinaan-form"]["jenis_kegiatan"].value;
        var jumlahDana = document.forms["pembinaan-form"]["jumlah_dana"].value;
        var sumberDana = document.forms["pembinaan-form"]["sumber_dana"].value;
        var hasilManfaat = document.forms["pembinaan-form"]["hasil_manfaat"].value;
        var pendamping = document.forms["pembinaan-form"]["pendamping"].value;

        if (
            namaKelompok == "" ||
            anggota == "" ||
            jenisKegiatan == "" ||
            jumlahDana == "" ||
            sumberDana == "" ||
            hasilManfaat == "" ||
            pendamping == ""
        ) {
            showValidationMessage(); // Menampilkan pesan pemberitahuan jika ada input yang kosong
            return false;
        }

        hideValidationMessage(); // Menyembunyikan pesan pemberitahuan jika semua input telah diisi
        return true;
    }

    // Tambahkan event listener untuk validasi sebelum mengirimkan formulir
    document.getElementById("pembinaan-form").addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Mencegah pengiriman formulir jika validasi gagal
        }
    });
</script>
@endpush