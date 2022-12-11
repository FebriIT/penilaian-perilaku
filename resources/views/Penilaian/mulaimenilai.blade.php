<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Penilaian Perilaku Pegawai</title>
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
                                <a href="#" onclick="history.go(-1)" class="btn btn-primary btn-sm">
                                    <span class="ti-arrow-circle-left"></span>
                                </a>
                                 Penilaian "{{ $data->nama }}"

                            </h5>
                            
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                          <td>
                                            <p style="font-size: 13px;text-align: justify;vertical-align: middle;"><b> Cara menilai pegawai : </b><br>
                                                1. Masukan NIP anda untuk mulai menilai {{ $data->nama }} <br>
                                                2. Setalah mengisi NIP Pilih tombol "Cari NIP" <br>
                                                3. Apabila data anda muncul akan ada tampilan penggisian form <br>
                                                4. Pilih Tingkat yang dinilai <br>
                                                5. Jika semua data sudah terisi semua pilih tombol simpan <br>

                                                <b> Nb : <br>
                                                    1. Pastikan penilaian anda sudah benar sebelum menglik tombol simpan <br>
                                                    2. Untuk mengecek apakah anda sudah menilai atau belum silahkan masukan kembali NIP dan klik cari NIP, jika pesan "Anda sudah menilai data ini" berarti anda sudah menilai "{{ $data->nama }}"
                                                </b>
                                            </p>
                                          </td>
                                        </tr>
                                       
                                      </table>
                                </div>
                               
                                <div class="col-6">
                                    <form action="/mulaimenilai/post" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" value="{{ $data->nipbaru }}" name="nipygdinilai" id="nipygdinilai" hidden>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">NIP</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="inputnip" name="inputnip">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"  id="inputnama" name="inputnama" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Tingkat yang dinilai</label>
                                        <div class="col-sm-9">
                                            <select class=" form-control mb-3 custom-select" name="tyDinilai" id="statuss" style="width: 100%; height:36px;" required>
                                                <option value="">-pilih-</option>
                                                <option value="3">Atasan</option>
                                                <option value="2">Sejawat</option>
                                                <option value="1">Bawahan</option>
                                            </select>
                                        </div>
                                    </div>
                                    @php
                                        $opd=App\Models\UnitKerja::where('kunker',$data->kunker)->first()->kunker;
                                    @endphp
                                    <input class="form-control" type="text"  id="unitkerja" name="unitkerja" value="{{ $opd }}" hidden>
                                    <input class="form-control" type="text"  id="namaygdinilai" name="namaygdinilai" value="{{ $data->nama }}" hidden>
                                    
                                   
                                </div>
                                <div class="col-12">
                                    <button type="button" id="tombol-carinip" class="btn btn-primary btn-block">Cari NIP</button>
                                    
                                </div>
                                <div class="col-12" style="display: none" id="form-nilai">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive b-0" data-pattern="priority-columns">
                                            <table  class="table table-striped table-bordered table-sm text-center"
                                                style="font-size: 13px" cellspacing="0" width="100%">
                                                
                                                <thead>
                                                    <tr>
                                                      <th style="width: 5%;text-align: center;">No</th>
                                                      <th style=" text-align: center;">Aspek Yang Dinilai</th>
                                                      <th style=" text-align: center;">Skor</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ( $pertanyaan as $key=>$row)
                                                        <tr>
                                                          <td style=" text-align: center;">{{ ++$key }}</td>
                                                          <td style=" text-align: center;">{{ $row->text_pertanyaan }}</td>
                                                          <td style="text-align: center;">
                                                            <div class="col-md-12">
                                                                <div class="form-check-inline my-1">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="pertanyaan1[{{ $data->nipbaru }}]-[{{ $row->id }}]" value="{{ '1'.'#'.$row->id }}" name="pilih[{{ $row->id }}]" class="custom-control-input">
                                                                        <label class="custom-control-label" for="pertanyaan1[{{ $data->nipbaru  }}]-[{{ $row->id }}]">Dibawah Ekspektasi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check-inline my-1">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="pertanyaan2[{{ $data->nipbaru }}]-[{{ $row->id }}]" value="{{ '2'.'#'.$row->id }}" name="pilih[{{ $row->id }}]" class="custom-control-input">
                                                                        <label class="custom-control-label" for="pertanyaan2[{{ $data->nipbaru  }}]-[{{ $row->id }}]">Sesuai Ekspektasi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check-inline my-1">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="pertanyaan3[{{ $data->nipbaru }}]-[{{ $row->id }}]" value="{{ '3'.'#'.$row->id }}" name="pilih[{{ $row->id }}]" class="custom-control-input">
                                                                        <label class="custom-control-label" for="pertanyaan3[{{ $data->nipbaru  }}]-[{{ $row->id }}]">Diatas Ekspektasi</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                          </td>
                                                          
                                            
                                                          
                                            
                                                        </tr>
                                                        @endforeach
                                                      
                                                    </tbody>
                                            </table>
                                            {{--  <button type="button" id="tombol-simpan" class="btn btn-primary btn-block">Simpan</button>  --}}

                                            <button onclick="return confirm('Apakah anda yakin dengan penilaian ini?')" type="submit" id="tombol-simpan" class="btn btn-primary btn-block" onClick="formSubmit()" >Simpan</button>
                                        </form>
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
                deferRender: true,
                ajax: "{{ url('/mulaimenilai') }}",
                columns: [
    
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        },
                    },
                    
                    {
                        data: 'nunker',
                        name: 'nunker'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                    
                    
                ],
                order: [
                    [0, "asc"]
                ]
    
            });

            $(function(){
                $('#tombol-carinip').on('click',function(){
                    var dnip=$('#inputnip').val();
                    var nipygdinilai=$('#nipygdinilai').val();
                    
                    $('#tombol-carinip').html('Mencari data...');
                    
                    
                    $.ajax({
                        type: "get",
                        url: "/getNip",
                        cache: false,
                        data:{
                            'dnip':dnip,
                            'nipygdinilai':nipygdinilai
                        },
                        success: function (data) {
                            
                            if(data==0){

                                $('#tombol-carinip').attr("disabled");
                                alert('NIP tidak terdaftar didatabase');
                                $('#tombol-carinip').html('Cari NIP');
                                $('#form-nilai').hide();
                                $('#inputnama').val(" ").change();
                                

                            }else if(data==1){
                                alert('Anda sudah menilai data ini');
                                $('#tombol-carinip').html('Cari NIP');

                            }else if(data==2){
                                alert('Data penilaian dan data yang dinilai tidak boleh sama');
                                $('#tombol-carinip').html('Cari NIP');
                            }
                            else{
                                
                                $('#inputnama').val(data).change();
                                alert('Silahkan mulai mengisi form, Data pribadi anda tidak akan di tampilkan saat penilaian');
                                $('#form-nilai').show();
                                $('#tombol-carinip').html('Cari NIP');
                            }
                            
                        },
                    });
                    
                });
                
                
            });
        </script>



    </body>
</html>

