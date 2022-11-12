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
                            Data pegawai yang sudah dinilai 
                           
                        </h4>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable1" class="table table-striped table-bordered table-sm text-center"
                                    style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Unit Kerja</th>
                                            <th>Atasan</th>
                                            <th>Sejawat</th>
                                            <th>Bawahan</th>
                                            <th>Hasil</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key=>$row)
                                            
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $row->nip_ygdinilai }}</td>
                                            @php
                                                $unitkerja=App\Models\UnitKerja::where('id',$row->id_unitkerja)->first()->nunker;
                                                $nama=App\Models\User2::where('nipbaru',$row->nip_ygdinilai)->first()->nama;
                                            @endphp
                                            <td>{{ $nama }}</td>
                                            <td>{{ $unitkerja }}</td>
                                            <td>{{ $row->atasan }}</td>
                                            <td>{{ $row->sejawat }}</td>
                                            <td>{{ $row->bawahan }}</td>
                                            <td>{{ $row->hasil }}</td>
                                            <td>
                                                <a href="/admin/penilaian/{{ encrypt($row->nip_ygdinilai) }}" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>
                                                <a href="/admin/penilaian/{{ encrypt($row->nip_ygdinilai) }}/hapus" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin inggin menghapus data ini?')" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>
                                                
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
        <script>
            $('#datatable1').DataTable();
        </script>

        
@endsection
