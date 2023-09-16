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
                            <h4>Tambah Permasalahan Kawasan Konservasi</h4>
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
                            <form action="{{ route('permasalahankawasan.store') }}" method="POST"
                                id="permasalahan-form">
                                @csrf
                                <div class="form-group">
                                    <label for="jenis_permasalahan">Jenis Permasalahan:</label>
                                    <input type="text" name="jenis_permasalahan" class="form-control"
                                        placeholder="Jenis Permasalahan" required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian_permasalahan">Uraian Permasalahan:</label>
                                    <textarea name="uraian_permasalahan" class="form-control" rows="3"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="progres_penyelesaian">Progres Penyelesaian:</label>
                                    <input type="text" name="progres_penyelesaian" class="form-control"
                                        placeholder="Progres Penyelesaian" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <textarea name="keterangan" class="form-control" rows="3" required></textarea>
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
        var noRegisterKawasan = document.forms["permasalahan-form"]["no_register_kawasan"].value;
        var jenisPermasalahan = document.forms["permasalahan-form"]["jenis_permasalahan"].value;
        var uraianPermasalahan = document.forms["permasalahan-form"]["uraian_permasalahan"].value;
        var progresPenyelesaian = document.forms["permasalahan-form"]["progres_penyelesaian"].value;

        if (noRegisterKawasan == "" || jenisPermasalahan == "" || uraianPermasalahan == "" || progresPenyelesaian == "") {
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