@extends('layouts.master')

@section('content')


<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    {{--  <marquee style="color: red;">Mohon maaf website sedang maintenance</marquee>  --}}

                    {{-- <h4 class="page-title">Dashboard</h4> --}}
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
            
                <div class="general-label">
                    <form action="/admin/pengaturan/post" class="form" role="form" method="POST">
                        {{ csrf_field() }}
    
                        <div class="form-group row">
                            <label class="col-md-3 my-1 control-label">Penilaian</label>
                            <div class="col-md-9">
                                <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio4" @if($data->status==1) checked
                                            
                                        @endif name="status" value="1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio4">Active</label>
                                    </div>
                                </div>
                                <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio5" name="status" @if($data->status==0) checked
                                            
                                        @endif value="0" class="custom-control-input">
                                        <label class="custom-control-label"  for="customRadio5">Deactive</label>
                                    </div>
                                </div>
                                        
                            </div>
    
                        </div> <!--end row-->    
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                
                            </div>
                        </div>                               
                    </form>
                </div>
            </div>
        </div>
        

    </div><!-- container -->


</div> <!-- Page content Wrapper -->
@stop

@section('javascript')
<script>
    $('#datatable2').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true,
        "paging": false
    });

</script>
@stop
