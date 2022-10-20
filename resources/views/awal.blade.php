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
                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <a href="/mulaimenilai" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Mulai Menilai</a>
                                <a href="/login" class="btn btn-secondary btn-block waves-effect waves-light" type="submit">Login Operator</a>
                            </div>
                        </div>
                        
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
