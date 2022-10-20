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

                        <h4 class="mt-0 header-title">Data User
                            {{--  <button type="button" class="btn btn-primary mb-2  float-right btn-sm" id="tombol-tambah">
                                Tambah Data
                            </button>  --}}
                        </h4>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable1" class="table table-striped table-bordered table-sm text-center"
                                    style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            {{--  <th>Action</th>  --}}
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
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

                                    <td style="white-space: nowrap; width: 15%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: center;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="/{{ auth()->user()->role }}/satyalancana/download/{{ $row->id }}"
                                                    class="tabledit-edit-button btn btn-sm btn-primary"
                                                    style="float: none; margin: 5px;">
                                                    <span class="ti-download"></span>
                                                </a>
                                                <a href="#" class="tabledit-edit-button btn btn-sm btn-warning"
                                                    id="alertify-success" style="float: none; margin: 5px;">
                                                    <span class="ti-pencil"></span>
                                                </a>
                                                <a href="/{{ auth()->user()->role }}/satyalancana/{{ $row->id }}/hapus"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="tabledit-delete-button btn btn-sm btn-danger"
                                                    style="float: none; margin: 5px;">
                                                    <span class="ti-trash"></span>
                                                </a>
                                            </div>

                                        </div>
                                    </td>
                                    </tr>
                                    @endforeach


                                    </tbody> --}}
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
                    <div class="form-group">
                        <h6 class="text-muted fw-400">Judul</h6>
                        <div>
                            <div class="input-group">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title.." required>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Date Start</h6>
                        <input type="date" class="form-control" name="start" id="start">

                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400 mt-3">Date End</h6>
                        <input type="date" class="form-control" name="end" id="end">
                    </div>
                    <div class="form-group">
                        <h6 class="text-muted fw-400">Status</h6>
                        <select class=" form-control mb-3 custom-select" name="status" id="statuss" style="width: 100%; height:36px;">
                            <option value="">-pilih-</option>
                            <option value="1">Open</option>
                            <option value="0">Close</option>
                        </select>
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
            deferRender: true,
            ajax: "{{ url('/'.auth()->user()->role.'/datauser') }}",
            columns: [

                {
                    data: 'nipbaru',
                    name: 'nipbaru'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
            ],
            order: [
                [1, "asc"]
            ]

        });




        // tombol tambah data
        $('#tombol-tambah').click(function () {
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Jadwal Usulan"); //valuenya tambah pegawai baru
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
                        url: "{{ url('/admin/periode') }}", //url simpan data
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
            alertify.confirm('Seluruh data yang berkaitan di periode ini akan ikut terhapus, apa anda yakin ?', function () {
                $.ajax({

                    url: "/{{ auth()->user()->role }}/periode/" +dataid, //eksekusi ajax ke url ini
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

            $.get('periode/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Periode");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                $('#id').val(data.id);
                $('#title').val(data.title);
                $('#start').val(data.start);
                $('#end').val(data.end);
                $('#statuss').val(data.status).change();

            })
        });







    });
</script>
@endsection
