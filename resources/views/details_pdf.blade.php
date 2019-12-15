<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <title>{{$data->BUILDING_NAME}}</title>

</head>
<style>
    tr:nth-child(odd) {
        background-color: #f2f2f2
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
</style>


<body>
    @php
    if ($data->Provider_Existing == null) {
    $data->Provider_Existing = ",,,,,";
    }
    $Provider_Existing = explode(",",$data->Provider_Existing);
    if ($data->Inet == null) {
    $data->Inet = ",,,,,";
    }
    $Inet = explode(",",$data->Inet);

    if ($data->TV == null) {
    $data->TV = ",,,,,";
    }

    $TV = explode(",",$data->TV);

    if ($data->Telp == null) {
    $data->Telp = ",,,,,";
    }

    $Telp = explode(",",$data->Telp);
    if ($data->Eksklusif_Y == null) {
    $data->Eksklusif_Y = ",,,,,";
    }
    $Eksklusif_Y = explode(",",$data->Eksklusif_Y);

    if ($data->Durasi_Kerjasama == null) {
    $data->Durasi_Kerjasama = ",,,,,";
    }

    $Durasi_Kerjasama = explode(",",$data->Durasi_Kerjasama);
    if ($Durasi_Kerjasama[0] == "") {
    $Durasi_Kerjasama[1] = "";
    $Durasi_Kerjasama[2] = "";
    $Durasi_Kerjasama[3] = "";
    $Durasi_Kerjasama[4] = "";
    }

    if ($data->Rev_Share == null) {
    $data->Rev_Share = ",,,,,";
    }

    $Rev_Share = explode(",",$data->Rev_Share);
    if ($data->Rev_Share == null) {
    $data->Rev_Share = ",,,,,";
    }
    $Sewa_Lahan = explode(",",$data->Sewa_Lahan);
    if ($Sewa_Lahan[0] == "") {
    $Sewa_Lahan[1] = "";
    $Sewa_Lahan[2] = "";
    $Sewa_Lahan[3] = "";
    $Sewa_Lahan[4] = "";
    }
    $INFRASTRUKTUR_KEPEMILIKAN = explode(",",$data->INFRASTRUKTUR_KEPEMILIKAN);

    $KEWARGA_NEGARAAN_PENGHUNI = explode(",",$data->KEWARGA_NEGARAAN_PENGHUNI);
    $STATUS_PENGHUNI = explode(",",$data->STATUS_PENGHUNI);
    $Mayoritas_Jenis_Usaha = explode(",",$data->Mayoritas_Jenis_Usaha);
    $TYPE_UNIT = explode(",",$data->TYPE_UNIT);
    $LAYANAN_YANG_DI_SEDIAKAN_MKM = explode(",",$data->LAYANAN_YANG_DI_SEDIAKAN_MKM);
    $JENIS_PEKERJAAN = explode(",",$data->JENIS_PEKERJAAN);
    $Presentase_Operasional = explode(",",$data->Presentase_Operasional);

    if ($data->MARKETING_AKTIFITAS == null) {
    $data->MARKETING_AKTIFITAS = ",,,,,,,,";
    }
    $MARKETING_AKTIFITAS = explode(",",$data->MARKETING_AKTIFITAS);

    if ($data->MARKETING_POP_UP == null) {
    $data->MARKETING_POP_UP = ",,,,,,,,";
    }
    $MARKETING_POP_UP = explode(",",$data->MARKETING_POP_UP);

    if ($data->MARKETING_SPANDUK == null) {
    $data->MARKETING_SPANDUK = ",,,,,,,,";
    }
    $MARKETING_SPANDUK = explode(",",$data->MARKETING_SPANDUK);
    if ($data->MARKETING_POSTER == null) {
    $data->MARKETING_POSTER = ",,,,,,,,";
    }
    $MARKETING_POSTER = explode(",",$data->MARKETING_POSTER);
    if ($data->MARKETING_STICKER == null) {
    $data->MARKETING_STICKER = ",,,,,,,,";
    }
    $MARKETING_STICKER = explode(",",$data->MARKETING_STICKER);
    if ($data->MARKETING_ROLL == null) {
    $data->MARKETING_ROLL = ",,,,,,,,";
    }
    $MARKETING_ROLL = explode(",",$data->MARKETING_ROLL);
    if ($data->MARKETING_ACRILIC == null) {
    $data->MARKETING_ACRILIC = ",,,,,,,,";
    }
    $MARKETING_ACRILIC = explode(",",$data->MARKETING_ACRILIC);


    $MAIN_HOLE_READY_UNIT = explode(",",$data->MAIN_HOLE_READY_UNIT);
    $BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI =
    explode(",",$data->BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI);


    $jumlah_lantai = explode(",",$data->Jumlah_Lantai);
    $Jumlah_unit = explode(",",$data->Jumlah_unit);
    $Jumlah_Yang_di_huni = explode(",",$data->Jumlah_Yang_di_huni);
    $Tingkat_Okupansi = explode(",",$data->Tingkat_Okupansi);
    $JUMLAH_AREA_KOMERSIAL_DIHUNI =
    explode(",",$data->JUMLAH_AREA_KOMERSIAL_DIHUNI);
    $JUMLAH_UNIT_AREA_KOMERSIAL =
    explode(",",$data->JUMLAH_UNIT_AREA_KOMERSIAL);
    $Jumlah_Tingkat_Okupansi = explode(",",$data->Jumlah_Tingkat_Okupansi);
    $JUMLAH_KENDARAAN_TERDAFTAR =
    explode(",",$data->JUMLAH_KENDARAAN_TERDAFTAR);
    @endphp
    <div class="container mt-5">
        <div class="text-center">
            <img src="/image/logo1.png" alt="" style="margin-left:120px;" class="mb-2" width="20%" ;>
        </div>
        <h2 class="text-center mb-4 mt-2">{{$data->BUILDING_NAME}} </h2>
        <div class="" style="overflow: hidden; border-radius: 20px">
            <table>
                <tbody>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; " width="10%">BUILDING NAME</th>
                        <td width="30%">&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->BUILDING_NAME}}</td>

                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">PIC MNC
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->PIC_MNC}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            PROGRESS STATUS</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->PROGRESS_STATUS}}</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">COLOR
                            MAP</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->COLOR_MAP_ONLINE}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">ADDRESS
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->ADDRESS}}</td>
                    </tr>

                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">
                            PROVINCE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp <span id="PROVINCE">{{$data->PROVINCE}}</span></td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">CITY
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp <span id="CITY">{{$data->CITY}}</span>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">
                            SUBDISTRICT</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp <span id="SUBDISTRICT">{{$data->SUBDISTRICT}}</span></td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            COORDINATE</th>
                        <td id="COORDINATE">&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->COORDINATE}}</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">
                            PROPERTY TYPE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->PROPERTY_TYPE}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            DEVELOPER/COMPANY
                            NAME
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->DEVELOPERORCOMPANY_NAME}}</td>
                    </tr>

                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">NAME
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->NAME}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">Email 1
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->EMAIL}}</td>
                    </tr>
                    @if ($data->EMAIL_1 != null)
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">Email 2
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->EMAIL_1}}</td>
                    </tr>
                    @endif
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">PHONE
                            OFFICE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->PHONEORMOBILE}}</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">PHONE
                            MOBILE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->MOBILEPHONE}}</td>
                    </tr>



                    {{-- <tr>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">TOTAL
                                                        OCCUPANCY</th>
                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->TOTAL_OCCUPANCY}}</td>
                    </tr> --}}
                    {{-- 
                                        <tr>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">
                                                        Bersedia Re-Wiring FTTH</th>
                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->RE_WIRING_FTTH}}</td>
                    </tr> --}}
                    {{-- <tr>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">
                                                        Pengelolah bersedia melakukan
                                                        perapihan ke penghuni</th>
                                                <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->PENGELOLA_BERSEDIA_MELAKUKAN_PERAPIHAN_INSTALASI}}
                    </td>
                    </tr> --}}
                    {{-- <tr>
                                                <th style="padding:10px; background-color:#0293B6;color:white; border-bottom:1px solid white;border-top:1px solid white"
                                                        class="h5">Tower ke
                                                        {{ $loop->iteration }}
                    </th>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                            Lantai</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Jumlah_Lantai}}</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                            unit</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Jumlah_unit}}</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                            Yang di huni</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Jumlah_Yang_di_huni}}</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                            Tingkat Okupansi</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Jumlah_Tingkat_Okupansi}}</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                            Unit Area Komersial</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Jumlah_Unit_Area_Komersial}}</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                            Kendaraan Terdaftar</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Jumlah_Kendaraan_Terdaftar}}</td>
                    </tr> --}}
                    @if ($data->PROGRESS_STATUS != "DESK SURVEY")

                    @if ($data->PROPERTY_TYPE == "Apartemen")
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Bersedia Re-Wiring FTTH</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->RE_WIRING_FTTH}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Pengelolah bersedia melakukan perapihan ke penghuni</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->PENGELOLA_BERSEDIA_MELAKUKAN_PERAPIHAN_INSTALASI}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Type Unit</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbspStudio =
                            @if ($TYPE_UNIT[0] != null)
                            {{$TYPE_UNIT[0]}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp1 BR =
                            {{$TYPE_UNIT[1]}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp2 BR =
                            {{$TYPE_UNIT[2]}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp3 BR =
                            {{$TYPE_UNIT[3]}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPenthouse =
                            {{$TYPE_UNIT[4]}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Average Harga Unit</th>


                        <td>&nbsp&nbsp&nbsp&nbsp Terendah = {{$data->HARGA_UNIT_TERENDAH}}
                            &nbsp&nbsp&nbsp&nbspTertinggi = {{$data->HARGA_UNIT_TERTINGGI}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Infrastruktur</th>


                        <td>
                            @if ($data->INFRASTRUKTUR_TERSEDIA != null ||
                            $data->INFRASTRUKTUR_KEPEMILIKAN != null)

                            @php
                            $data_1 = $data->INFRASTRUKTUR_TERSEDIA;
                            $data_0 = $data->INFRASTRUKTUR_KEPEMILIKAN;
                            $data_0 = explode(",",$data_0);
                            $data_1 = explode(",",$data_1);
                            $all_data = [];
                            for ($i=0; $i < 3 ; $i++) { if(preg_match("/{$data_1[$i]}/i", $data_0[$i])) {
                                $all_data[$i]=$data_0[$i]; } } $all_data=implode(", ",$all_data);
                                                                                                               @endphp
                                                        &nbsp&nbsp&nbsp&nbsp{{$all_data}}
@endif

                                                </td>
                                        </tr>
                                        <tr>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                Main Hole Ready</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbspDi Unit = {{$MAIN_HOLE_READY_UNIT[0]}}
                            &nbsp&nbsp&nbsp&nbspDi Koridor =
                            {{$data->MAIN_HOLE_READY_KORIDOR}}


                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Biaya perapihan ditagih langsung ke penghuni</th>


                        <td>
                            @if ($BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI[0] != null)
                            &nbsp&nbsp&nbsp&nbsp{{$BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI[0]}}
                            {{$BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI[1]}}
                            @endif


                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Layanan Yang Disediakan MKM</th>


                        <td>
                            @if ($LAYANAN_YANG_DI_SEDIAKAN_MKM[0]!= null)

                            &nbsp&nbsp&nbsp&nbsp 1. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[0]}}
                            &nbsp&nbsp&nbsp 2. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[1]}}
                            &nbsp&nbsp&nbsp 3. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[2]}}
                            @endif


                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Komposisi Kewarganegaraan Penghuni</th>


                        <td>
                            @if ($KEWARGA_NEGARAAN_PENGHUNI[0] != null)

                            &nbsp&nbsp&nbspExpatriat = {{$KEWARGA_NEGARAAN_PENGHUNI[0]."%"}}
                            &nbsp&nbsp&nbspMayoritas Negara
                            = {{$KEWARGA_NEGARAAN_PENGHUNI[1]}}
                            &nbsp&nbsp&nbspIndonesia = {{$KEWARGA_NEGARAAN_PENGHUNI[2]."%"}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Jenis Pekerjaan</th>


                        <td>
                            @if ($JENIS_PEKERJAAN[0] != null)
                            &nbsp&nbsp&nbspMahasiswa = {{$JENIS_PEKERJAAN[0]."%"}}
                            &nbsp&nbsp&nbspKaryawan
                            = {{$JENIS_PEKERJAAN[1]}}
                            &nbsp&nbsp&nbspPengusaha = {{$JENIS_PEKERJAAN[2]."%"}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Status Penghuni</th>


                        <td>
                            @if ($STATUS_PENGHUNI[0]!= null)
                            &nbsp&nbsp&nbspSingle = {{$STATUS_PENGHUNI[0]."%"}}
                            &nbsp&nbsp&nbspKeluarga = {{$STATUS_PENGHUNI[1]."%"}}
                            @endif
                        </td>
                    </tr>


                    @endif
                    @if ($data->PROPERTY_TYPE == "Office Building")
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Main Hole Ready</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbspMain Hole Ready =
                            {{$MAIN_HOLE_READY_UNIT[1]}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Berapa harga rata-rata berlangganan internet per-bulan</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->rata_rata}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Pengelola berkenan untuk membantu penjualan?</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Membantu_Penjualan}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Infrastruktur</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->INFRASTRUKTUR_TERSEDIA}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Pembangunan Infrastruktur s/d.</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Pembangunan_Infrastruktur}}
                        </td>
                    </tr>

                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Internet Service</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Internet_Service}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Layanan Yang Disediakan MKM</th>


                        <td>
                            @if ($LAYANAN_YANG_DI_SEDIAKAN_MKM != null)
                            &nbsp&nbsp&nbsp&nbsp 1. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[0]}}
                            &nbsp&nbsp&nbsp 2. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[1]}}
                            &nbsp&nbsp&nbsp 3. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[2]}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Mayoritas Jenis Usaha</th>


                        <td>
                            @if ($Mayoritas_Jenis_Usaha != null)
                            &nbsp&nbsp&nbsp&nbspDistributor({{$Mayoritas_Jenis_Usaha[0]}}),Resto/Cafe({{$Mayoritas_Jenis_Usaha[1]}}),Bank({{$Mayoritas_Jenis_Usaha[2]}}),Mini
                            Market
                            /Apotek({{$Mayoritas_Jenis_Usaha[3]}}),Tour &
                            Travel({{$Mayoritas_Jenis_Usaha[4]}}),Lembaga

                            &nbsp&nbsp&nbsp&nbspPendidikan({{$Mayoritas_Jenis_Usaha[5]}}),Konsultan
                            Non legal &
                            Legal({{$Mayoritas_Jenis_Usaha[6]}}),Modern Market /Hyper
                            Store({{$Mayoritas_Jenis_Usaha[7]}}),ATPM/Principle({{$Mayoritas_Jenis_Usaha[8]}}),
                            &nbsp&nbsp&nbsp&nbspExpedisi({{$Mayoritas_Jenis_Usaha[9]}}),Others({{$Mayoritas_Jenis_Usaha[10]}})
                            @endif

                        </td>
                    </tr>
                    @endif
                    @if ($data->PROPERTY_TYPE == "Ruko/Rukan")
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Berapa harga rata-rata berlangganan internet per-bulan</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->rata_rata}}


                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Main Hole Ready</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbspMain Hole Ready =
                            {{$MAIN_HOLE_READY_UNIT[1]}}


                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Pengelola berkenan untuk membantu penjualan?</th>
                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Membantu_Penjualan}}


                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Infrastruktur</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->INFRASTRUKTUR_TERSEDIA}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Main Hole Ready</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbspDi Unit = {{$MAIN_HOLE_READY_UNIT[0]}}
                            &nbsp&nbsp&nbsp&nbspDi Koridor =
                            {{$data->MAIN_HOLE_READY_KORIDOR}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Pembangunan Infrastruktur s/d.</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Pembangunan_Infrastruktur}}
                        </td>
                    </tr>

                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Metode Pembangunan Infrastruktur</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Metode_Pembangunan_Infrastruktur}}
                        </td>
                    </tr>



                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Metode Pembangunan Infrastruktur</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Metode_Pembangunan_Infrastruktur}}
                        </td>
                    </tr>



                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Internet Service</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Internet_Service}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Presentase Operasional Rukan / SOHO</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp Weekday =
                            {{$data->Presentase_Operasional[0]."%"}}
                            &nbsp&nbsp&nbsp&nbspWeekend, Sabtu =
                            {{$data->Presentase_Operasional[1]."%"}}
                            &nbsp&nbsp&nbsp&nbspMinggu =
                            {{$data->Presentase_Operasional[2]."%"}}
                        </td>

                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Mayoritas Jenis Usaha</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbspDistributor({{$Mayoritas_Jenis_Usaha[0]}}),Resto/Cafe({{$Mayoritas_Jenis_Usaha[1]}}),Bank({{$Mayoritas_Jenis_Usaha[2]}}),Mini
                            Market
                            /Apotek({{$Mayoritas_Jenis_Usaha[3]}}),Tour &
                            Travel({{$Mayoritas_Jenis_Usaha[4]}}),Lembaga

                            &nbsp&nbsp&nbsp&nbspPendidikan({{$Mayoritas_Jenis_Usaha[5]}}),Konsultan
                            Non legal &
                            Legal({{$Mayoritas_Jenis_Usaha[6]}}),Modern Market /Hyper
                            Store({{$Mayoritas_Jenis_Usaha[7]}}),ATPM/Principle({{$Mayoritas_Jenis_Usaha[8]}}),
                            &nbsp&nbsp&nbsp&nbspExpedisi({{$Mayoritas_Jenis_Usaha[9]}}),Others({{$Mayoritas_Jenis_Usaha[10]}})
                        </td>
                    </tr>
                    @endif
                    @if ($data->PROPERTY_TYPE == "Landed House")
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Pengelola berkenan untuk membantu penjualan?</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Membantu_Penjualan}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Average Harga Unit</th>


                        <td>&nbsp&nbsp&nbsp&nbsp Terendah = {{$data->HARGA_UNIT_TERENDAH}}
                            &nbsp&nbsp&nbsp&nbspTertinggi = {{$data->HARGA_UNIT_TERTINGGI}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Infrastruktur</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp{{$data->INFRASTRUKTUR_TERSEDIA}}


                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Metode Pembangunan Infrastruktur</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Metode_Pembangunan_Infrastruktur}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Pembangunan Infrastruktur s/d.</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Pembangunan_Infrastruktur_landed_house}}

                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Internet Service</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp
                            {{$data->Internet_Service}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Layanan Yang Disediakan MKM</th>


                        <td>
                            &nbsp&nbsp&nbsp&nbsp 1. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[0]}}
                            &nbsp&nbsp&nbsp 2. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[1]}}
                            &nbsp&nbsp&nbsp 3. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[2]}}


                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Jenis Pekerjaan</th>


                        <td>
                            &nbsp&nbsp&nbspMahasiswa = {{$JENIS_PEKERJAAN[0]."%"}}
                            &nbsp&nbsp&nbspKaryawan
                            = {{$JENIS_PEKERJAAN[1]}}
                            &nbsp&nbsp&nbspPengusaha = {{$JENIS_PEKERJAAN[2]."%"}}
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Status Penghuni</th>


                        <td>
                            &nbsp&nbsp&nbspSingle = {{$STATUS_PENGHUNI[0]."%"}}
                            &nbsp&nbsp&nbspPasangan Muda = {{$STATUS_PENGHUNI[1]."%"}}
                            &nbsp&nbsp&nbspUsia > 45 Thn = {{$STATUS_PENGHUNI[2]."%"}}
                        </td>
                    </tr>
                    @endif
                    @endif

                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            SUBMIT PROPOSAL DATE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->SUBMIT_PROPOSAL_DATE}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            BUSDEV SIGNED DATE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->BUSDEV_SIGNED}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            BM SIGNED DATE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->BM_SIGNED}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            EXCLUSIVE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->EXCLUSIVE}}</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">REVENUE
                            SHARE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->REVENUE_SHARE}}%</td>
                    </tr>
                    <tr>
                        <th style="padding:10px; background-color:#0293B6;color:white; ">RENTAL
                            BASE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->RENTAL_BASE}} </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">ONE
                            TIME FEE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->ONE_TIME_FEE}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">FREE
                            SERVICES</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->FREE_SERVICES}}</td>
                    </tr>
                    @php
                    $free_services_1 = (explode(" ",$data->FREE_SERVICES_1))
                    @endphp
                    @if ($free_services_1[0] != "")
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">FREE
                            SERVICES 2</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->FREE_SERVICES_1}}</td>
                    </tr>
                    @endif
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">FREE
                            WIFI</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->FREE_WIFI}}</td>
                    </tr>


                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            BUSDEV_SIGNED</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->BUSDEV_SIGNED}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">BM
                            SIGNED</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->BM_SIGNED}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">SALES
                            SIGNED</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->SALES_SIGNED}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">GM
                            SALES SIGNED</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->GM_SALES_SIGNED}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            RECOMMENDATION</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->RECOMMENDATION}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">SITE
                            SURVEY DATE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->SITE_SURVEY_DATE}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">BOQ
                            RECEIVED DATE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->BOQ_RECEIVED_DATE}}</td>
                    </tr>
                    <tr>

                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">PNL
                            FULL SIGN DATE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->PNL_FULL_SIGN_DATE}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Tingkat Okupansi</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Tingkat_Okupansi_PNL}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Target dari Occp Based</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Occp_Based}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Rev Share(%)</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Revenue_Share_persen . "%"}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Rev Share(Rp)</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Revenue_Share_rp}}</td>
                    </tr>

                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">Biaya
                            Sewa</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Biaya_Sewa}}</td>
                    </tr>

                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">Total
                            Biaya</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->total_biaya}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">Total
                            Revenue(Rp)</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Total_Revenue}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Investasi</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->Investasi}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            CPE Cost (STB+ONT+OW) (Rp)</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->cpe_cost}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            by Total Duration (Rp) (Margin)</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->margin_by_total_duration}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Persentase (%) (Margin)</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->margin_persen."%"}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            Breakeven Point (%) (Margin)</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->breakeven_point."%"}}</td>
                    </tr>


                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">SIGNED
                            PKS DATE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->PKS_DATE}} </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">WO DATE
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->WO_DATE}} </td>
                    </tr>

                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">PKS
                            DATE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->BASO_DATE}}</td>
                    </tr>

                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">PKS END
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->PKS_END}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            CONTRACT DURATION</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->CONTRACT_DURATION." Years"}} </td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">HP
                            (PORT)</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->HP_PORT}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">NO PKS
                        </th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->NO_PKS}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">REJECT
                            CODE</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->REJECT_CODE}}</td>
                    </tr>
                    <tr>
                        <th style=" padding:10px; background-color:#0293B6;color:white;">
                            BASO/BAST No.</th>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->BASOORBAST_No}}</td>
                    </tr>

                </tbody>
            </table>

        </div>
        @if ($data->PROGRESS_STATUS != "DESK SURVEY" )
        <h3 class=" mt-5"><u> PROPERTY PROFILE</u></h3>
        <div class="border mt-2">
            @if ($data->PROPERTY_TYPE == "Apartemen")

            <div class="container mt-3 mb-3" id="tower_apartemen">
                <table class="table-input">
                    <tr>
                        <td><b style="margin-left: 17px;">Tower</b></td>
                        <td><b>1</b></td>
                        <td><b>2</b></td>
                        <td><b>3</b></td>
                        <td><b>4</b></td>
                        <td><b>5</b></td>
                        <td><b>6</b></td>
                        <td><b>7</b></td>
                        <td><b>8</b></td>
                        <td><b>9</b></td>
                        <td><b>10</b></td>
                        <td><b>Total</b></td>
                    </tr>
                    <tr id="jumlah_lantai_tower">
                        @if ($jumlah_lantai[0] != null)



                        <td class="text-left pl-3">Jumlah Lantai</td>
                        <td><input type="text" size="3" name="jumlah_lantai_1" value="{{$jumlah_lantai[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_2" value="{{$jumlah_lantai[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_3" value="{{$jumlah_lantai[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_4" value="{{$jumlah_lantai[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_5" value="{{$jumlah_lantai[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_6" value="{{$jumlah_lantai[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_7" value="{{$jumlah_lantai[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_8" value="{{$jumlah_lantai[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_9" value="{{$jumlah_lantai[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_10" value="{{$jumlah_lantai[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_lantai_total" value="{{$jumlah_lantai[0]}}"
                                disabled />
                        </td>
                        @endif

                    </tr>
                    <tr id="jumlah_unit_tower">
                        @if ($Jumlah_unit[0] != null)

                        <td class="text-left pl-3">Jumlah Unit</td>
                        <td><input type="text" size="3" name="jumlah_unit_1" value="{{$Jumlah_unit[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_2" value="{{$Jumlah_unit[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_3" value="{{$Jumlah_unit[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_4" value="{{$Jumlah_unit[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_5" value="{{$Jumlah_unit[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_6" value="{{$Jumlah_unit[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_7" value="{{$Jumlah_unit[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_8" value="{{$Jumlah_unit[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_9" value="{{$Jumlah_unit[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_10" value="{{$Jumlah_unit[9]}}" disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_unit_total" value="{{$Jumlah_unit[0]}}" disabled />
                        </td>
                        @endif
                    </tr>
                    <tr id="jumlah_yang_dihuni_tower">
                        @if ($Jumlah_Yang_di_huni[0] != null)

                        <td class="text-left pl-3"><span id="text_jumlah_yang_dihuni">Jumlah
                                Yang
                                Dihuni</span></td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_1" value="{{$Jumlah_Yang_di_huni[0]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_2" value="{{$Jumlah_Yang_di_huni[1]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_3" value="{{$Jumlah_Yang_di_huni[2]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_4" value="{{$Jumlah_Yang_di_huni[3]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_5" value="{{$Jumlah_Yang_di_huni[4]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_6" value="{{$Jumlah_Yang_di_huni[5]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_7" value="{{$Jumlah_Yang_di_huni[6]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_8" value="{{$Jumlah_Yang_di_huni[7]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_9" value="{{$Jumlah_Yang_di_huni[8]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_10" value="{{$Jumlah_Yang_di_huni[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_yang_dihuni_total"
                                value="{{$Jumlah_Yang_di_huni[0]}}" disabled />
                        </td>
                        @endif
                    </tr>

                    <tr id="jumlah_tingkat_okupansi_tower">
                        @if ($Tingkat_Okupansi[0] != null)

                        <td class="text-left pl-3">Tingkat Okupansi (diisi MKM)</td>
                        <td><input type="text" size="3" name="tingkat_okupansi_1" value="{{$Tingkat_Okupansi[0]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_2" value="{{$Tingkat_Okupansi[1]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_3" value="{{$Tingkat_Okupansi[2]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_4" value="{{$Tingkat_Okupansi[3]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_5" value="{{$Tingkat_Okupansi[4]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_6" value="{{$Tingkat_Okupansi[5]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_7" value="{{$Tingkat_Okupansi[6]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_8" value="{{$Tingkat_Okupansi[7]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_9" value="{{$Tingkat_Okupansi[8]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_10" value="{{$Tingkat_Okupansi[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="tingkat_okupansi_total" value="{{$Tingkat_Okupansi[0]}}"
                                disabled />
                        </td>
                        @endif
                    </tr>

                    <tr id="jumlah_unit_area_komersial_tower">
                        @if ($JUMLAH_UNIT_AREA_KOMERSIAL[0] != null)
                        <td class="text-left pl-3">Jumlah Unit Area Komersial</td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_1"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_2"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_3"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_4"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_5"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_6"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_7"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_8"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_9"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_area_kemerial_10"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[9]}}" disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_unit_area_kemerial_total"
                                value="{{$JUMLAH_UNIT_AREA_KOMERSIAL[0]}}" disabled />
                        </td>
                        @endif
                    </tr>
                    <tr id="jumlah_area_komersial_dihuni_tower">
                        @if ($JUMLAH_AREA_KOMERSIAL_DIHUNI[0] != null)

                        <td class="text-left pl-3">Jumlah Area Komersial Dihuni</td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_1"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_2"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_3"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_4"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_5"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_6"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_7"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_8"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_9"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_area_komersial_dihuni_10"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[9]}}" disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_area_komersial_dihuni_total"
                                value="{{$JUMLAH_AREA_KOMERSIAL_DIHUNI[0]}}" disabled />
                        </td>
                        @endif
                    </tr>
                    <tr id="tingkat_okupansi_2">
                        @if ($Jumlah_Tingkat_Okupansi[0] != null)

                        <td class="text-left pl-3">Tingkat Okupansi (diisi MKM)</td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_1"
                                value="{{$Jumlah_Tingkat_Okupansi[0]}}" disabled /></td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_2"
                                value="{{$Jumlah_Tingkat_Okupansi[1]}}" disabled /></td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_3"
                                value="{{$Jumlah_Tingkat_Okupansi[2]}}" disabled /></td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_4"
                                value="{{$Jumlah_Tingkat_Okupansi[3]}}" disabled /></td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_5"
                                value="{{$Jumlah_Tingkat_Okupansi[4]}}" disabled /></td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_6"
                                value="{{$Jumlah_Tingkat_Okupansi[5]}}" disabled /></td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_7"
                                value="{{$Jumlah_Tingkat_Okupansi[6]}}" disabled /></td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_8"
                                value="{{$Jumlah_Tingkat_Okupansi[7]}}" disabled /></td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_9"
                                value="{{$Jumlah_Tingkat_Okupansi[8]}}" disabled /></td>
                        <td><input type="text" size="3" name="jumlah_tingkat_okupansi_10"
                                value="{{$Jumlah_Tingkat_Okupansi[9]}}" disabled /></td>
                        <td><input type="text" size="6" name="jumlah_tingkat_okupansi_total"
                                value="{{$Jumlah_Tingkat_Okupansi[0]}}" disabled /></td>
                        @endif
                    </tr>
                    <tr id="jumlah_kendaraan_terdaftar">
                        @if ($JUMLAH_KENDARAAN_TERDAFTAR[0] != null)

                        <td class="text-left pl-3">Jumlah Kendaraan Terdaftar</td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_1"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_2"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_3"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_4"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_5"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_6"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_7"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_8"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_9"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_kendaraan_terdaftar_10"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[9]}}" disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_kendaraan_terdaftar_total"
                                value="{{$JUMLAH_KENDARAAN_TERDAFTAR[0]}}" disabled />
                        </td>
                        @endif
                    </tr>
                </table>
            </div>
            @endif





            @if ($data->PROPERTY_TYPE == "Office Building")

            <div class="container mt-3 mb-3" id="tower_apartemen">
                <table class="table-input">
                    <tr>
                        <td><b style="margin-left: 17px;">Tower</b></td>

                        {{-- <td><b>Tower</b></td> --}}
                        <td><b>1</b></td>
                        <td><b>2</b></td>
                        <td><b>3</b></td>
                        <td><b>4</b></td>
                        <td><b>5</b></td>
                        <td><b>6</b></td>
                        <td><b>7</b></td>
                        <td><b>8</b></td>
                        <td><b>9</b></td>
                        <td><b>10</b></td>
                        <td><b>Keterangan</b></td>
                    </tr>
                    <tr id="jumlah_lantai_tower">


                        <td class="text-left pl-3">Jumlah Lantai</td>
                        <td><input type="text" size="3" name="jumlah_lantai_1" value="{{$jumlah_lantai[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_2" value="{{$jumlah_lantai[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_3" value="{{$jumlah_lantai[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_4" value="{{$jumlah_lantai[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_5" value="{{$jumlah_lantai[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_6" value="{{$jumlah_lantai[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_7" value="{{$jumlah_lantai[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_8" value="{{$jumlah_lantai[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_9" value="{{$jumlah_lantai[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_10" value="{{$jumlah_lantai[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_lantai_total" value="{{$jumlah_lantai[0]}}"
                                disabled />
                        </td>


                    </tr>
                    <tr id="jumlah_unit_tower">
                        <td class="text-left pl-3">Jumlah Unit</td>
                        <td><input type="text" size="3" name="jumlah_unit_1" value="{{$Jumlah_unit[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_2" value="{{$Jumlah_unit[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_3" value="{{$Jumlah_unit[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_4" value="{{$Jumlah_unit[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_5" value="{{$Jumlah_unit[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_6" value="{{$Jumlah_unit[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_7" value="{{$Jumlah_unit[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_8" value="{{$Jumlah_unit[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_9" value="{{$Jumlah_unit[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_10" value="{{$Jumlah_unit[9]}}" disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_unit_total" value="{{$Jumlah_unit[0]}}" disabled />
                        </td>
                    </tr>
                    <tr id="jumlah_yang_dihuni_tower">
                        <td class="text-left pl-3"><span id="text_jumlah_yang_dihuni">Jumlah
                                Yang
                                Dihuni</span></td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_1" value="{{$Jumlah_Yang_di_huni[0]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_2" value="{{$Jumlah_Yang_di_huni[1]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_3" value="{{$Jumlah_Yang_di_huni[2]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_4" value="{{$Jumlah_Yang_di_huni[3]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_5" value="{{$Jumlah_Yang_di_huni[4]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_6" value="{{$Jumlah_Yang_di_huni[5]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_7" value="{{$Jumlah_Yang_di_huni[6]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_8" value="{{$Jumlah_Yang_di_huni[7]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_9" value="{{$Jumlah_Yang_di_huni[8]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_10" value="{{$Jumlah_Yang_di_huni[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_yang_dihuni_total"
                                value="{{$Jumlah_Yang_di_huni[0]}}" disabled />
                        </td>
                    </tr>
                    <tr id="jumlah_tingkat_okupansi_tower">
                        <td class="text-left pl-3">Tingkat Okupansi (diisi MKM)</td>
                        <td><input type="text" size="3" name="tingkat_okupansi_1" value="{{$Tingkat_Okupansi[0]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_2" value="{{$Tingkat_Okupansi[1]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_3" value="{{$Tingkat_Okupansi[2]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_4" value="{{$Tingkat_Okupansi[3]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_5" value="{{$Tingkat_Okupansi[4]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_6" value="{{$Tingkat_Okupansi[5]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_7" value="{{$Tingkat_Okupansi[6]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_8" value="{{$Tingkat_Okupansi[7]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_9" value="{{$Tingkat_Okupansi[8]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_10" value="{{$Tingkat_Okupansi[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="tingkat_okupansi_total" value="{{$Tingkat_Okupansi[0]}}"
                                disabled />
                        </td>
                    </tr>

                </table>
            </div>
            @endif









            @if ($data->PROPERTY_TYPE == "Ruko/Rukan")

            <div class="container mt-3 mb-3" id="tower_apartemen">
                <table class="table-input">
                    <tr>
                        <td><b style="margin-left: 17px;">Tower</b></td>

                        {{-- <td><b>Tower</b></td> --}}
                        <td><b>1</b></td>
                        <td><b>2</b></td>
                        <td><b>3</b></td>
                        <td><b>4</b></td>
                        <td><b>5</b></td>
                        <td><b>6</b></td>
                        <td><b>7</b></td>
                        <td><b>8</b></td>
                        <td><b>9</b></td>
                        <td><b>10</b></td>
                        <td><b>Keterangan</b></td>
                    </tr>
                    <tr id="jumlah_lantai_tower">


                        <td class="text-left pl-3">Jumlah Lantai</td>
                        <td><input type="text" size="3" name="jumlah_lantai_1" value="{{$jumlah_lantai[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_2" value="{{$jumlah_lantai[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_3" value="{{$jumlah_lantai[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_4" value="{{$jumlah_lantai[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_5" value="{{$jumlah_lantai[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_6" value="{{$jumlah_lantai[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_7" value="{{$jumlah_lantai[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_8" value="{{$jumlah_lantai[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_9" value="{{$jumlah_lantai[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_lantai_10" value="{{$jumlah_lantai[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_lantai_total" value="{{$jumlah_lantai[0]}}"
                                disabled />
                        </td>


                    </tr>
                    <tr id="jumlah_unit_tower">
                        <td class="text-left pl-3">Jumlah Lantai</td>
                        <td><input type="text" size="3" name="jumlah_unit_1" value="{{$Jumlah_unit[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_2" value="{{$Jumlah_unit[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_3" value="{{$Jumlah_unit[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_4" value="{{$Jumlah_unit[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_5" value="{{$Jumlah_unit[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_6" value="{{$Jumlah_unit[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_7" value="{{$Jumlah_unit[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_8" value="{{$Jumlah_unit[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_9" value="{{$Jumlah_unit[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_10" value="{{$Jumlah_unit[9]}}" disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_unit_total" value="{{$Jumlah_unit[0]}}" disabled />
                        </td>
                    </tr>
                    <tr id="jumlah_yang_dihuni_tower">
                        <td class="text-left pl-3"><span id="text_jumlah_yang_dihuni">Jumlah
                                Yang
                                Terhuni</span></td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_1" value="{{$Jumlah_Yang_di_huni[0]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_2" value="{{$Jumlah_Yang_di_huni[1]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_3" value="{{$Jumlah_Yang_di_huni[2]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_4" value="{{$Jumlah_Yang_di_huni[3]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_5" value="{{$Jumlah_Yang_di_huni[4]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_6" value="{{$Jumlah_Yang_di_huni[5]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_7" value="{{$Jumlah_Yang_di_huni[6]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_8" value="{{$Jumlah_Yang_di_huni[7]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_9" value="{{$Jumlah_Yang_di_huni[8]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_10" value="{{$Jumlah_Yang_di_huni[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_yang_dihuni_total"
                                value="{{$Jumlah_Yang_di_huni[0]}}" disabled />
                        </td>
                    </tr>
                    <tr id="jumlah_tingkat_okupansi_tower">
                        <td class="text-left pl-3">Tingkat Okupansi (diisi MKM)</td>
                        <td><input type="text" size="3" name="tingkat_okupansi_1" value="{{$Tingkat_Okupansi[0]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_2" value="{{$Tingkat_Okupansi[1]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_3" value="{{$Tingkat_Okupansi[2]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_4" value="{{$Tingkat_Okupansi[3]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_5" value="{{$Tingkat_Okupansi[4]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_6" value="{{$Tingkat_Okupansi[5]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_7" value="{{$Tingkat_Okupansi[6]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_8" value="{{$Tingkat_Okupansi[7]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_9" value="{{$Tingkat_Okupansi[8]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_10" value="{{$Tingkat_Okupansi[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="tingkat_okupansi_total" value="{{$Tingkat_Okupansi[0]}}"
                                disabled />
                        </td>
                    </tr>

                </table>
            </div>
            @endif


            @if ($data->PROPERTY_TYPE == "Landed House")

            <div class="container mt-3 mb-3" id="tower_apartemen">
                <table class="table-input">
                    <tr>
                        <td><b style="margin-left: 17px;">Tower</b></td>
                        <td><b>1</b></td>
                        <td><b>2</b></td>
                        <td><b>3</b></td>
                        <td><b>4</b></td>
                        <td><b>5</b></td>
                        <td><b>6</b></td>
                        <td><b>7</b></td>
                        <td><b>8</b></td>
                        <td><b>9</b></td>
                        <td><b>10</b></td>
                        <td><b>Keterangan</b></td>
                    </tr>
                    <tr id="jumlah_lantai_tower">


                    </tr>
                    <tr id="jumlah_unit_tower">
                        <td class="text-left pl-3">Jumlah Unit</td>
                        <td><input type="text" size="3" name="jumlah_unit_1" value="{{$Jumlah_unit[0]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_2" value="{{$Jumlah_unit[1]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_3" value="{{$Jumlah_unit[2]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_4" value="{{$Jumlah_unit[3]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_5" value="{{$Jumlah_unit[4]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_6" value="{{$Jumlah_unit[5]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_7" value="{{$Jumlah_unit[6]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_8" value="{{$Jumlah_unit[7]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_9" value="{{$Jumlah_unit[8]}}" disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_unit_10" value="{{$Jumlah_unit[9]}}" disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_unit_total" value="{{$Jumlah_unit[0]}}" disabled />
                        </td>
                    </tr>
                    <tr id="jumlah_yang_dihuni_tower">
                        <td class="text-left pl-3"><span id="text_jumlah_yang_dihuni">Jumlah
                                Unit Terisi</span></td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_1" value="{{$Jumlah_Yang_di_huni[0]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_2" value="{{$Jumlah_Yang_di_huni[1]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_3" value="{{$Jumlah_Yang_di_huni[2]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_4" value="{{$Jumlah_Yang_di_huni[3]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_5" value="{{$Jumlah_Yang_di_huni[4]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_6" value="{{$Jumlah_Yang_di_huni[5]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_7" value="{{$Jumlah_Yang_di_huni[6]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_8" value="{{$Jumlah_Yang_di_huni[7]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_9" value="{{$Jumlah_Yang_di_huni[8]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="jumlah_yang_dihuni_10" value="{{$Jumlah_Yang_di_huni[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="jumlah_yang_dihuni_total"
                                value="{{$Jumlah_Yang_di_huni[0]}}" disabled />
                        </td>
                    </tr>
                    <tr id="jumlah_tingkat_okupansi_tower">
                        <td class="text-left pl-3">Tingkat Okupansi (diisi MKM)</td>
                        <td><input type="text" size="3" name="tingkat_okupansi_1" value="{{$Tingkat_Okupansi[0]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_2" value="{{$Tingkat_Okupansi[1]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_3" value="{{$Tingkat_Okupansi[2]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_4" value="{{$Tingkat_Okupansi[3]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_5" value="{{$Tingkat_Okupansi[4]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_6" value="{{$Tingkat_Okupansi[5]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_7" value="{{$Tingkat_Okupansi[6]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_8" value="{{$Tingkat_Okupansi[7]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_9" value="{{$Tingkat_Okupansi[8]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="tingkat_okupansi_10" value="{{$Tingkat_Okupansi[9]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="6" name="tingkat_okupansi_total" value="{{$Tingkat_Okupansi[0]}}"
                                disabled />
                        </td>
                    </tr>

                </table>
            </div>
            @endif
        </div>
        <h3 class=" mt-4"><u> ISP EXISTING</u></h3>
        <div class="border mt-2">
            <div class="container mt-3 mb-3">
                <table class="provider">
                    <tr>
                        <td rowspan="2" colspan="2">Provider Existing</td>
                        <td colspan="3">Berikan tanda cek list</td>
                        <td colspan="2">Eksklusif</td>
                        <td rowspan="2">Durasi Kerjasama s/d. Bln/thn</td>
                        <td colspan="3">Skema Kerjasama</td>
                    </tr>
                    <tr>
                        <td>Inet</td>
                        <td>TV</td>
                        <td>Telp.</td>
                        <td>Y</td>
                        <td>N</td>
                        <td>Rev.Share (%)</td>
                        <td>Sewa Lahan(Rp.)</td>
                    </tr>
                    <tr>
                        <td width="20px">1</td>
                        <td><input type="text" size="3" name="Provider_1" value="{{$Provider_Existing[0]}}" disabled />
                        </td>
                        <td><input type="checkbox" size="3" value="Inet" {{ $Inet[0] === "Inet" ? "checked" : "" }}
                                disabled name="Inet_1" disabled />
                        </td>
                        <td><input type="checkbox" size="3" value="TV" {{ $TV[0] === "TV" ? "checked" : "" }} disabled
                                name="TV_1" /></td>
                        <td><input type="checkbox" size="3" value="Telp" {{ $Telp[0] === "Telp" ? "checked" : "" }}
                                name="Telp_1" disabled /></td>
                        <td><input type="radio" size="3" value="YES" {{ $Eksklusif_Y[0] === "YES" ? "checked" : "" }}
                                disabled name="Eksklusif_y_1" id="Eksklusif_y_1" /></td>
                        <td><input type="radio" size="3" value="NO" {{ $Eksklusif_Y[0] === "NO" ? "checked" : "" }}
                                disabled name="Eksklusif_y_1" id="Eksklusif_n_1" /></td>
                        <td><input type="text" size="3" name="Durasi_Kerjasama_1" value="{{$Durasi_Kerjasama[0]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="Rev_Share_1" value="{{$Rev_Share[0]}}" disabled /></td>
                        <td><input type="text" size="3" value="{{$Sewa_Lahan[0]}}" name="Sewa_Lahan_1" disabled /></td>
                    </tr>
                    <tr>
                        <td width="20px">2</td>
                        <td><input type="text" size="3" name="Provider_2" value="{{$Provider_Existing[1]}}" disabled />
                        </td>
                        <td><input type="checkbox" size="3" value="Inet" {{ $Inet[1] === "Inet" ? "checked" : "" }}
                                disabled name="Inet_2" /></td>
                        <td><input type="checkbox" value="TV" {{ $TV[1] === "TV" ? "checked" : "" }} disabled size="3"
                                name="TV_2" /></td>
                        <td><input type="checkbox" size="3" value="Telp" {{ $Telp[1] === "Telp" ? "checked" : "" }}
                                name="Telp_2" disabled /></td>
                        <td><input type="radio" size="3" value="YES" {{ $Eksklusif_Y[1] === "YES" ? "checked" : "" }}
                                disabled name="Eksklusif_y_2" id="Eksklusif_y_2" /></td>
                        <td><input type="radio" size="3" value="NO" {{ $Eksklusif_Y[1] === "NO" ? "checked" : "" }}
                                disabled name="Eksklusif_y_2" id="Eksklusif_n_2" /></td>
                        <td><input type="text" size="3" name="Durasi_Kerjasama_2" value="{{$Durasi_Kerjasama[1]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="Rev_Share_2" value="{{$Rev_Share[1]}}" disabled /></td>
                        <td><input type="text" size="3" value="{{$Sewa_Lahan[1]}}" name="Sewa_Lahan_2" disabled /></td>
                    </tr>
                    <tr>
                        <td width="20px">3</td>
                        <td><input type="text" size="3" name="Provider_3" value="{{$Provider_Existing[2]}}" disabled />
                        </td>
                        <td><input type="checkbox" size="3" value="Inet" {{ $Inet[2] === "Inet" ? "checked" : "" }}
                                disabled name="Inet_3" /></td>
                        <td><input type="checkbox" value="TV" {{ $TV[2] === "TV" ? "checked" : "" }} disabled size="3"
                                name="TV_3" /></td>
                        <td><input type="checkbox" size="3" value="Telp" {{ $Telp[2] === "Telp" ? "checked" : "" }}
                                name="Telp_3" disabled /></td>
                        <td><input type="radio" size="3" value="YES" {{ $Eksklusif_Y[2] === "YES" ? "checked" : "" }}
                                disabled name="Eksklusif_y_3" id="Eksklusif_y_3" /></td>
                        <td><input type="radio" size="3" value="NO" {{ $Eksklusif_Y[2] === "NO" ? "checked" : "" }}
                                disabled name="Eksklusif_y_3" id="Eksklusif_n_3" /></td>
                        <td><input type="text" size="3" name="Durasi_Kerjasama_3" value="{{$Durasi_Kerjasama[2]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="Rev_Share_3" value="{{$Rev_Share[2]}}" disabled /></td>
                        <td><input type="text" size="3" value="{{$Sewa_Lahan[2]}}" name="Sewa_Lahan_3" disabled /></td>
                    </tr>
                    <tr>
                        <td width="20px">4</td>
                        <td><input type="text" size="3" name="Provider_4" value="{{$Provider_Existing[3]}}" disabled />
                        </td>
                        <td><input type="checkbox" size="3" value="Inet" {{ $Inet[3] === "Inet" ? "checked" : "" }}
                                disabled name="Inet_4" /></td>
                        <td><input type="checkbox" value="TV" {{ $TV[3] === "TV" ? "checked" : "" }} disabled size="3"
                                name="TV_4" /></td>
                        <td><input type="checkbox" size="3" value="Telp" {{ $Telp[3] === "Telp" ? "checked" : "" }}
                                name="Telp_4" disabled /></td>
                        <td><input type="radio" size="3" value="YES" {{ $Eksklusif_Y[3] === "YES" ? "checked" : "" }}
                                disabled name="Eksklusif_y_4" id="Eksklusif_y_4" /></td>
                        <td><input type="radio" size="3" value="NO" {{ $Eksklusif_Y[3] === "NO" ? "checked" : "" }}
                                disabled name="Eksklusif_y_4" id="Eksklusif_n_4" disabled /></td>
                        <td><input type="text" size="3" name="Durasi_Kerjasama_4" value="{{$Durasi_Kerjasama[3]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="Rev_Share_4" value="{{$Rev_Share[3]}}" disabled /></td>
                        <td><input type="text" size="3" value="{{$Sewa_Lahan[3]}}" name="Sewa_Lahan_4" disabled /></td>
                    </tr>
                    <tr>
                        <td width="20px">5</td>
                        <td><input type="text" size="3" name="Provider_5" value="{{$Provider_Existing[4]}}" disabled />
                        </td>
                        <td><input type="checkbox" size="3" value="Inet" {{ $Inet[4] === "Inet" ? "checked" : "" }}
                                disabled name="Inet_5" /></td>
                        <td><input type="checkbox" value="TV" {{ $TV[4] === "TV" ? "checked" : "" }} disabled size="3"
                                name="TV_5" /></td>
                        <td><input type="checkbox" size="3" value="Telp" {{ $Telp[4] === "Telp" ? "checked" : "" }}
                                name="Telp_5" disabled /></td>
                        <td><input type="radio" size="3" value="YES" {{ $Eksklusif_Y[4] === "YES" ? "checked" : "" }}
                                disabled name="Eksklusif_y_5" id="Eksklusif_y_5" /></td>
                        <td><input type="radio" size="3" value="NO" {{ $Eksklusif_Y[4] === "NO" ? "checked" : "" }}
                                disabled name="Eksklusif_y_5" id="Eksklusif_n_5" disabled /></td>
                        <td><input type="text" size="3" name="Durasi_Kerjasama_5" value="{{$Durasi_Kerjasama[4]}}"
                                disabled />
                        </td>
                        <td><input type="text" size="3" name="Rev_Share_5" value="{{$Rev_Share[4]}}" disabled /></td>
                        <td><input type="text" size="3" value="{{$Sewa_Lahan[4]}}" name="Sewa_Lahan_5" disabled /></td>
                    </tr>
                </table>
            </div>
            @endif
        </div>
        <h3 class="ml-1 mt-4"> <u> MARKETING TOOLS</u></h3>
        <div class="border ">
            @if ($data->PROGRESS_STATUS != "DESK SURVEY" )
            <div class="container mt-3 mb-3 ">
                <table class="marketing">
                    <tr>
                        <td class="text-left" style="padding: 10px;width: 220px;">
                            Penempatan/Pemasangan/
                            Penyebaran Marketing Tools</td>
                        <td style="padding:10px">Lobby</td>
                        <td style="padding:10px">Basement</td>
                        <td style="width: 100px;">Pintu parkir in/out</td>
                        <td style="width: 80px;">Lift</td>
                        <td>Swm. Pool</td>
                        <td>Fitness Center</td>
                        <td>Cust. Service</td>
                        <td style="padding:10px;">Receptionist</td>
                        <td>Harga</td>
                    </tr>
                    <tr>
                        <td class="text-left" style="padding: 10px;width: 220px;">Aktifitas
                            Sales
                            Probing</td>

                        <td><input type="checkbox" value="aktifitas_lobby"
                                {{ $MARKETING_AKTIFITAS[0] === "aktifitas_lobby" ? "checked" : "" }}
                                id="aktifitas_lobby" name="aktifitas_lobby" disabled>
                        </td>
                        <td><input type="checkbox" value="aktifitas_basemant" id="aktifitas_basemant"
                                name="aktifitas_basemant"
                                {{ $MARKETING_AKTIFITAS[1] === "aktifitas_basemant" ? "checked" : "" }} disabled>
                        </td>
                        <td><input type="checkbox" value="aktifitas_pintu_parkir" id="aktifitas_pintu_parkir"
                                name="aktifitas_pintu_parkir"
                                {{ $MARKETING_AKTIFITAS[2] === "aktifitas_pintu_parkir" ? "checked" : "" }} disabled>
                        </td>
                        <td><input type="checkbox" value="aktifitas_lift" id="aktifitas_lift" name="aktifitas_lift"
                                {{ $MARKETING_AKTIFITAS[3] === "aktifitas_lift" ? "checked" : "" }} disabled>
                        </td>
                        <td><input type="checkbox" value="aktifitas_swmg_pool" id="aktifitas_swmg_pool"
                                name="aktifitas_swmg_pool"
                                {{ $MARKETING_AKTIFITAS[4] === "aktifitas_swmg_pool" ? "checked" : "" }} disabled>
                        </td>
                        <td><input type="checkbox" value="aktifitas_fitness" id="aktifitas_fitness"
                                name="aktifitas_fitness"
                                {{ $MARKETING_AKTIFITAS[5] === "aktifitas_fitness" ? "checked" : "" }} disabled>
                        </td>
                        <td><input type="checkbox" value="aktifitas_mgmt_office" id="aktifitas_mgmt_office"
                                name="aktifitas_mgmt_office"
                                {{ $MARKETING_AKTIFITAS[6] === "aktifitas_mgmt_office" ? "checked" : "" }} disabled>
                        </td>
                        <td><input type="checkbox" value="aktifitas_receptionist" id="aktifitas_receptionist"
                                name="aktifitas_receptionist"
                                {{ $MARKETING_AKTIFITAS[7] === "aktifitas_receptionist" ? "checked" : "" }} disabled>
                        </td>
                        <td><input type="text" name="aktifitas_harga" id="aktifitas_harga" disabled
                                value="{{$MARKETING_AKTIFITAS[8]}}"></td>
                    </tr>
                    <tr>
                        <td class="text-left" style="padding: 10px;width: 220px;">Pop Up Table
                        </td>
                        <td><input type="checkbox" value="POP_UP_TABLE_lobby" id="POP_UP_TABLE_lobby"
                                name="POP_UP_TABLE_lobby" disabled
                                {{ $MARKETING_POP_UP[0] === "POP_UP_TABLE_lobby" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="POP_UP_TABLE_basemant" id="POP_UP_TABLE_basemant"
                                name="POP_UP_TABLE_basemant" disabled
                                {{ $MARKETING_POP_UP[1] === "POP_UP_TABLE_basemant" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="POP_UP_TABLE_pintu_parkir" id="POP_UP_TABLE_pintu_parkir"
                                name="POP_UP_TABLE_pintu_parkir" disabled
                                {{ $MARKETING_POP_UP[2] === "POP_UP_TABLE_pintu_parkir" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="POP_UP_TABLE_lift" id="POP_UP_TABLE_lift"
                                name="POP_UP_TABLE_lift" disabled
                                {{ $MARKETING_POP_UP[3] === "POP_UP_TABLE_lift" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="POP_UP_TABLE_swmg_pool" id="POP_UP_TABLE_swmg_pool"
                                name="POP_UP_TABLE_swmg_pool" disabled
                                {{ $MARKETING_POP_UP[4] === "POP_UP_TABLE_swmg_pool" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="POP_UP_TABLE_fitness" id="POP_UP_TABLE_fitness"
                                name="POP_UP_TABLE_fitness" disabled
                                {{ $MARKETING_POP_UP[5] === "POP_UP_TABLE_fitness" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="POP_UP_TABLE_mgmt_office" id="POP_UP_TABLE_mgmt_office"
                                name="POP_UP_TABLE_mgmt_office" disabled
                                {{ $MARKETING_POP_UP[6] === "POP_UP_TABLE_mgmt_office" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="POP_UP_TABLE_receptionist" id="POP_UP_TABLE_receptionist"
                                name="POP_UP_TABLE_receptionist" disabled
                                {{ $MARKETING_POP_UP[7] === "POP_UP_TABLE_receptionist" ? "checked" : "" }}>
                        </td>
                        <td><input type="text" name="POP_UP_TABLE_harga" id="POP_UP_TABLE_harga"
                                value="{{$MARKETING_POP_UP[8]}}" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="padding: 10px;width: 220px;">Penempatan
                            Spanduk
                        </td>

                        <td><input type="checkbox" value="penempatan_standuk_lobby" id="penempatan_standuk_lobby"
                                name="penempatan_standuk_lobby" disabled
                                {{ $MARKETING_SPANDUK[0] === "penempatan_standuk_lobby" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="penempatan_standuk_basemant" id="penempatan_standuk_basemant"
                                name="penempatan_standuk_basemant" disabled
                                {{ $MARKETING_SPANDUK[1] === "penempatan_standuk_basemant" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="penempatan_standuk_pintu_parkir"
                                id="penempatan_standuk_pintu_parkir" name="penempatan_standuk_pintu_parkir" disabled
                                {{ $MARKETING_SPANDUK[2] === "penempatan_standuk_pintu_parkir" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="penempatan_standuk_lift" id="penempatan_standuk_lift"
                                name="penempatan_standuk_lift" disabled
                                {{ $MARKETING_SPANDUK[3] === "penempatan_standuk_lift" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="penempatan_standuk_swmg_pool"
                                id="penempatan_standuk_swmg_pool" name="penempatan_standuk_swmg_pool" disabled
                                {{ $MARKETING_SPANDUK[4] === "penempatan_standuk_swmg_pool" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="penempatan_standuk_fitness" id="penempatan_standuk_fitness"
                                name="penempatan_standuk_fitness" disabled
                                {{ $MARKETING_SPANDUK[5] === "penempatan_standuk_fitness" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="penempatan_standuk_mgmt_office"
                                id="penempatan_standuk_mgmt_office" name="penempatan_standuk_mgmt_office" disabled
                                {{ $MARKETING_SPANDUK[6] === "penempatan_standuk_mgmt_office" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="penempatan_standuk_receptionist"
                                id="penempatan_standuk_receptionist" name="penempatan_standuk_receptionist" disabled
                                {{ $MARKETING_SPANDUK[7] === "penempatan_standuk_receptionist" ? "checked" : "" }}>
                        </td>
                        <td><input type="text" name="standuk_harga" id="standuk_harga" value="{{$MARKETING_SPANDUK[8]}}"
                                disabled></td>
                    </tr>
                    <tr>
                        <td class="text-left" style="padding: 10px;width: 220px;">Penempatan
                            Poster
                        </td>

                        <td><input type="checkbox" value="Penempatan_Poster_lobby" id="Penempatan_Poster_lobby"
                                name="Penempatan_Poster_lobby" disabled
                                {{ $MARKETING_POSTER[0] === "Penempatan_Poster_lobby" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="Penempatan_Poster_basemant" id="Penempatan_Poster_basemant"
                                name="Penempatan_Poster_basemant" disabled
                                {{ $MARKETING_POSTER[1] === "Penempatan_Poster_basemant" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="Penempatan_Poster_pintu_parkir"
                                id="Penempatan_Poster_pintu_parkir" name="Penempatan_Poster_pintu_parkir" disabled
                                {{ $MARKETING_POSTER[2] === "Penempatan_Poster_pintu_parkir" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="Penempatan_Poster_lift" id="Penempatan_Poster_lift"
                                name="Penempatan_Poster_lift" disabled
                                {{ $MARKETING_POSTER[3] === "Penempatan_Poster_lift" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="Penempatan_Poster_swmg_pool" id="Penempatan_Poster_swmg_pool"
                                name="Penempatan_Poster_swmg_pool" disabled
                                {{ $MARKETING_POSTER[4] === "Penempatan_Poster_swmg_pool" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="Penempatan_Poster_fitness" id="Penempatan_Poster_fitness"
                                name="Penempatan_Poster_fitness" disabled
                                {{ $MARKETING_POSTER[5] === "Penempatan_Poster_fitness" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="Penempatan_Poster_mgmt_office"
                                id="Penempatan_Poster_mgmt_office" name="Penempatan_Poster_mgmt_office" disabled
                                {{ $MARKETING_POSTER[6] === "Penempatan_Poster_mgmt_office" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="Penempatan_Poster_receptionist"
                                id="Penempatan_Poster_receptionist" name="Penempatan_Poster_receptionist" disabled
                                {{ $MARKETING_POSTER[7] === "Penempatan_Poster_receptionist" ? "checked" : "" }}>
                        </td>
                        <td><input type="text" name="Penempatan_Poster_harga" id="Penempatan_Poster_harga"
                                value="{{$MARKETING_POSTER[8]}}" disabled></td>
                    </tr>
                    <tr>

                        <td class="text-left" style="padding: 10px;width: 220px;">Sticker Pintu
                            Lift
                        </td>
                        <td><input type="checkbox" value="sticker_lobby" id="sticker_lobby" name="sticker_lobby"
                                disabled {{ $MARKETING_STICKER[0] === "sticker_lobby" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="sticker_basemant" id="sticker_basemant"
                                name="sticker_basemant" disabled
                                {{ $MARKETING_STICKER[1] === "sticker_basemant" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="sticker_pintu_parkir" id="sticker_pintu_parkir"
                                name="sticker_pintu_parkir" disabled
                                {{ $MARKETING_STICKER[2] === "sticker_pintu_parkir" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="sticker_lift" id="sticker_lift" name="sticker_lift" disabled
                                {{ $MARKETING_STICKER[3] === "sticker_lift" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="sticker_swmg_pool" id="sticker_swmg_pool"
                                name="sticker_swmg_pool" disabled
                                {{ $MARKETING_STICKER[4] === "sticker_swmg_pool" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="sticker_fitness" id="sticker_fitness" name="sticker_fitness"
                                disabled {{ $MARKETING_STICKER[5] === "sticker_fitness" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="sticker_mgmt_office" id="sticker_mgmt_office"
                                name="sticker_mgmt_office" disabled
                                {{ $MARKETING_STICKER[6] === "sticker_mgmt_office" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="sticker_receptionist" id="sticker_receptionist"
                                name="sticker_receptionist" disabled
                                {{ $MARKETING_STICKER[7] === "sticker_receptionist" ? "checked" : "" }}>
                        </td>
                        <td><input type="text" name="sticker_harga" id="sticker_harga" value="{{$MARKETING_STICKER[8]}}"
                                disabled></td>
                    </tr>
                    <tr>

                        <td class="text-left" style="padding: 10px;width: 220px;">X/Roll Up
                            Banner
                        </td>
                        <td><input type="checkbox" value="roll_up_lobby" id="roll_up_lobby" name="roll_up_lobby"
                                disabled {{ $MARKETING_ROLL[0] === "roll_up_lobby" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="roll_up_basemant" id="roll_up_basemant"
                                name="roll_up_basemant" disabled
                                {{ $MARKETING_ROLL[1] === "roll_up_basemant" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="roll_up_pintu_parkir" id="roll_up_pintu_parkir"
                                name="roll_up_pintu_parkir" disabled
                                {{ $MARKETING_ROLL[2] === "roll_up_pintu_parkir" ? "checked" : "" }}>

                        </td>
                        <td><input type="checkbox" value="roll_up_lift" id="roll_up_lift" name="roll_up_lift" disabled
                                {{ $MARKETING_ROLL[3] === "roll_up_lift" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="roll_up_swmg_pool" id="roll_up_swmg_pool"
                                name="roll_up_swmg_pool" disabled
                                {{ $MARKETING_ROLL[4] === "roll_up_swmg_pool" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="roll_up_fitness" id="roll_up_fitness" name="roll_up_fitness"
                                disabled {{ $MARKETING_ROLL[5] === "roll_up_fitness" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="roll_up_mgmt_office" id="roll_up_mgmt_office"
                                name="roll_up_mgmt_office" disabled
                                {{ $MARKETING_ROLL[6] === "roll_up_mgmt_office" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="roll_up_receptionist" id="roll_up_receptionist"
                                name="roll_up_receptionist" disabled
                                {{ $MARKETING_ROLL[7] === "roll_up_receptionist" ? "checked" : "" }}>
                        </td>
                        <td><input type="text" name="roll_up_harga" id="roll_up_harga" value="{{$MARKETING_ROLL[8]}}"
                                disabled>
                        </td>
                    </tr>
                    <tr>

                        <td class="text-left" style="padding: 10px;width: 220px;">Acrilic Box
                            /Brosur
                        </td>
                        <td><input type="checkbox" value="acrilic_lobby" id="acrilic_lobby" name="acrilic_lobby"
                                disabled {{ $MARKETING_ACRILIC[0] === "acrilic_lobby" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="acrilic_basemant" id="acrilic_basemant"
                                name="acrilic_basemant" disabled
                                {{ $MARKETING_ACRILIC[1] === "acrilic_basemant" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="acrilic_pintu_parkir" id="acrilic_pintu_parkir"
                                name="acrilic_pintu_parkir" disabled
                                {{ $MARKETING_ACRILIC[2] === "acrilic_pintu_parkir" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="acrilic_lift" id="acrilic_lift" name="acrilic_lift" disabled
                                {{ $MARKETING_ACRILIC[3] === "acrilic_lift" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="acrilic_swmg_pool" id="acrilic_swmg_pool"
                                name="acrilic_swmg_pool" disabled
                                {{ $MARKETING_ACRILIC[4] === "acrilic_swmg_pool" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="acrilic_fitness" id="acrilic_fitness" name="acrilic_fitness"
                                disabled {{ $MARKETING_ACRILIC[5] === "acrilic_mgmt_office" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="acrilic_mgmt_office" id="acrilic_mgmt_office"
                                name="acrilic_mgmt_office" disabled
                                {{ $MARKETING_ACRILIC[6] === "acrilic_receptionist" ? "checked" : "" }}>
                        </td>
                        <td><input type="checkbox" value="acrilic_receptionist" id="acrilic_receptionist"
                                name="acrilic_receptionist" disabled
                                {{ $MARKETING_ACRILIC[7] === "acrilic_receptionist" ? "checked" : "" }}>
                        </td>
                        <td><input type="text" name="acrilic_harga" id="acrilic_harga"
                                value=" {{ $MARKETING_ACRILIC[8]}}" disabled></td>
                    </tr>

                </table>
            </div>
        </div>
        <h3 class="ml-1 mt-4"> <u>PNL</u></h3>
        <div class="border mt-3 mb-3">
            <div class="container mt-3 mb-3" id="tower_apartemen">
                <table class="table-input">
                    <tr>
                        <td><b>HP</b></td>
                        <td><b>Periode Kerjasama (thn)</b></td>
                        <td><b>Status Kerjasama</b></td>
                        <td><b>Tingkat Okupansi</b></td>
                        <td><b>Target dari Occp Based</b></td>
                        <td><b>COGS(Rp)</b></td>
                        <td><b>Rev Share(%)</b></td>
                        <td><b>Rev Share(Rp)</b></td>
                        <td><b>Biaya Sewa</b></td>
                    </tr>
                    <tr id="jumlah_lantai_tower">

                        <td><input type="text" size="4" name="jumlah_lantai_1" value="{{$data->HP_PNL}}" disabled />
                        </td>
                        <td><input type="text" size="9" name="jumlah_lantai_2" value="{{$data->Periode_kerjasama}}"
                                disabled />
                        </td>
                        <td><input type="text" size="9" name="jumlah_lantai_3"
                                value="{{ $data->EXCLUSIVE === "YES" ? "Exclusive" : "Not Exclusive" }}" disabled />
                        </td>
                        <td><input type="text" size="9" name="jumlah_lantai_4" value="{{$data->Tingkat_Okupansi_PNL}}"
                                disabled />
                        </td>
                        <td><input type="text" size="9" name="jumlah_lantai_5" value="{{$data->Occp_Based}}" disabled />
                        </td>
                        <td><input type="text" size="9" name="jumlah_lantai_6" value="{{$data->COGS}}" disabled />
                        </td>
                        <td><input type="text" size="9" name="jumlah_lantai_7" value="{{$data->Revenue_Share_persen}}"
                                disabled />
                        </td>
                        <td><input type="text" size="9" name="jumlah_lantai_8" value="{{$data->Revenue_Share_rp}}"
                                disabled />
                        </td>
                        <td><input type="text" size="9" name="jumlah_lantai_9" value="{{$data->Biaya_Sewa}}" disabled />
                        </td>

                    </tr>
                </table>
            </div>
            <div class="container mt-3 mb-3" id="tower_apartemen">
                <table class="table-input">
                    <tr>
                        <td><b>Total Revenue(Rp) (Biaya)</b></td>
                        <td><b>Investasi (Biaya)</b></td>
                        <td><b>CPE Cost (STB+ONT+OW) (Rp) (Biaya)</b></td>
                        <td><b>by Total Duration (Rp) (Margin)</b></td>
                        <td><b>Persentase (%) (Margin)</b></td>
                        <td><b>Breakeven Point(thn) (Margin)</b></td>
                    </tr>
                    <tr id="jumlah_lantai_tower">

                        <td><input type="text" size="15" name="jumlah_lantai_1" value="{{$data->Total_Revenue}}"
                                disabled />
                        </td>
                        <td><input type="text" size="15" name="jumlah_lantai_2" value="{{$data->Investasi}}" disabled />
                        </td>
                        <td><input type="text" size="15" name="jumlah_lantai_3" value="{{$data->cpe_cost}}" disabled />
                        </td>
                        <td><input type="text" size="15" name="jumlah_lantai_4"
                                value="{{$data->margin_by_total_duration}}" disabled />
                        </td>
                        <td><input type="text" size="15" name="jumlah_lantai_5" value="{{$data->margin_persen}}"
                                disabled />
                        </td>
                        <td><input type="text" size="15" name="jumlah_lantai_6" value="{{$data->breakeven_point}}"
                                disabled />
                        </td>


                    </tr>
                </table>
            </div>
        </div>
        @endif
</body>
<script src="{{asset('js/app.js')}}" />
// <script>
</script>
<script>
    window.print();



    // window.onafterprint = function(){
    //     window.close();
    // // console.log("Printing completed...");
    // }
</script>
{{-- <script>
    $("#tower_apartemen").hide();
    $.ajax({
type: "GET",
url:'/cek/provinsi/'+{{$data->PROVINCE}},
success: function(data_1) {
$('#PROVINCE').text(data_1.name);
console.log(data_1.name);
}
})

$.ajax({
type: "GET",
url:'/cek/CekKota/'+{{$data->CITY}},
success: function(data_1) {
$('#CITY').text(data_1.name);
console.log(data_1.name);
}
})

$.ajax({
type: "GET",
url:'/cek/CekWilayah/'+{{$data->SUBDISTRICT}},
success: function(data_1) {
$('#SUBDISTRICT').text(data_1.name);
console.log(data_1.name);
}
})
</script> --}}

</html>