@extends('layouts.master')

@section('content')


<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    {{--  <marquee style="color: red;">Mohon maaf website sedang maintenance</marquee>  --}}

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
                                    <h5 class="mt-0 round-inner">{{ $dataygmenilai }}</h5>
                                    <p class="mb-0 text-muted">Jumlah yang Dinilai</p>
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
                                    <h5 class="mt-0 round-inner">{{ $datapenilai }}</h5>
                                    <p class="mb-0 text-muted">Jumlah Penilai</p>
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
                                    <h5 class="mt-0 round-inner">{{ $datapertanyaan }}</h5>
                                    <p class="mb-0 text-muted">Jumlah Pertanyaan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Column -->
        </div>
        @endif


        {{--  <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Skor Tertinggi

                        </h4>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable2" class="table table-striped table-bordered table-sm text-center"
                                    style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Unit Kerja</th>
                                            <th>Nilai</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                     

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>   --}}

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
