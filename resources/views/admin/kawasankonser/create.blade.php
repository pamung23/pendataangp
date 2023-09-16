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
                            <h4>Data Perencanaan Pengelolaan Kawasan Konservasi</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                            <form action="{{ route('kawasankonser.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="jpan_nomor">No Rencana Jangka Panjang:</label>
                                    <input type="text" name="jpan_nomor" class="form-control"
                                        placeholder="Nomor Rencana Jangka Panjang" required>
                                </div>
                                <div class="form-group">
                                    <label for="jpan_tanggal">Tanggal Rencana Jangka Panjang:</label>
                                    <input type="date" name="jpan_tanggal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jpan_mulai">Tangga Mulai:</label>
                                    <input type="date" name="jpan_mulai" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jpan_akhir">Tanggal Berakhir:</label>
                                    <input type="date" name="jpan_akhir" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <hr style="border: 2px solid #333;">
                                </div>
                                <div class="form-group">
                                    <label for="jpen_nomor">No Rencana Jangka Pendek:</label>
                                    <input type="text" name="jpen_nomor" class="form-control"
                                        placeholder="Nomor Rencana Jangka Pendek" required>
                                </div>
                                <div class="form-group">
                                    <label for="jpen_tanggal">Tanggal Rencana Jangka Pendek:</label>
                                    <input type="date" name="jpen_tanggal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jpen_periode">Periode Rencana Jangka Pendek:</label>
                                    <input type="text" name="jpen_periode" class="form-control"
                                        placeholder="Periode Rencana Jangka Pendek" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan (Opsional):</label>
                                    <input type="text" name="keterangan" class="form-control"
                                        placeholder="Keterangan (opsional)">
                                </div>
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