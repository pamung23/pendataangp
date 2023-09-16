@extends('admin.layouts.app')

@section('title', 'Tambah Data Tenaga Pengamanan')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
<link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endpush

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h3>Triwulan {{ $triwulan }}</h3>
                    <h4>Tambah Data Tenaga Pengamanan Hutan pada Kawasan Konservasi</h4>
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

                    <form action="{{ route('tenaga_pengamanan_hutan.store', ['triwulan' => $triwulan]) }}" method="POST"
                        id="tenaga-pengamanan-hutan-form">
                        @csrf
                        <input type="hidden" name="triwulan" value="{{ $triwulan }}">
                        <div class="form-group">
                            <label for="polhut">Polhut (Orang)</label>
                            <input type="number" class="form-control" id="polhut" name="polhut" required>
                        </div>
                        <div class="form-group">
                            <label for="ppns">PPNS (Orang)</label>
                            <input type="number" class="form-control" id="ppns" name="ppns" required>
                        </div>
                        <div class="form-group">
                            <label for="tphl">TPHL (Orang)</label>
                            <input type="number" class="form-control" id="tphl" name="tphl" required>
                        </div>
                        <div class="form-group">
                            <label for="mmp">MMP (Orang)</label>
                            <input type="number" class="form-control" id="mmp" name="mmp" required>
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
        var polhut = document.forms["tenaga-pengamanan-hutan-form"]["polhut"].value;
        var ppns = document.forms["tenaga-pengamanan-hutan-form"]["ppns"].value;
        var tphl = document.forms["tenaga-pengamanan-hutan-form"]["tphl"].value;
        var mmp = document.forms["tenaga-pengamanan-hutan-form"]["mmp"].value;

        if (polhut == "" || ppns == "" || tphl == "" || mmp == "" ) {
            showValidationMessage(); // Menampilkan pesan pemberitahuan jika ada input yang kosong
            return false;
        }

        hideValidationMessage(); // Menyembunyikan pesan pemberitahuan jika semua input telah diisi
        return true;
    }

    // Tambahkan event listener untuk validasi sebelum mengirimkan formulir
    document.getElementById("tenaga-pengamanan-hutan-form").addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Mencegah pengiriman formulir jika validasi gagal
        }
    });
</script>
@endpush