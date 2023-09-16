@extends('admin.layouts.app')

@section('title', 'Data Desa')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
<!-- END PAGE LEVEL CUSTOM STYLES -->
@endpush

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row py-2 m-auto">
                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                    <h4>Data Desa</h4>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 col-6 text-right m-auto">
                    <a href="{{ route('desa.create') }}" class="btn btn-outline-primary btn-sm">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area br-6">
            <table id="zero-config" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Desa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($desa as $dataDesa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dataDesa->desa }}</td>
                        <td>
                            <a href="{{ route('desa.edit', $dataDesa->id) }}"
                                class="btn btn-outline-warning btn-sm">Edit</a>
                            <form action="{{ route('desa.destroy', $dataDesa->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Yakin untuk menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
<script>
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            // ... Konfigurasi bahasa
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
</script>
@endpush