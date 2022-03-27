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

                        <h4 class="mt-0 header-title">Organisasi Perangkat Daerah
                            <button type="button" class="btn btn-primary mb-2 btn-animation  float-right btn-sm" data-animation="jello"
                                id="tombol-tambah">
                                Tambah Data
                            </button></h4>


                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable1" class="table table-striped table-bordered table-sm text-center"
                                    style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;">No</th>
                                            <th>Nama OPD</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($data as $key=>$row)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                    <td>{{ $row->namaopd }}</td>

                                    <td style="white-space: nowrap; width: 15%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: center;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="#" class="tabledit-edit-button btn btn-sm btn-warning"
                                                    id="alertify-success" style="float: none; margin: 5px;">
                                                    <span class="ti-pencil"></span>
                                                </a>
                                                <a href="/{{ auth()->user()->role }}/opd/{{ $row->id }}/destroy"
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
    <div class="modal-dialog " role="document">
        <div class="modal-content  card-success">
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
                        <label>Nama OPD</label>
                        <input type="text" name="namaopd" id="namaopd" class="form-control" required>
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
        <!-- Parsley js -->
        <script type="text/javascript" src="{{ asset('template/assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script>
    $('.btn-animation').on('click', function(br) {
            //adding animation
            $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + $(this).data("animation") + '  animated');
            });
            $('form').parsley();
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#datatable1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('opd.index') }}",
            columns: [{
                    data: null,
                    sortable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    },
                },
                {
                    data: 'namaopd',
                    name: 'namaopd'
                },
                {
                    data: 'action',
                    name: 'action'
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
            $('#modal-judul').html("Tambah OPD Baru"); //valuenya tambah pegawai baru
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
                        url: "{{ route('opd.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json',
                        success: function (data) { //jika berhasil
                            console.log('ok');
                            $('#form-tambah-edit').trigger("reset"); //form reset
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
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            // alert(data_id);

            $.get('opd/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit OPD");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                $('#id').val(data.id);
                $('#namaopd').val(data.namaopd);

            })
        });

        $('body').on('click', '.delete', function (id) {
            var dataid = $(this).attr('data-id');
            // alert(dataid);
            alertify.confirm('Data Satya yg berkaitan dengan OPD ini akan ikut terhapus dihapus, apakah anda yakin ?', function () {
                $.ajax({

                    url: "opd/" + dataid, //eksekusi ajax ke url ini
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




    });
</script>


@endsection
