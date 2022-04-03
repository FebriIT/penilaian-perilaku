@extends('layouts.master')

@section('content')


<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <marquee style="color: red;">Mohon maaf website sedang maintenance</marquee>

                    {{-- <h4 class="page-title">Dashboard</h4> --}}
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        @if (Auth::user()->role=='admin')


        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner">{{ $datasudahlengkap }}</h5>
                                    <p class="mb-0 text-muted">Data Sudah Lengkap</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-close-circle-outline"></i>
                                </div>
                            </div>
                            <div class="col-9 text-center align-self-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner">{{ $databelumlengkap }}</h5>
                                    <p class="mb-0 text-muted">Data Belum Lengkap</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-autorenew"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner">{{ $sedangdiproses }}</h5>
                                    <p class="mb-0 text-muted">Sedang Diproses</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-bookmark-outline"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner">{{ $countsatya }}</h5>
                                    <p class="mb-0 text-muted">Total Data Usulan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner">{{ $dataadmin }}</h5>
                                    <p class="mb-0 text-muted">Admin</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner">{{ $datauser }}</h5>
                                    <p class="mb-0 text-muted">User</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        @endif


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Data Usulan Satya Lancana Periode April 2022

                        </h4>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable2" class="table table-striped table-bordered table-sm text-center"
                                    style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Masa Kerja</th>
                                            <th>SKLS</th>
                                            <th>OPD</th>
                                            <th>Status Verifikasi</th>
                                            <th>Keterangan</th>
                                            <th>Created At</th>

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
                                            <td>{{ $row->opd->namaopd }}</td>
                                            @if ($row->status_verifikasi==1)
                                            <td style="background: blue;color:white;"><b>Sedang Di Proses</b></td>
                                            @elseif ($row->status_verifikasi==2)
                                            <td style="background: rgb(0, 245, 0);color:white;"><b>Data Sudah
                                                    Lengkap</b></td>
                                            @elseif ($row->status_verifikasi==3)
                                            <td style="background: rgb(245, 0, 0);color:white;"><b>Data Belum
                                                    Lengkap</b></td>

                                            @endif
                                            <td>{{ $row->keterangan }}</td>
                                            <td>{{ $row->created_at }}</td>


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
<script>
    $('#datatable2').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true,
        "paging": false
    });

</script>
@stop
