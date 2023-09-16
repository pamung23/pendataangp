@extends('admin.layouts.app')

@section('title', 'Data Booking')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">

@endpush

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row py-2 m-auto">
                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                    <h4>Booking</h4>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 col-6 text-right m-auto">
                    <a href="{{ route('booking.create') }}" class="btn btn-outline-primary btn-sm">Tambah
                        Data</a>
                </div>
            </div>
        </div>
        <div class="table-responsive" style="max-width: 100%;">
            <table id="zero-config" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Pintu Masuk</th>
                        <th>Pintu Keluar</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Organisasi Nama</th>
                        <th>Organisasi Alamat</th>
                        <th>Organisasi Telepon</th>
                        <th>Anggota</th>
                        <th>Sandi</th>
                        <th>Pembayaran</th>
                        <th>Validasi</th>
                        <th>Kesehatan</th>
                        <th>Simaksi</th>
                        <th>Last Update</th>
                        <th>Agency</th>
                        <th>Flag</th>
                        <th>Batal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->tujuan }}</td>
                        <td>{{ $booking->pintu_masuk }}</td>
                        <td>{{ $booking->pintu_keluar }}</td>
                        <td>{{ $booking->tanggal_masuk }}</td>
                        <td>{{ $booking->tanggal_keluar }}</td>
                        <td>{{ $booking->organisasi_nama }}</td>
                        <td>{{ $booking->organisasi_alamat }}</td>
                        <td>{{ $booking->organisasi_telepon }}</td>
                        <td>{{ $booking->anggota }}</td>
                        <td>{{ $booking->sandi }}</td>
                        <td>{{ $booking->pembayaran }}</td>
                        <td>{{ $booking->validasi }}</td>
                        <td>{{ $booking->kesehatan }}</td>
                        <td>{{ $booking->simaksi }}</td>
                        <td>{{ $booking->last_update }}</td>
                        <td>{{ $booking->agency }}</td>
                        <td>{{ $booking->flag }}</td>
                        <td>{{ $booking->batal }}</td>
                        <td>
                            <a href="{{ route('booking.edit', $booking->id) }}"
                                class="btn btn-outline-warning btn-sm">Edit</a>
                            <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" class="d-inline">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endpush