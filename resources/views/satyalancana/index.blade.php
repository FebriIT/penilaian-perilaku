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
                    {{-- <h4 class="page-title">Satyalancana Karya Satya</h4> --}}
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Data Usulan Satya Lancana</h4>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable2" class="table table-striped table-bordered table-sm text-center" style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama <br> Nip <br> Pangkat/Gol.Ruang</th>
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
                                        @foreach ($data as $key=>$row)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $row->nama }} <br>
                                                NIP.{{ $row->nip }} <br>
                                                {{ $row->pangkat }}</td>
                                            <td>{{ $row->jabatan }}</td>
                                            <td>{{ $row->masakerja }} Thn</td>
                                            <td>{{$row->skls}}</td>
                                            @if ($row->status_verifikasi==1)
                                                <td style="background: blue;color:white;"><b>Sedang Di Proses</b></td>
                                            @elseif ($row->status_verifikasi==2)
                                                <td style="background: rgb(0, 245, 0);color:white;"><b>Data Sudah Lengkap</b></td>
                                            @elseif ($row->status_verifikasi==3)
                                                <td style="background: rgb(245, 0, 0);color:white;"><b>Data Belum Lengkap</b></td>

                                            @endif
                                            <td>{{ $row->keterangan }}</td>
                                            @php
                                                $user_input=\App\Models\User::find($row->user_input)->name;
                                                $user_edit=\App\Models\User::find($row->user_edit)->name;

                                            @endphp
                                            <td>{{ $user_input }} {{ $row->created_at }}</td>
                                            <td>{{ $user_edit }} {{ $row->updated_at }}</td>
                                            <td style="white-space: nowrap; width: 15%;">
                                                <div class="tabledit-toolbar btn-toolbar" style="text-align: center;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <a href="#" class="tabledit-edit-button btn btn-sm btn-warning" id="alertify-success" style="float: none; margin: 5px;">
                                                            <span class="ti-pencil"></span>
                                                        </a>
                                                        <a href="/{{ auth()->user()->role }}/satyalancana/{{ $row->id }}/hapus" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;">
                                                            <span class="ti-trash"></span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach


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
