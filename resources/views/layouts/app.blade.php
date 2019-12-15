<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>BUSINESS
    DEVELOPMENT | Dashboard</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->

<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link rel="apple-touch-icon" sizes="57x57" href=" {{asset('favicon/apple-icon-57x57.png')}}">
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
<link rel="manifest" href=" {{asset('favicon/manifest.json')}}"> --}}
<link rel="shortcut icon"
    href="http://mncplaysurabaya99.id.tc/wp-content/uploads/sites/447/2016/03/MNC_Playmedia-home.png"
    type="image/x-icon">
{{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
{{-- <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
--}}
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
{{-- <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}"> --}}
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
{{-- <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}"> --}}
{{-- <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
{{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
@livewireAssets

</head>

<style>
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



    .modal-form {
        max-width: 80% !important;
    }

    .switch-field {
        display: flex;
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

    @media screen and (min-width: 800px) {
        #rp_ilang {
            display: none;
        }
    }
</style>
</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
{{-- <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script> --}}
<!-- JQVMap -->
{{-- <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}
{{-- <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script> --}}
<!-- jQuery Knob Chart -->
{{-- <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script> --}}
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
{{-- <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> --}}
<!-- Summernote -->
{{-- <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
{{-- <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script> --}}
<!-- AdminLTE for demo purposes -->
@yield('script')
{{-- @yield('admin.contentjs') --}}
{{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<link rel="stylesheet" href="">
<script src="{{asset('js/datepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js"></script>
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
{{-- @include('admin.contentjs') --}}
{{-- @include('admin.javascript') --}}

</html>