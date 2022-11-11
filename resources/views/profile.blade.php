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
                        <h4>Change Password</h4>
                        <form action="/admin/profile/update" method="POST" enctype="multipart/form-data" class="needs-validation">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="example-password-input2" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ auth()->user()->name }}" disabled id="example-password-input2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-sm-2 col-form-label">Password Lama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="password_lama" id="example-password-input" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="password" id="example-password-input" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input1" class="col-sm-2 col-form-label">Password Confirmation</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="password_confirm" id="example-password-input1" required>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" id="tombol-simpan">Simpan</button>

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->


</div> <!-- Page content Wrapper -->





@stop

@section('javascript')
<script>
    @if (Session::has('berhasil'))

    alertify.success("{{ Session::get('berhasil') }}");
    @elseif(Session::has('gagal'))
    alertify.error("{{ Session::get('gagal') }}");

    @endif
</script>

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


    
</script>
@endsection
