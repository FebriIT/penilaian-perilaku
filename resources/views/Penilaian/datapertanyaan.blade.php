@extends('layouts.master')
@section('css')
<!-- Dropzone css -->

<link href="{{ asset('template/assets/plugins/timepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet" />
        <link href="{{ asset('template/assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('template/assets/plugins/clockpicker/jquery-clockpicker.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('template/assets/plugins/colorpicker/asColorPicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('template/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('template/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
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




        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title"> 
                            <a href="#" onclick="history.go(-1)" class="btn btn-primary btn-sm">
                                <span class="ti-arrow-circle-left"></span>
                            </a>
                            Data Pertanyaan
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                      <td>
                                        <p style="font-size: 13px;text-align: justify;vertical-align: middle;">
                                            NIP yang dinilai = {{ $nipygdinilai1 }} <br>
                                            NIP Penilai = {{ $nipenilai1 }} <br>
                                            Jumlah Pertanyaan = {{ $jumlahpertanyaan }} <br>
                                            Skor = {{ $jawaban }} <br>
                                            Max Skor = {{ $jumlahpertanyaan*3 }} <br>
                                            Keterangan = 
                                            @if($jawaban<=25)<b style="color:red">Kurang Dari Ekspetasi</b>  
                                            @elseif($jawaban<=49) <b style="color:green">Sesuai Ekspetasi </b> 
                                            @elseif ($jawaban<=63) <b style="color:blue;">Melebihi Ekspetasi </b> 
                                            @else Data Tidak Ditemukan @endif 

                                            {{--  Keterangan = @if($jawaban<=25) Kurang Dari Ekspetasi @elseif($jawaban<=49) Sesuai Ekspetasi @elseif ($jawaban<=63) Melebihi Ekspetasi @else Data Tidak Ditemukan @endif  --}}
                                        </p>
                                      </td>
                                    </tr>
                                   
                                  </table>
                            </div>
                        </div>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table  class="table table-striped table-bordered table-sm text-center"
                                    style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key=>$row)
                                            
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            @php
                                                $pertanyaan=App\Models\Pertanyaan::find($row->id_pertanyaan)->text_pertanyaan;
                                            @endphp
                                            <td>{{ $pertanyaan }}</td>
                                            @if($row->jawaban==3)
                                            <td bgcolor="blue" style="color: white;"><b>Melebihi Ekspetasi</b> </td>
                                            @elseif($row->jawaban==2)
                                            <td bgcolor="green" style="color: white;"><b>Sesuai Ekspetasi</b> </td>
                                            {{--  <td>Sesuai Ekspetasi</td>  --}}
                                            
                                            @elseif($row->jawaban==1)
                                            <td bgcolor="red" style="color: white;"><b>Kurang Dari Ekspetasi</b> </td>
                                            {{--  <td>Kurang Dari Ekspetasi</td>  --}}
                                            @endif
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
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
{{-- <script src="{{ asset('template/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script> --}}

  <!-- Plugins js -->
        <script src="{{ asset('template/assets/plugins/timepicker/moment.js') }}"></script>
        <script src="{{ asset('template/assets/plugins/timepicker/tempusdominus-bootstrap-4.js') }}"></script>
        <script src="{{ asset('template/assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
        <script src="{{ asset('template/assets/plugins/clockpicker/jquery-clockpicker.min.js') }}"></script>
        <script src="{{ asset('template/assets/plugins/colorpicker/jquery-asColor.js') }}" type="text/javascript"></script>
        <script src="{{ asset('template/assets/plugins/colorpicker/jquery-asGradient.js') }}" type="text/javascript"></script>
        <script src="{{ asset('template/assets/plugins/colorpicker/jquery-asColorPicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('template/assets/plugins/select2/select2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('template/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('template/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('template/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('template/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>

         <!-- Plugins Init js -->
        <script src="{{ asset('template/assets/pages/form-advanced.js') }}"></script>

        <!-- App js -->
        {{-- <script src="assets/js/app.js"></script> --}}
        <script>
            $('#datatable1').DataTable();
        </script>
@endsection
