@extends('admin.layouts.app')

@section('title', 'Data Mahasiswa')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
<!-- END PAGE LEVEL CUSTOM STYLES -->
@endpush
@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row py-2 m-auto">
                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                    <h4>Data Perencanaan Pengelolaan Kawasan Konservasi</h4>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 col-6 text-right m-auto">
                    <a href="{{ route('kawasankonser.create') }}" class="btn btn-outline-primary btn-sm">Tambah
                        Data</a>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area br-6">

            <table id="zero-config" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Register Kawasan Konservasi</th>
                        <th colspan="4">Rencana Pengelolaan Jangka Panjang</th>
                        <th colspan="3">Rencana Pengelolaan Jangka Pendek</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Periode (Tahun)</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($perencanaanpkk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_register_kawasan }}</td>
                        <td>{{ $item->jpan_nomor }}</td>
                        <td>{{ $item->jpan_tanggal }}</td>
                        <td>{{ $item->jpan_mulai }}</td>
                        <td>{{ $item->jpan_akhir }}</td>
                        <td>{{ $item->jpen_nomor }}</td>
                        <td>{{ $item->jpen_tanggal }}</td>
                        <td>{{ $item->jpen_periode}}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('kawasankonser.edit', $item->id) }}"
                                class="btn btn-outline-warning btn-sm">Edit</a>
                            <form action="{{ route('kawasankonser.destroy', $item->id) }}" method="POST"
                                class="d-inline">
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
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });

</script>
@endpush
<!-- test -->