<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MNC PLAY | LEADER</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="57x57" href=" {{asset('favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href=" {{asset('favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href=" {{asset('favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href=" {{asset('favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href=" {{asset('favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href=" {{asset('favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href=" {{asset('favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href=" {{asset('favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href=" {{asset('favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href=" {{asset('favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href=" {{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href=" {{asset('favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href=" {{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href=" {{asset('favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href=" https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('css/fontawesome-iconpicker.min.css')}}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" --}}
    {{-- integrity="sha384-BVYitable.dataTable.table-striped.DTFC_Cloned tbody tr:nth-of-type(odd) {
        background: #F3F3F3;
}iSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}


</head>

<style>
    /* th, td { white-space: nowrap; }
        div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
        } */


    .dataTables_wrapper>.row>.col-sm-12 {
        padding: 0px;
        margin: 0px;
    }

    table.dataTable.table-striped.DTFC_Cloned tbody tr:nth-of-type(odd) {
        background: #F3F3F3;

    }

    table.dataTable.table-striped.DTFC_Cloned tbody tr:nth-of-type(even) {
        background: white;
    }

    a:hover {
        text-decoration: none;
    }

    body {
        background: #ddd;

    }

    .error {
        border: 1px solid red;
        border-radius: 100%;
    }

    #loading {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9998;
        background: url({{Asset('image/745.gif')}}

    ) 50% 370px no-repeat #ede9df;
    }

    #gantipassword {
        cursor: pointer;
    }

    #loading-text {
        width: 20%;
        margin-left: 520px;
        margin-top: 280px;
        position: fixed;

        left: 0px;
        top: 0px;
        z-index: 9999;

    }


    .tab-content>.tab-pane {
        display: block;
        height: 0;
        overflow: hidden;
    }

    .tab-content>.tab-pane.active {
        height: auto;
    }

    .ui-autocomplete {
        z-index: 2147483647;
    }

    .muncul {
        display: block;
    }

    .modal-form {
        max-width: 80% !important;
    }

    .ilang {
        display: none;
    }

    .error {
        color: red;
    }

    .clsDatePicker {
        z-index: 100000;
    }

    .switch-field {
        l display: flex;
        margin-bottom: 36px;
        overflow: hidden;
    }

    .switch-field input {
        position: absolute !important;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        width: 1px;
        border: 0;
        overflow: hidden;
    }

    .switch-field label {
        background-color: #ffff;
        color: rgba(0, 0, 0, 0.6);
        font-size: 14px;
        line-height: 1;
        text-align: center;
        padding: 8px 16px;
        margin-right: -1px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
        transition: all 0.1s ease-in-out;
    }

    .switch-field label:hover {
        cursor: pointer;
    }

    .switch-field input:checked+label {
        background-color: #0679FB;
        color: white;
        box-shadow: none;
    }

    .switch-field label:first-of-type {
        border-radius: 4px 0 0 4px;
    }

    .switch-field label:last-of-type {
        border-radius: 0 4px 4px 0;
    }

    .building_name:hover {
        cursor: pointer;
    }

    .table-input {
        width: 100%;
        border-collapse: collapse;
        margin: auto;
        background-color: white;
        border: 2px solid black;
        padding: 0;
    }

    .table-input td {
        width: 100%;
        position: relative;
        text-align: center;
        border: 2px solid #CED4DA;
        padding: 0;
        margin: 0;
    }

    .provider {
        width: 100%;
        border-collapse: collapse;
        margin: auto;
        background-color: white;
        border: 2px solid black;
        padding: 0;
    }

    .provider td {
        position: relative;
        text-align: center;
        border: 2px solid #CED4DA;
        padding: 0;
        margin: 0;
    }

    .provider td input {
        width: 100%
    }


    .marketing {
        width: 100%;
        border-collapse: collapse;
        margin: auto;
        background-color: white;
        border: 2px solid black;
        padding: 0;
    }

    .marketing td {
        position: relative;
        text-align: center;
        border: 2px solid #CED4DA;
        padding: 0;
        margin: 0;
    }

    .marketing td input {
        width: 100%
    }

    .marketing td input[type=text] {
        height: 43px;
    }

    /* This is just for CodePen. */

    .form {
        max-width: 600px;
        font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;
        font-weight: normal;
        line-height: 1.625;
        margin: 8px auto;
        padding: 16px;
    }

    @media screen and (min-width: 800px) {
        #rp_ilang {
            display: none;
        }
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed" style="overflow-y: hidden;">
    <img src="{{asset('/image/rsz_logo1.png')}}" alt="" id="loading-text" srcset="">
    {{-- <h1 class="text-center" style="margin-top:410px;" >Loading ..</h1> --}}
    <div id="loading">
    </div>
    <div id="app">

        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                <li class="nav-item" id="rp_ilang">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>


                <!-- SEARCH FORM -->
                @yield('navbar_chart')

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto ">
                    <!-- Messages Dropdown Menu -->



                    @yield('message')


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                    <!-- Notifications Dropdown Menu -->


                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Sidebar -->
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="default-user-image.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block text-white">{{Auth::user()->name}}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <div class="sidebar">
                    <nav>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-header">REPORT</li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.Dashboard_home')}}"
                                    class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                                    <i class="fas fa-chart-area"></i>
                                    <p>
                                        Dashboard V1
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.home')}}"
                                    class="nav-link {{ Request::is('leader') ? 'active' : '' }}">
                                    <i class="fas fa-chart-line"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.summary')}}"
                                    class="nav-link {{ Request::is('summary') ? 'active' : '' }}">
                                    {{-- <i class="fas fa-chart-pie"></i> --}}
                                    <i class="fas fa-file-alt"></i>
                                    <p>
                                        Summary
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.alert')}}"
                                    class="nav-link {{ Request::is('alert') ? 'active' : '' }}">
                                    {{-- <i class="fas fa-chart-pie"></i> --}}
                                    <i class="fas fa-exclamation-triangle"></i>
                                    <p>
                                        Alert
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.ViewProduktivitas')}}" class="nav-link {{ Request::is('produktivitas') ? 'active' : '' }}">
                                    <i class="fas fa-user-clock"></i>
                                    <p>
                                        Produktivitas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.update')}}" class="nav-link {{ Request::is('update') ? 'active' : '' }}">
                                    <i class="far fa-plus-square"></i>
                                    <p>
                                        Update
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">DATA</li>
                           
                            <li class="nav-item ">
                                <a href="{{Route('admin.database')}}"
                                    class="nav-link {{ Request::is('database') ? 'active' : '' }}">
                                    <i class="fas fa-database"></i>
                                    <p>
                                        Database
                                    </p>
                                </a>
                            </li>
                          

                            <li class="nav-item ">
                                <a href="{{Route('admin.Ready')}}"
                                    class="nav-link {{ Request::is('ready-to-sell') ? 'active' : '' }}">
                                    <i class="fas fa-check"></i>
                                    <p>
                                        Ready To Sell
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.Rev_share')}}" class="nav-link {{ Request::is('revshare') ? 'active' : '' }}">
                                    <i class="fas fa-percentage"></i>
                                    <p>
                                        Rev Share
                                    </p>
                                </a>
                            </li>
                           
                            <li class="nav-header">SETTING</li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.wilayah')}}"
                                    class="nav-link {{ Request::is('wilayah') ? 'active' : '' }}">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>
                                        Wilayah
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.user')}}" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                                    <i class="fas fa-user"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.SLA')}}"
                                    class="nav-link {{ Request::is('SLA') ? 'active' : '' }}">
                                    <i class="fas fa-clock"></i>
                                    <p>
                                        SLA
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.email')}}" class="nav-link {{ Request::is('email') ? 'active' : '' }}">
                                    <i class="fas fa-envelope"></i>
                                    <p>
                                        Email
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{Route('admin.Template')}}"
                                    class="nav-link {{ Request::is('template') ? 'active' : '' }}">
                                    <i class="fas fa-file-alt"></i>
                                    <p>
                                        Template
                                    </p>
                                </a>
                            </li>

                          
                           
                            <li>&nbsp</li>
                        </ul>
                    </nav>

                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content-header">

                    {{-- <h1>tes123</h1> --}}
                    @yield('content')
                </section>
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer" style="height:50px;">
                <div class="float-right d-none d-sm-inline-block" onclick="about()">
                    <span class="mr-2"><b> Business Development </b></span> <img src="./image/logo1.png" alt=""
                        srcset="" width="80px" style="margin-top: -5px;">
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script src="{{asset('js/fontawesome-iconpicker.min.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
    {{-- <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}
    <link rel="stylesheet" href="">
    <script src="{{asset('js/datepicker.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js"></script>
    {{-- <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
    --}}
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
    @yield('script')
    @if (Request::is('staff'))
    @include('staff.javascript')
    @else
    @include('admin.contentjs')
    @endif
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>



    <script type="text/javascript">
        $( document ).ready(function() {
    
            $('#loading-text').addClass('ilang');
            $('#loading').removeAttr('id');
            $('body').removeAttr('style');
});
    </script>

</body>

</html>