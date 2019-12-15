<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BUSINESS DEVELOPMENT | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../css/datepicker.css">
</head>
<style>
    a:hover {
        text-decoration: none;
    }

    .building_name:hover {
        cursor: pointer;
    }

    input[name="jumlah_lantai_1"].error {
        border: 1px solid red;
    }

    input[name="jumlah_unit_1"].error {
        border: 1px solid red;
    }

    input[name="jumlah_yang_dihuni_1"].error {
        border: 1px solid red;
    }

    input[name="jumlah_area_komersial_dihuni_1"].error {
        border: 1px solid red;
    }

    input[name="tingkat_okupansi_1"].error {
        border: 1px solid red;
    }

    input[name="jumlah_unit_area_kemerial_1"].error {
        border: 1px solid red;
    }

    input[name="jumlah_tingkat_okupansi_area_1"].error {
        border: 1px solid red;
    }

    input[name="jumlah_kendaraan_terdaftar_1"].error {
        border: 1px solid red;
    }

    #jumlah_lantai_1-error {
        display: none !important;
    }

    #jumlah_unit_1-error {
        display: none !important;
    }

    #jumlah_yang_dihuni_1-error {
        display: none !important;
    }

    #tingkat_okupansi_1-error {
        display: none !important;
    }

    #jumlah_unit_area_kemerial_1-error {
        display: none !important;
    }

    #jumlah_tingkat_okupansi_area_1-error {
        display: none !important;
    }

    #jumlah_kendaraan_terdaftar_1-error {
        display: none !important;
    }

    #jumlah_area_komersial_dihuni_1-error {
        display: none !important;
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



    .modal-form {
        max-width: 80% !important;
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

    /* This is just for CodePen. */

    .form {
        max-width: 600px;
        font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;
        font-weight: normal;
        line-height: 1.625;
        margin: 8px auto;
        padding: 16px;
    }

    h2 {
        font-size: 18px;
        margin-bottom: 8px;
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

    .ilang {
        display: none;
    }

    .error {
        color: red;
    }

    .clsDatePicker {
        z-index: 100000;
    }

    .valid {
        display: block;
    }

    /* label[for="status_bangunan[]"] {
    } */

    #mahasiswa-error {
        position: absolute;
        width: 140px;
        margin-top: 36px;
    }

    #indonesia-error {
        position: absolute;
        width: 140px;
        margin-top: 36px;
    }

    #Expatriat-error {
        position: absolute;
        width: 140px;
        margin-top: 36px;
    }

    #karyawan-error {
        position: absolute;
        width: 140px;
        margin-top: 36px;
    }

    #pengusaha-error {
        position: absolute;
        width: 140px;
        margin-top: 36px;
    }

    #single-error {
        position: absolute;
        width: 140px;
        margin-top: 36px;
    }

    #keluarga-error {
        position: absolute;
        width: 140px;
        margin-top: 36px;
    }

    #REVENUE_SHARE-error {
        position: absolute;
        width: 140px;
        margin-top: 36px;
    }

    @media screen and (min-width: 800px) {
        #rp_ilang {
            display: none;
        }
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">

        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                <li class="nav-item" id="rp_ilang">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>


                <!-- SEARCH FORM -->


                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{Route('staff.home')}}"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="width:450px;"
                                    aria-labelledby="navbarDropdown">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="info-box mb-2" style="margin-bottom:0px;">
                                                    <div class="container">
                                                        <div class="row">
                                                            @foreach ( App\Themplate::all() as $data)
                                                            <div class="col-md-3">
                                                                <a href="THEMPLATE/{{$data->link}}">
                                                                    <span
                                                                        class="info-box-icon bg-primary elevation-1 mt-2"
                                                                        style="height: 70px;">
                                                                        <i class="{!!$data->icon!!}"></i>
                                                                    </span>
                                                                    <p style="color:black" class=" text-center">
                                                                        {{$data->title}}</p>
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    {{-- <a href="THEMPLATE/1. FORMULIR AKUISISI APARTEMEN.docx" class="dropdown-item">
                                        <span><i class="fas fa-building"></i></span>
                                        FORMULIR AKUISISI APARTEMEN.docx</a>
                                    <a href="THEMPLATE/2. FORMULIR AKUISISI GEDUNG - HRB.docx"
                                        class="dropdown-item"><span><i class="fas fa-briefcase"></i></span>
                                        FORMULIR AKUISISI GEDUNG - HRB.docx</a>
                                    <a href="THEMPLATE/3. FORMULIR AKUISISI LANDED HOUSE.docx"
                                        class="dropdown-item"><span><i class="fas fa-home"></i></span>
                                        FORMULIR AKUISISI LANDED HOUSE.docx</a>
                                    <a href="THEMPLATE/4. FORMULIR AKUISISI RUKAN-SOHO.docx"
                                        class="dropdown-item"><span><i class="fas fa-store"></i></span>
                                        FORMULIR AKUISISI RUKAN-SOHO.docx</a>
                                    <a href="THEMPLATE/Copy of WO ROLLOUT FTTX.xlsx" class="dropdown-item"><span><i
                                                class="fas fa-tools"></i></span> Copy of WO
                                        ROLLOUT FTTX.xlsx</a>
                                    <a href="THEMPLATE/Draft PKS + side letter rev.docx" class="dropdown-item">6. Draft
                                        PKS + side letter rev.doc</a>
                                    <a href="THEMPLATE/Form Approval Cust.Clasification Ruko Kindo Square.docx"
                                        class="dropdown-item">7. Form Approval Cust.Clasification Ruko Kindo
                                        Square.docx</a>
                                    <a href="THEMPLATE/Form Cuti Terbaru.xlsx" class="dropdown-item"><span><i
                                                class="fas fa-mountain"></i></span> Form Cuti
                                        Terbaru.xlsx</a>
                                    <a href="THEMPLATE/Formulir Permohonan Ijin Karyawan_4Aug16.doc"
                                        class="dropdown-item"><span><i class="far fa-envelope"></i></span> Formulir
                                        Permohonan Ijin Karyawan_4Aug16.doc</a>
                                    <a href="THEMPLATE/Proposal Kerjasama MKM.doc" class="dropdown-item"><span><i
                                                class="fas fa-handshake"></i></span> Proposal
                                        Kerjasama MKM.doc</a>
                                    <a href="THEMPLATE/surat izin open booth.docx" class="dropdown-item">11. surat izin
                                        open booth.docx</a>
                                    <a href="THEMPLATE/SURAT IZIN ROLLOUT CONTOH.docx" class="dropdown-item">12. SURAT
                                        IZIN
                                        ROLLOUT CONTOH.docx</a>

                                    <a href="THEMPLATE/TEMPLETTE MOM BARU.docx" class="dropdown-item">14. TEMPLETTE MOM
                                        BARU.docx</a>
                                    <a href="THEMPLATE/TERMS AND CONDITIONS.docx" class="dropdown-item">15. TERMS AND
                                        CONDITIONS.docx</a> --}}
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                        <h5 class="btn btn-primary float-right">LOGOUT</h5>
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
            <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:1000px;">
                <!-- Brand Logo -->


                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ Auth::user()->gender == "Male" ? '../default-male_2.jpg' : '../no-profile-picture-icon-female-3.jpg' }}"
                                class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="{{Route('staff.home')}}" class="d-block">{{Auth::user()->name}}</a>
                        </div>
                    </div>
                    @yield('sidebar')

                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6">
                                {{-- <h1 class="m-0 text-dark">Dashboard</h1> --}}

                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <section class="content">

                    @yield('content')

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer" style="height:50px;">
                <div class="float-right d-none d-sm-inline-block" onclick="about()">
                    <span class="mr-2"><b> Business Development </b></span> <img src="../image/logo1.png" alt=""
                        srcset="" width="80px" style="margin-top: -5px;">
                </div>
            </footer>

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="../plugins/jquery/jquery.min.js"></script> --}}
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.world.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <script src="../https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <script src="../js/datepicker.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE for demo purposes -->
    @yield('script')
    <script src="../dist/js/demo.js"></script>
</body>

</html>