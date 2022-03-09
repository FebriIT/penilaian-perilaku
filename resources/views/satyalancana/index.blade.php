@extends('layouts.master')

@section('content')


<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    {{-- <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Annex</a></li>
                            <li class="breadcrumb-item active">Sart</li>
                        </ol>
                    </div> --}}
                    <h4 class="page-title">Satyalancana Karya Satya</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Buttons example</h4>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable2" class="table table-striped table-bordered table-sm text-center" style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama, Nip, Pangkat/Gol.Ruang</th>
                                            <th>Jabatan</th>
                                            <th>Masa Kerja</th>
                                            <th>SKLS</th>
                                            <th>Status Verifikasi</th>
                                            <th>Keterangan</th>
                                            <th>User Input</th>
                                            <th>User Edit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>EKAWATI, SE
                                                NIP. 196312311991022004
                                                PENATA TK.I (III/D)</td>
                                            <td>KASI PERLINDUNGAN KHUSUS ANAK DINAS PERMBERDAYAAN MASYARAKAT, PEREMPUAN DAN PERLINDUNGAN ANAK KOTA JAMBI</td>
                                            <td>31 Thn</td>
                                            <td>XXX</td>
                                            <td style="background: blue;color:white;"><b>Sudah diterima BKPSDPD</b></td>
                                            <td>PENULISAN NAMA DAN JABATAN TIDAK SESUAI PEDOMAN</td>
                                            <td>bkd_kotajambi
                                                30-12-2021 00:28:54</td>
                                            <td>bkd_kotajambi
                                                30-12-2021 00:28:54</td>
                                            <td style="white-space: nowrap; width: 15%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                <div class="btn-group btn-group-sm" style="float: none;"><button type="button" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button><button type="button" class="tabledit-delete-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-trash"></span></button></div>
                                                    <button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none; margin: 5px;">Save</button>
                                                    <button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; margin: 5px; float: none;">Confirm</button>
                                                    <button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none; margin: 5px;">Restore</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>EKAWATI, SE
                                                NIP. 196312311991022004
                                                PENATA TK.I (III/D)</td>
                                            <td>KASI PERLINDUNGAN KHUSUS ANAK DINAS PERMBERDAYAAN MASYARAKAT, PEREMPUAN DAN PERLINDUNGAN ANAK KOTA JAMBI</td>
                                            <td>31 Thn</td>
                                            <td>XXX</td>
                                            <td>Sedang Diproses</td>
                                            <td>PENULISAN NAMA DAN JABATAN TIDAK SESUAI PEDOMAN</td>
                                            <td>bkd_kotajambi
                                                30-12-2021 00:28:54</td>
                                            <td>bkd_kotajambi
                                                30-12-2021 00:28:54</td>
                                            <td style="white-space: nowrap; width: 15%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                <div class="btn-group btn-group-sm" style="float: none;"><button type="button" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button><button type="button" class="tabledit-delete-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-trash"></span></button></div>
                                                    <button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none; margin: 5px;">Save</button>
                                                    <button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; margin: 5px; float: none;">Confirm</button>
                                                    <button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none; margin: 5px;">Restore</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->


</div> <!-- Page content Wrapper -->
@stop

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable2').DataTable();
    } );
</script>
@endsection
