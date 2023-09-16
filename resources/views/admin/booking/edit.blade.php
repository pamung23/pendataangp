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
                            <h4>Edit Desain Tapak Pemanfaatan Jasa Lingkungan Wisata Alam</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                            <form action="{{ route('desaintapak.update', $desainTapak->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Specify the method as PUT for update -->
                                <div class="form-group">
                                    <label for="no_register_kawasan">No Register Kawasan:</label>
                                    <input type="text" name="no_register_kawasan" class="form-control"
                                        value="{{ $desainTapak->no_register_kawasan }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_zona_blok_pemanfaatan">Nama Zona/Blok Pemanfaatan</label>
                                    <input type="text" name="nama_zona_blok_pemanfaatan" class="form-control"
                                        value="{{ $desainTapak->nama_zona_blok_pemanfaatan }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="luas_zona_blok_pemanfaatan">Luas Zona/Blok Pemanfaatan (Ha)</label>
                                    <input type="text" name="luas_zona_blok_pemanfaatan" class="form-control"
                                        value="{{ $desainTapak->luas_zona_blok_pemanfaatan }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="ruang_publik">Ruang Publik (Ha)</label>
                                    <input type="text" name="ruang_publik" class="form-control"
                                        value="{{ $desainTapak->ruang_publik }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="ruang_usaha">Ruang Usaha (Ha)</label>
                                    <input type="text" name="ruang_usaha" class="form-control"
                                        value="{{ $desainTapak->ruang_usaha }}" required>
                                </div>
                                <div class="form-group">
                                    <hr style="border: 2px solid #333;">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan (Opsional):</label>
                                    <input type="text" name="keterangan" class="form-control"
                                        value="{{ $desainTapak->keterangan }}" placeholder="Keterangan (opsional)">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
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