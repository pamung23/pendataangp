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
                            <h3>Edit Permasalahan Kawasan Konservasi</h3>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                            <form
                                action="{{ route('permasalahankawasan.update', ['triwulan' => $triwulan, 'id' => $data->id]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="triwulan" value="{{ $triwulan }}">
                                <div class="form-group">
                                    <label for="no_register_kawasan">No Register Kawasan:</label>
                                    <input type="text" name="no_register_kawasan" class="form-control"
                                        placeholder="No Register Kawasan" value="{{ $data->no_register_kawasan }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_permasalahan">Jenis Permasalahan:</label>
                                    <input type="text" name="jenis_permasalahan" class="form-control"
                                        placeholder="Jenis Permasalahan" value="{{ $data->jenis_permasalahan }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian_permasalahan">Uraian Permasalahan:</label>
                                    <textarea name="uraian_permasalahan" class="form-control" rows="3"
                                        required>{{ $data->uraian_permasalahan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="progres_penyelesaian">Progres Penyelesaian:</label>
                                    <input type="text" name="progres_penyelesaian" class="form-control"
                                        placeholder="Progres Penyelesaian" value="{{ $data->progres_penyelesaian }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <textarea name="keterangan" class="form-control"
                                        rows="3">{{ $data->keterangan }}</textarea>
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