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

                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-6 col-form-label">Periode
                                        Pengusulan</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" data-parsley-type="number"
                                            data-parsley-maxlength="18" data-parsley-minlength="6" disabled
                                            value="{{ $dataperiode->title }}">
                                        {{-- <ul class="parsley-errors-list filled" ><li class="parsley-required error" id="nip-error"></li></ul> --}}
                                        {{-- <p id="nip-error" class="error"></p> --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-6 col-form-label">Tanggal
                                        Mulai</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" data-parsley-type="number"
                                            placeholder="199906042002124004" data-parsley-maxlength="18"
                                            data-parsley-minlength="6" disabled
                                            value="{{ $dataperiode->start->format('d-M-Y') }}">
                                        {{-- <ul class="parsley-errors-list filled" ><li class="parsley-required error" id="nip-error"></li></ul> --}}
                                        {{-- <p id="nip-error" class="error"></p> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-6 col-form-label">Tanggal
                                        Berakhir</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" data-parsley-type="number"
                                            placeholder="199906042002124004" data-parsley-maxlength="18"
                                            data-parsley-minlength="6" disabled
                                            value="{{ $dataperiode->end->format('d-M-Y') }}">
                                        {{-- <ul class="parsley-errors-list filled" ><li class="parsley-required error" id="nip-error"></li></ul> --}}
                                        {{-- <p id="nip-error" class="error"></p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-6 col-form-label">Petunjuk
                                        Penginputan</label>
                                    <div class="col-sm-6">
                                        <a href="#">download <i class="fa fa-download fa-lg mt-3"></i></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-6 col-form-label">Contoh File
                                        Usulan</label>
                                    <div class="col-sm-6">
                                        <a href="#">download <i class="fa fa-download fa-lg mt-3"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Data Usulan Satya Lancana
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
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Masa Kerja</th>
                                            <th>SKLS</th>
                                            <th>OPD</th>
                                            <th>Status Verifikasi</th>
                                            <th>Keterangan</th>
                                            <th>Created At</th>
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
            <form class="needs-validation" id="form-tambah-edit" name="form-tambah-edit" style="font-size: 13px">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="periode_id" id="periode_id" value="{{ $dataperiode->id }}">



                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="text" data-parsley-type="number" placeholder="NIP"
                                data-parsley-maxlength="18" data-parsley-minlength="6" name="nip" id="nip"
                                value="{{ old('nip') }}" required>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-3">
                            <input class="form-control" value="{{ old('gl_dpn') }}" type="text" name="gl_dpn" placeholder="Gelar Depan" id="gl_dpn"
                                >
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama" id="nama" required>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="gl_blk" value="{{ old('gl_blk') }}" placeholder="Gelar Belakang" id="gl_blk"
                                >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text"
                                placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="example-text-input" class="col-form-label" >Tanggal Lahir</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" id="tgl_lahir" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 my-1 control-label">Jenis Kelamin</label>
                        <div class="col-md-4">
                            <div class="form-check-inline my-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="Laki-Laki" name="jk" value='Laki-Laki' @if(old('jk')=='Laki-Laki') checked @endif
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="Laki-Laki">Laki-Laki</label>
                                </div>
                            </div>
                            <div class="form-check-inline my-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="Perempuan" name="jk" value='Perempuan' @if(old('jk')=='Perempuan') checked @endif
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="Perempuan">Perempuan</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <label class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
                                <div class="col-sm-8">
                                    <select class="form-control mb-3 custom-select"
                                        style="width: 100%; height:35px;" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                        <option value="">-- Pilih Pendidikan --</option>
                                        <option @if(old('pendidikan_terakhir')=='S3') selected @endif value="S3">S3</option>
                                        <option @if(old('pendidikan_terakhir')=='S2') selected @endif value="S2">S2</option>
                                        <option @if(old('pendidikan_terakhir')=='S1') selected @endif value="S1">S1</option>
                                        <option @if(old('pendidikan_terakhir')=='DIPLOMA IV') selected @endif value="DIPLOMA IV">DIPLOMA IV</option>
                                        <option @if(old('pendidikan_terakhir')=='DIPLOMA III') selected @endif value="DIPLOMA III">DIPLOMA III</option>
                                        <option @if(old('pendidikan_terakhir')=='DIPLOMA II') selected @endif value="DIPLOMA II">DIPLOMA II</option>
                                        <option @if(old('pendidikan_terakhir')=='DIPLOMA I') selected @endif value="DIPLOMA I">DIPLOMA I</option>
                                        <option @if(old('pendidikan_terakhir')=='SLTA UMUM') selected @endif value="SLTA UMUM">SLTA</option>
                                        <option @if(old('pendidikan_terakhir')=='SLTP UMUM') selected @endif value="SLTP UMUM">SLTP</option>
                                        <option @if(old('pendidikan_terakhir')=='SD') selected @endif value="SD">SD</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nomor SK CPNS</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text"
                                placeholder="Nomor SK CPNS" name="no_sk_cpns" id="no_sk_cpns" value="{{ old('no_sk_cpns') }}" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="example-text-input" class="col-form-label">TMT CPNS</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" name="tmt_cpns" id="tmt_cpns"  value="{{ old('tmt_cpns') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gol Ruang</label>
                        <div class="col-sm-4">
                            <select class="select2 form-control mb-3 custom-select" name="gol_ruang" id="gol_ruang" required>
                                <option value="">-- Pilih Gol Ruang --</option>
                                <option @if(old('gol_ruang')=='Juru Muda (I/a)') selected @endif value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                                <option @if(old('gol_ruang')=='Juru Muda Tingkat I (I/b)') selected @endif value="Juru Muda Tingkat I (I/b)">Juru Muda Tingkat I (I/b)</option>
                                <option @if(old('gol_ruang')=='Juru (I/c)') selected @endif value="Juru (I/c)">Juru (I/c)</option>
                                <option @if(old('gol_ruang')=='Juru Tingkat I (I/d)') selected @endif value="Juru Tingkat I (I/d)">Juru Tingkat I (I/d)</option>
                                <option @if(old('gol_ruang')=='Pengatur Muda (II/a)') selected @endif value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                                <option @if(old('gol_ruang')=='Pengatur Muda Tk.I (II/b)') selected @endif value="Pengatur Muda Tk.I (II/b)">Pengatur Muda Tk.I (II/b)</option>
                                <option @if(old('gol_ruang')=='Pengatur (II/c)') selected @endif value="Pengatur (II/c)">Pengatur (II/c)</option>
                                <option @if(old('gol_ruang')=='Pengatur Tk.I (II/d)') selected @endif value="Pengatur Tk.I (II/d)">Pengatur Tk.I (II/d)</option>
                                <option @if(old('gol_ruang')=='Penata Muda (III/a)') selected @endif value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                                <option @if(old('gol_ruang')=='Penata Muda Tk.I (III/b)') selected @endif value="Penata Muda Tk.I (III/b)">Penata Muda Tk.I (III/b)</option>
                                <option @if(old('gol_ruang')=='Penata (III/c)') selected @endif value="Penata (III/c)">Penata (III/c)</option>
                                <option @if(old('gol_ruang')=='Penata Tk.I (III/d)') selected @endif value="Penata Tk.I (III/d)">Penata Tk.I (III/d)</option>
                                <option @if(old('gol_ruang')=='Pembina (IV/a)') selected @endif value="Pembina (IV/a)">Pembina (IV/a)</option>
                                <option @if(old('gol_ruang')=='Pembina Tk.I (IV/b)') selected @endif value="Pembina Tk.I (IV/b)">Pembina Tk.I (IV/b)</option>
                                <option @if(old('gol_ruang')=='Pembina Utama Muda (IV/c)') selected @endif value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                                <option @if(old('gol_ruang')=='Pembina Utama Madya (IV/d)') selected @endif value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                                <option @if(old('gol_ruang')=='Pembina Utama (IV/e)') selected @endif value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="example-text-input" class="col-form-label">TMT Gol Ruang</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="DATE" name="tmt_gol_ruang" id="tmt_gol_ruang" value="{{ old('tmt_gol_ruang') }}" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">OPD</label>
                        <div class="col-sm-4">
                            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:35px;"
                                name="opd_id" id="opd_id" required>
                                <option value="">-pilih-</option>
                                @foreach ($opd as $row1)
                                <option value="{{ $row1->id }}">{{ $row1->namaopd }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                        <label class="col-form-label">Masa Kerja</label>

                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" data-parsley-type="number" name="masakerja" id="masakerja" value="{{ old('masakerja') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-5">
                            <textarea id="textarea" name="jabatan" id="jabatan" required class="form-control"
                                maxlength="225" rows="3"
                                placeholder="Jabatan">{{ old('jabatan') }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <label for="example-text-input" class="col-form-label">TMT Jabatan</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="date" name="tmt_jabatan" id="tmt_jabatan" value="{{ old('tmt_jabatan') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Upload File</label>
                        <div class="col-sm-10">
                            <input type="file" id="input-file-now" name="filesatya" class="dropify"
                                onchange="Filevalidation()" required />
                            <small class="form-text text-muted" style="color: red;font-style:italic;">note : Seluruh berkas persyaratan dibuat dalam satu format pdf dan tidak lebih dari 1000kb / 1mb</small>

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
                    document.getElementById('size').innerHTML = '<b>' +
                        file + '</b> KB';

                    $("#tombol-simpan").attr("disabled", true);
                } else if (file < 100) {
                    alertify.error('Data tidak boleh kurang dari 100kb')
                    document.getElementById('size').innerHTML = '<b>' +
                        file + '</b> KB';


                    $("#tombol-simpan").attr("disabled", true);
                } else {
                    document.getElementById('size').innerHTML = '<b>' +
                        file + '</b> KB';
                    $("#tombol-simpan").attr("disabled", false);
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

        var table = $('#datatable1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/'.auth()->user()->role.'/satyalancana') }}",
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
                    data: 'jabatan',
                    name: 'jabatan'
                },
                {
                    data: 'masakerja',
                    name: 'masakerja'
                },
                {
                    data: 'skls',
                    name: 'skls'
                },
                {
                    data: 'opd',
                    name: 'opd'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            order: [
                [8, "desc"]
            ]

        });




        // tombol tambah data
        $('#tombol-tambah').click(function () {
            $('#id').val(''); //valuenya menjadi kosong
            // $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Data Usulan"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show');
            // console.log('sukses');
        });

        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({

                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    var simpan = $('#tombol-simpan').html('Sending..');
                    var form = $("#form-tambah-edit")[0];
                    // console.log('ok');
                    // Create an FormData object
                    var data = new FormData(form);
                    $.ajax({
                        type: "POST",
                        enctype: "multipart/form-data",
                        url: "{{ url('/'.auth()->user()->role.'/satyalancana') }}",
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
                            if (data == 'berhasil') {
                                alertify.success('Data Berhasil Dibuat');

                            } else if (data == 'gagal') {

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

                    url: "/{{ auth()->user()->role }}/satyalancana/" +
                    dataid, //eksekusi ajax ke url ini
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
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
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
