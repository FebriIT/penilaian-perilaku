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
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Upload SatyaLancana Karya Satya</h4>

                        <form action="/{{auth()->user()->role}}/inputsatyalancana/post" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Periode</label>
                                <div class="col-sm-10">
                                    <label for="example-text-input" class="col-form-label">April 2022</label>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" placeholder="199906042002124004" name="nip" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="nama" placeholder="Febri Mubarok, S.Kom" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pangkat</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="pangkat">
                                        <option>-pilih-</option>
                                        <option value="Juru Muda (I/A)">Juru Muda (I/A)</option>
                                        <option value="Juru Muda TK.I (I/B)">Juru Muda TK.I (I/B)</option>
                                        <option value="Juru  (I/C)">Juru  (I/C)</option>
                                        <option value="Juru TK.I (I/D)">Juru TK.I (I/D)</option>
                                        <option value="Pengatur Muda (II/A)">Pengatur Muda (II/A)</option>
                                        <option value="Pengatur Muda TK.I (II/B)">Pengatur Muda TK.I (II/B)</option>
                                        <option value="Pengatur (II/C)">Pengatur (II/C)</option>
                                        <option value="Pengatur TK.I (II/D)">Pengatur TK.I (II/D)</option>
                                        <option value="Penata Muda (III/A)">Penata Muda (III/A)</option>
                                        <option value="Penata Muda TK.I (III/B)">Penata Muda TK.I (III/B)</option>
                                        <option value="Penata (III/C)">Penata (III/C)</option>
                                        <option value="Penata TK.I (III/D)">Penata TK.I (III/D)</option>
                                        <option value="Pembina (IV/A)">Pembina (IV/A)</option>
                                        <option value="Pembina TK.I (IV/B)">Pembina TK.I (IV/B)</option>
                                        <option value="Pembina Muda (IV/C)">Pembina Muda (IV/C)</option>
                                        <option value="Pembina Madya (IV/D)">Pembina Madya (IV/D)</option>
                                        <option value="Pembina Utama (IV/E)">Pembina Utama (IV/E)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">OPD</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="opd_id">
                                        <option>-pilih-</option>
                                        @foreach ($opd as $row1)
                                        <option value="{{ $row1->id }}">{{ $row1->namaopd }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <textarea id="textarea" name="jabatan" class="form-control" maxlength="225" rows="3" placeholder="Kasi Perlindungan Khusus Anak Dinas Pemberdayaan Masyarakat, Perempuan dan Perlindungan Anak Kota Jambi"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Masa Kerja</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="masakerja" placeholder="25" id="example-text-input">
                                    <small class="form-text text-muted" style="color: red;font-style:italic;">note : format .. Tahun</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Upload File</label>
                                <div class="col-sm-10">
                                    <input type="file" id="input-file-now" name="filesatya" class="dropify" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light float-right">Submit</button>

                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->


</div> <!-- Page content Wrapper -->
@stop

@section('javascript')
 <!-- Dropzone js -->
        <script src="{{asset('template/assets/plugins/dropzone/dist/dropzone.js')}}"></script>
        <script src="{{asset('template/assets/plugins/dropify/js/dropify.min.js')}}"></script>
        <script>
            $(document).ready(function(){
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


