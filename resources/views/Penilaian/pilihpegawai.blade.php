<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Penilaian Perilaku Pegawai - PKAP BKPSDMD Kota Jambi</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('img/bg.png') }}">

        <link href="{{ asset('template/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet" type="text/css">
           <!-- Alertify css -->
    <link href="{{ asset('template/assets/plugins/alertify/css/alertify.css') }}" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="{{asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('template/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />


    </head>


    <body class="fixed-left">
        <div class="accountbg"></div>
        <div class="contaier">
            <div class="container-fluid">
                <div style="margin-top: 15px;">

                    <div class="card">
                        
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/pilihopd" class="btn btn-primary btn-sm">
                                    <span class="ti-arrow-circle-left"></span>
                                </a>
                                {{ $namaopd }}

                            </h5>
                            
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive b-0" data-pattern="priority-columns">
                                            <table id="datatable1" class="table table-striped table-bordered table-sm text-center"
                                                style="font-size: 13px" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        {{--  <th>Jabatan</th>  --}}
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin page -->
        
        


        <!-- jQuery  -->
        <script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/detect.js') }}"></script>
        <script src="{{ asset('template/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('template/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('template/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('template/assets/js/waves.js') }}"></script>
        <script src="{{ asset('template/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('template/assets/js/jquery.scrollTo.min.js') }}"></script>

        <!-- Alertify js -->
        <script src="{{ asset('template/assets/plugins/alertify/js/alertify.js') }}"></script>
        <script src="{{ asset('template/assets/pages/alertify-init.js') }}"></script>


        <!-- Required datatable js -->
        <script src="{{asset('template/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('template/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{asset('template/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    
        <!-- Datatable init js -->
        <script src="{{asset('template/assets/pages/datatables.init.js')}}"></script>
    
        <!-- App js -->
        <script src="{{ asset('template/assets/js/app.js') }}"></script>
        <script>
            @if (Session::has('berhasil'))

            alertify.success("{{ Session::get('berhasil') }}");
            @elseif(Session::has('gagal'))
            alertify.error("{{ Session::get('gagal') }}");

            @endif
            var table = $('#datatable1').DataTable({
                processing: true,
                serverSide: true,
                "ordering": false,
                deferRender: true,
                ajax: "{{ url('/pilihpegawai/'.$ids) }}",
                columns: [
    
                    {
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
                        data: 'action',
                        name: 'action'
                    },
                    
                    
                ],

                order: [[1, 'desc']],
    
            });
        </script>



    </body>
</html>
