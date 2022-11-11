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

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">


                    <h3 class="text-center mt-0 m-b-15">
                        <a href="#" class="logo logo-admin"><img src="{{ asset('img/bg.png') }}" height="100" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        @php
                        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
                            $login_username=$_COOKIE['username'];
                            $login_password=$_COOKIE['password'];
                            $is_remember="checked='checked'";
                        }else{
                            $login_username='';
                            $login_password='';
                            $is_remember="";
                        }
                        @endphp
                        <form class="form-horizontal m-t-20" action="{{ route('proses_login') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="username" type="text" required="" value="{{ $login_username }}" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" required="" value="{{ $login_password }}" placeholder="Password">
                                </div>
                            </div>

                            {{--  <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ $is_remember }}>
                                        <label class="custom-control-label" for="remember">Remember me</label>
                                    </div>
                                </div>
                            </div>  --}}

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            {{--  <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="/register" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>
                                </div>
                            </div>  --}}
                        </form>
                    </div>

                </div>
            </div>
        </div>


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

        <!-- App js -->
        <script src="{{ asset('template/assets/js/app.js') }}"></script>
        <script>
        @if (Session::has('berhasil'))

        alertify.success("{{ Session::get('berhasil') }}");
        @elseif(Session::has('gagal'))
        alertify.error("{{ Session::get('gagal') }}");

        @endif

    </script>



    </body>
</html>
