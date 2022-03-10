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

                        <h4 class="mt-0 header-title">Organisasi Perangkat Daerah <button type="button" class="btn btn-primary mb-2 btn-animation  float-right btn-sm" data-animation="rollIn" data-toggle="modal" data-target="#exampleModalLong-1">
                            Tambah Data
                        </button></h4>


                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable2" class="table table-striped table-bordered table-sm text-center" style="font-size: 13px" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;">No</th>
                                            <th>Nama OPD</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key=>$row)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $row->namaopd }}</td>

                                            <td style="white-space: nowrap; width: 15%;">
                                                <div class="tabledit-toolbar btn-toolbar" style="text-align: center;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <a href="#" class="tabledit-edit-button btn btn-sm btn-warning" id="alertify-success" style="float: none; margin: 5px;">
                                                            <span class="ti-pencil"></span>
                                                        </a>
                                                        <a href="/{{ auth()->user()->role }}/opd/{{ $row->id }}/destroy" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;">
                                                            <span class="ti-trash"></span>
                                                        </a>
                                                    </div>

                                                </div>
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

 <!-- Modal -->
 <div class="modal fade" id="exampleModalLong-1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle-1">Card Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/{{auth()->user()->role}}/opd/post"  method="POST">
                @csrf
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama OPD</label>
                    <input type="text" name="namaopd" class="form-control" required>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('javascript')
<script>

alertify('this is a standard alert (shows black)');
    $('.btn-animation').on('click', function(br) {
   //adding animation
        $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + $(this).data("animation") + '  animated');
    });

</script>
@endsection
