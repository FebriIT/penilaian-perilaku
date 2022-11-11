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

                        <h4 class="mt-0 header-title">Kelola Pertanyaan
                            <button type="button" class="btn btn-primary mb-2  float-right btn-sm" id="tombol-tambah">
                                Tambah Data
                            </button>
                        </h4>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable1" class="table table-striped table-bordered table-sm text-center"
                                    style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->


</div> <!-- Page content Wrapper -->

<!-- Modal -->
<div class="modal fade" id="tambah-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="form-tambah-edit" name="form-tambah-edit">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    
                    <div class="form-group" >
                        <h6 class="text-muted fw-400">Pertanyaan</h6>
                        <div>
                            <div class="input-group">
                                <input type="text" class="form-control" name="text_pertanyaan" id="text_pertanyaan" placeholder="Input Pertanyaan" required>
                            </div>
                        </div>
                    </div>
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="tombol-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>




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



    $(document).ready(function () {



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#datatable1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/'.auth()->user()->role.'/pertanyaan') }}",
            columns: [

                {
                    data: null,
                    sortable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    },
                },
                
                {
                    data: 'text_pertanyaan',
                    name: 'text_pertanyaan'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ],
            order: [
                [0, "desc"]
            ]

        });




        // tombol tambah data
        $('#tombol-tambah').click(function () {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Pertanyaan"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show');
            // console.log('sukses');
        });

        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    // console.log('ok');
                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ url('/admin/pertanyaan') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json',
                        success: function (data) { //jika berhasil
                            console.log('ok');
                            $('#form-tambah-edit').trigger("reset"); //form

                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatable1')
                                .dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            // alertify.success('Data berhasil dibuat')

                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        $('body').on('click', '.delete', function (id) {
            var dataid = $(this).attr('data-id');
            // alert(dataid);
            alertify.confirm('Apakah anda yakin inggin menghapus data ini ?', function () {
                $.ajax({

                    url: "/{{ auth()->user()->role }}/pertanyaan/" +dataid, //eksekusi ajax ke url ini
                    type: 'delete',
                    success: function (data) { //jika sukses
                        setTimeout(function () {

                            var oTable = $('#datatable1').dataTable();
                            oTable.fnDraw(false); //reset datatable
                            $('#tombol-hapus').text('Yakin');
                        });

                    }
                })
                alertify.success('Data berhasil dihapus')

            }, function () {
                alertify.error('Cancel')
            });
        });
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            // alert(data_id);

            $.get('pertanyaan/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Pertanyaan");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                $('#text_pertanyaan').val(data.text_pertanyaan);
            })
        });







    });
</script>
@endsection
