@extends('layouts.master')
@section('css')
<!-- Dropzone css -->
<link href="{{asset('template/assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('template/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
<link href="{{ asset('template/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
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
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Data Usulan Satya Lancana
                            <button type="button" class="btn btn-primary mb-2  float-right btn-sm"
                                id="tombol-tambah">
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
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Masa Kerja</th>
                                            <th>SKLS</th>
                                            <th>OPD</th>
                                            <th>Status Verifikasi</th>
                                            <th>Keterangan</th>
                                            {{-- <th>User Input</th>
                                            <th>User Edit</th> --}}
                                            <th>Aksi</th>
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

                    <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Periode</label>
                                <div class="col-sm-10">
                                    <label for="example-text-input" class="col-form-label">April 2022</label>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"  data-parsley-type="number" placeholder="199906042002124004" data-parsley-maxlength="18" data-parsley-minlength="6"  name="nip" id="nip" required>
                                    {{-- <ul class="parsley-errors-list filled" ><li class="parsley-required error" id="nip-error"></li></ul> --}}
                                    {{-- <p id="nip-error" class="error"></p> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="nama" placeholder="Febri Mubarok, S.Kom" id="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pangkat</label>
                                <div class="col-sm-10">
                                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:35px;" name="pangkat" id="pangkat" required>
                                        <option value="">-pilih-</option>
                                        <option value="Juru Muda (I/A)">Juru Muda &nbsp; - &nbsp; (I/A)</option>
                                        <option value="Juru Muda TK.I (I/B)">Juru Muda TK.I &nbsp; - &nbsp; (I/B)</option>
                                        <option value="Juru  (I/C)">Juru &nbsp; - &nbsp; (I/C)</option>
                                        <option value="Juru TK.I (I/D)">Juru TK.I &nbsp; - &nbsp;  (I/D)</option>
                                        <option value="Pengatur Muda (II/A)">Pengatur Muda &nbsp; - &nbsp; (II/A)</option>
                                        <option value="Pengatur Muda TK.I (II/B)">Pengatur Muda TK.I &nbsp; - &nbsp; (II/B)</option>
                                        <option value="Pengatur (II/C)">Pengatur &nbsp; - &nbsp; (II/C)</option>
                                        <option value="Pengatur TK.I (II/D)">Pengatur TK.I &nbsp; - &nbsp; (II/D)</option>
                                        <option value="Penata Muda (III/A)">Penata Muda &nbsp; - &nbsp; (III/A)</option>
                                        <option value="Penata Muda TK.I (III/B)">Penata Muda TK.I &nbsp; - &nbsp; (III/B)</option>
                                        <option value="Penata (III/C)">Penata &nbsp; - &nbsp; (III/C)</option>
                                        <option value="Penata TK.I (III/D)">Penata TK.I &nbsp; - &nbsp; (III/D)</option>
                                        <option value="Pembina (IV/A)">Pembina &nbsp; - &nbsp; (IV/A)</option>
                                        <option value="Pembina TK.I (IV/B)">Pembina TK.I &nbsp; - &nbsp; (IV/B)</option>
                                        <option value="Pembina Muda (IV/C)">Pembina Muda &nbsp; - &nbsp; (IV/C)</option>
                                        <option value="Pembina Madya (IV/D)">Pembina Madya &nbsp; - &nbsp; (IV/D)</option>
                                        <option value="Pembina Utama (IV/E)">Pembina Utama &nbsp; - &nbsp; (IV/E)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">OPD</label>
                                <div class="col-sm-10">
                                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:35px;" name="opd_id" id="opd_id" required>
                                        <option value="">-pilih-</option>
                                        @foreach ($opd as $row1)
                                        <option value="{{ $row1->id }}">{{ $row1->namaopd }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <textarea id="textarea" name="jabatan" id="jabatan" required class="form-control" maxlength="225" rows="3" placeholder="Kasi Perlindungan Khusus Anak Dinas Pemberdayaan Masyarakat, Perempuan dan Perlindungan Anak Kota Jambi"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Masa Kerja</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="masakerja" placeholder="25" id="masakerja" required data-parsley-maxlength="2" data-parsley-type="number">
                                    <small class="form-text text-muted" style="color: red;font-style:italic;">note : format .. Tahun</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Upload File</label>
                                <div class="col-sm-10">
                                    <input type="file" id="input-file-now" name="filesatya" class="dropify" onchange="Filevalidation()" required />
                                    <small class="form-text text-muted" style="color: red;font-style:italic;">note : file harus PDF dan tidak lebih dari 1000kb / 1mb</small>

                                    <p id="size"></p>

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
<script src="{{asset('template/assets/plugins/dropzone/dist/dropzone.js')}}"></script>
        <script src="{{asset('template/assets/plugins/dropify/js/dropify.min.js')}}"></script>
        <!-- Parsley js -->
        <script type="text/javascript" src="{{ asset('template/assets/plugins/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('template/assets/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
<script>
    Filevalidation = () => {
        const fi = document.getElementById('input-file-now');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1000) {
                    alertify.error('Data tidak boleh lebih dari 1000kb / 1mb')
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';

                      $("#tombol-simpan").attr("disabled",true);
                } else if (file < 100) {
                    alertify.error('Data tidak boleh kurang dari 100kb')
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';


                      $("#tombol-simpan").attr("disabled",true);
                } else {
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';
                    $("#tombol-simpan").attr("disabled",false);
                }
            }
        }
    }

    $(document).ready(function () {
        $("#pangkat").select2({
           width: '100%'
       });
        $("#opd_id").select2({
           width: '100%'
       });


        $('form').parsley();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#datatable1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('satyalancana.index') }}",
            columns: [{
                    data: null,
                    sortable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    },
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data:'jabatan',
                    name:'jabatan'
                },
                {
                    data:'masakerja',
                    name:'masakerja'
                },
                {
                    data:'skls',
                    name:'skls'
                },
                {
                    data:'opd',
                    name:'opd'
                },
                {
                    data:'status',
                    name:'status'
                },
                {
                    data:'keterangan',
                    name:'keterangan'
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
            $('#modal-judul').html("Tambah Data Satya Lancana"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show');
            // console.log('sukses');
        });

        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({

                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    // console.log('ok');
                    var form = $("#form-tambah-edit")[0];
                    // Create an FormData object
                    var data = new FormData(form);
                    $.ajax({
                        type: "POST",
                        enctype: "multipart/form-data",
                        url: "{{ route('satyalancana.store') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function (data) { //jika berhasil
                            console.log(data);
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#opd_id').val('').change();
                            $('#pangkat').val('').change();
                            $('#input-file-now').val('').change();
                            document.getElementById('size').innerHTML = '<b>0</b> KB';

                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#datatable1')
                                .dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            if(data=='berhasil'){
                                alertify.success('Data Berhasil Dibuat');

                            }else if(data=='gagal'){

                                alertify.success(data);
                            }

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
            alertify.confirm('Data SatyaLancana ini akan dihapus, Apa anda yakin ?', function () {
                $.ajax({

                    url: "satyalancana/" + dataid, //eksekusi ajax ke url ini
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

            $.get('satyalancana/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit OPD");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                $('#id').val(data.id);
                $('#namaopd').val(data.namaopd);

            })
        });






        // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
    });
</script>
@endsection
