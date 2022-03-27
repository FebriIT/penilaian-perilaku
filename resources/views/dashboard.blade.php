@extends('layouts.master')

@section('content')


<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <marquee style="color: red;">Mohon maaf website sedang maintenance</marquee>
                    {{-- <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Annex</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div> --}}
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-webcam"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner">10</h5>
                                    <p class="mb-0 text-muted">Sudah Terverifikasi</p>
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
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-9 text-center align-self-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner">15</h5>
                                    <p class="mb-0 text-muted">Belum Diverifikasi</p>
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
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner">10</h5>
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
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner">500</h5>
                                    <p class="mb-0 text-muted">Total Data Usulan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>

    </div><!-- container -->


</div> <!-- Page content Wrapper -->
@stop
