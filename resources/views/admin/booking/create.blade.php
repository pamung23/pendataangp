@extends('admin.layouts.app')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
<link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Booking</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="tujuan">Tujuan:</label>
                                    <input type="text" name="tujuan" class="form-control" placeholder="Tujuan" required>
                                </div>
                                <div class="form-group">
                                    <label for="pintu_masuk">Pintu Masuk:</label>
                                    <input type="text" name="pintu_masuk" class="form-control" placeholder="Pintu Masuk"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="pintu_keluar">Pintu Keluar:</label>
                                    <input type="text" name="pintu_keluar" class="form-control"
                                        placeholder="Pintu Keluar" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk:</label>
                                    <input type="date" name="tanggal_masuk" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_keluar">Tanggal Keluar:</label>
                                    <input type="date" name="tanggal_keluar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="organisasi_nama">Nama Organisasi:</label>
                                    <input type="text" name="organisasi_nama" class="form-control"
                                        placeholder="Nama Organisasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="organisasi_alamat">Alamat Organisasi:</label>
                                    <input type="text" name="organisasi_alamat" class="form-control"
                                        placeholder="Alamat Organisasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="organisasi_telepon">Telepon Organisasi:</label>
                                    <input type="text" name="organisasi_telepon" class="form-control"
                                        placeholder="Telepon Organisasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="anggota">Anggota:</label>
                                    <input type="text" name="anggota" class="form-control" placeholder="Anggota"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="sandi">Sandi:</label>
                                    <input type="text" name="sandi" class="form-control" placeholder="Sandi" required>
                                </div>
                                <div class="form-group">
                                    <label for="pembayaran">Pembayaran:</label>
                                    <input type="text" name="pembayaran" class="form-control" placeholder="Pembayaran"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="validasi">Validasi:</label>
                                    <input type="text" name="validasi" class="form-control" placeholder="Validasi"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="kesehatan">Kesehatan:</label>
                                    <input type="text" name="kesehatan" class="form-control" placeholder="Kesehatan"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="simaksi">Simaksi:</label>
                                    <input type="text" name="simaksi" class="form-control" placeholder="Simaksi"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="agency">Agency:</label>
                                    <textarea name="agency" class="form-control" placeholder="Agency"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="flag">Flag:</label>
                                    <input type="text" name="flag" class="form-control" placeholder="Flag" required>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="batal">Batal:</label>
                                    <input type="text" name="batal" class="form-control" placeholder="Batal" required>
                                </div> --}}
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
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
@endpush