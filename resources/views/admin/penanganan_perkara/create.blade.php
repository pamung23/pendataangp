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
                            <h4>Tambah Data Penanganan Perkara Tindak Pidana</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                            <!-- Pesan pemberitahuan -->
                            <div id="validation-message" class="alert alert-danger" style="display: none;">
                                Harap isi semua kolom sebelum mengirimkan formulir.
                            </div>

                            <form action="{{ route('penanganan_perkara.store') }}" method="POST" id="permasalahan-form">
                                @csrf
                                <input type="hidden" name="triwulan" value="{{ $triwulan }}">
                                <div class="form-group">
                                    <label for="satker_id">Satuan Kerja</label>
                                    <input type="text" class="form-control" id="satker_id" name="satker_id" required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian_kasus">Uraian Kasus</label>
                                    <textarea class="form-control" id="uraian_kasus" name="uraian_kasus" rows="4"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tersangka">Tersangka</label>
                                    <input type="text" class="form-control" id="tersangka" name="tersangka" required>
                                </div>
                                <div class="form-group">
                                    <label for="barang_bukti">Barang Bukti</label>
                                    <input type="text" class="form-control" id="barang_bukti" name="barang_bukti"
                                        required>
                                </div>
                                <hr>
                                <h6>Proses Penanganan Perkara</h6>
                                <div class="form-group">
                                    <label for="lidik">Lidik</label>
                                    <select class="form-control" id="lidik" name="lidik" required>
                                        <option value="Iya">Iya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sidik">Sidik</label>
                                    <select class="form-control" id="sidik" name="sidik" required>
                                        <option value="Iya">Iya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sp3">SP3</label>
                                    <select class="form-control" id="sp3" name="sp3" required>
                                        <option value="Iya">Iya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="p21">P21</label>
                                    <select class="form-control" id="p21" name="p21" required>
                                        <option value="Iya">Iya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vonis">Vonis</label>
                                    <select class="form-control" id="vonis" name="vonis" required>
                                        <option value="Iya">Iya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
        var satuanKerja = document.forms["permasalahan-form"]["satker_id"].value;
        var uraianKasus = document.forms["permasalahan-form"]["uraian_kasus"].value;
        var tersangka = document.forms["permasalahan-form"]["tersangka"].value;
        var barangBukti = document.forms["permasalahan-form"]["barang_bukti"].value;

        if (satuanKerja == "" || uraianKasus == "" || tersangka == "" || barangBukti == "") {
            showValidationMessage(); // Menampilkan pesan pemberitahuan jika ada input yang kosong
            return false;
        }

        hideValidationMessage(); // Menyembunyikan pesan pemberitahuan jika semua input telah diisi
        return true;
    }

    // Tambahkan event listener untuk validasi sebelum mengirimkan formulir
    document.getElementById("permasalahan-form").addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Mencegah pengiriman formulir jika validasi gagal
        }
    });
</script>
@endpush