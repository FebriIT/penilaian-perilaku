@extends('layouts.master')

@section('css')
<!-- Dropzone css -->
<link href="{{asset('template/assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('template/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@endsection
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
                <div class="card m-b-30 text-white card-info">
                    <div class="card-body">
                        <blockquote class="card-bodyquote">
                            <p>Periode saat ini sudah <B>Berakhir</B>, silahkan tunggu periode berikutnya !!</p>
                            <footer>Jika ada pertanyaan silahkan hub. <cite title="Source Title">085266911477</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->


</div> <!-- Page content Wrapper -->
@stop



