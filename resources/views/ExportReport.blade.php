       @php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=ReportBusdev.xls");
        @endphp
<table border="1">
    <thead>
        <tr>
        
            {{-- <th>BUILDING NAME</th>
            <th>PIC MNC</th>
            <th>PROGRESS STATUS</th>
            <th>COLOR MAP</th>
            <th>ADDRESS</th>
            <th>PROVINCE</th>
            <th>CITY</th>
            <th>SUBDISTRICT</th>
            <th>COORDINATE</th>
            <th>PROPERTY TYPE</th>
            <th>DEVELOPER/COMPANY NAME</th>
            <th>NAME</th>
            <th>Email 1</th>
            <th>Email 2</th>
            <th>PHONE OFFICE</th>
            <th>PHONE MOBILE</th>
            <th>Bersedia Re-Wiring FTTH</th>
            <th>Pengelolah bersedia melakukan perapihan ke penghuni</th>
            <th>Type Unit</th>
            <th>Average Harga Unit</th>
            <th>Main Hole Ready</th>
            <th>Biaya perapihan ditagih langsung ke penghuni</th>
            <th>Layanan Yang Disediakan MKM</th>
            <th>Komposisi Kewarganegaraan Penghun</th>
            <th>Jenis Pekerjaan</th>
            <th>Status Penghuni</th>
            <th>Main Hole Ready</th>
            <th>Berapa harga rata-rata berlangganan internet per-bulan</th>
            <th>Pengelola berkenan untuk membantu penjualan?</th>
            <th>Infrastruktu</th>
            <th>Main Hole Read</th>
            <th>Pembangunan Infrastruktur s/d</th>
            <th>Metode Pembangunan Infrastruktu</th>
            <th>Metode Pembangunan Infrastruktur</th>
            <th>Internet Service</th>
            <th>Presentase Operasional Rukan / SOHO</th>
            <th>Mayoritas Jenis Usaha</th>
             --}}

                                                <th style="padding:10px; background-color:#0293B6;color:white; "
                                                        width="10%">BUILDING NAME</th>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">PIC MNC
                                                </th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        PROGRESS STATUS</th>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">COLOR
                                                        MAP</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">ADDRESS
                                                </th>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">
                                                        PROVINCE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">CITY
                                                </th>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">
                                                        SUBDISTRICT</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        COORDINATE</th>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">
                                                        PROPERTY TYPE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        DEVELOPER/COMPANY
                                                        NAME
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">NAME
                                                </th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">Email 1
                                                </th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">Email 2
                                                </th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">PHONE
                                                        OFFICE</th>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">PHONE
                                                        MOBILE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Bersedia Re-Wiring FTTH</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Pengelolah bersedia melakukan perapihan ke penghuni</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Type Unit</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Average Harga Unit</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Infrastruktur</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                                Main Hole Ready</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Biaya perapihan ditagih langsung ke penghuni</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Layanan Yang Disediakan MKM</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Komposisi Kewarganegaraan Penghuni</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Jenis Pekerjaan</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Status Penghuni</th>


                                              
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Berapa harga rata-rata berlangganan internet per-bulan</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Pengelola berkenan untuk membantu penjualan?</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Infrastruktur</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Pembangunan Infrastruktur s/d.</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Internet Service</th>
                                                
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Mayoritas Jenis Usaha</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Berapa harga rata-rata berlangganan internet per-bulan</th>
                                              
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Pengelola berkenan untuk membantu penjualan?</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Infrastruktur</th>
                                                
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Pembangunan Infrastruktur s/d.</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Metode Pembangunan Infrastruktur</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Metode Pembangunan Infrastruktur</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Internet Service</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Presentase Operasional Rukan / SOHO</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Mayoritas Jenis Usaha</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Pengelola berkenan untuk membantu penjualan?</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Average Harga Unit</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Infrastruktur</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Metode Pembangunan Infrastruktur</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Pembangunan Infrastruktur s/d.</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Internet Service</th>
       
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Jenis Pekerjaan</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Status Penghuni</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        SUBMIT PROPOSAL DATE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        BUSDEV SIGNED DATE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        BM SIGNED DATE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        EXCLUSIVE</th>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">REVENUE
                                                        SHARE</th>
                                                <th style="padding:10px; background-color:#0293B6;color:white; ">RENTAL
                                                        BASE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">ONE
                                                        TIME FEE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">FREE
                                                        SERVICES</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">FREE
                                                        SERVICES 2</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">FREE
                                                        WIFI</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        BUSDEV_SIGNED</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">BM
                                                        SIGNED</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">SALES
                                                        SIGNED</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">GM
                                                        SALES SIGNED</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        RECOMMENDATION</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">SITE
                                                        SURVEY DATE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">BOQ
                                                        RECEIVED DATE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">PNL
                                                        FULL SIGN DATE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Tingkat Okupansi</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Target dari Occp Based</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Rev Share(%)</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Rev Share(Rp)</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">Biaya
                                                        Sewa</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">Total
                                                        Biaya</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">Total
                                                        Revenue(Rp)</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Investasi</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        CPE Cost (STB+ONT+OW) (Rp)</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        by Total Duration (Rp) (Margin)</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Persentase (%) (Margin)</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        Breakeven Point (%) (Margin)</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">SIGNED
                                                        PKS DATE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">WO DATE
                                                </th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">PKS
                                                        DATE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">PKS END
                                                </th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        CONTRACT DURATION</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">HP
                                                        (PORT)</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">NO PKS
                                                </th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">REJECT
                                                        CODE</th>
                                                <th style=" padding:10px; background-color:#0293B6;color:white;">
                                                        BASO/BAST No.</th>

</tr>
       
    </thead>
    <tbody>
        @foreach($report as $data)
             @php
        $Provider_Existing = explode(",",$data->Provider_Existing);
        $Inet = explode(",",$data->Inet);
        $TV = explode(",",$data->TV);
        $Telp = explode(",",$data->Telp);
        $Eksklusif_Y = explode(",",$data->Eksklusif_Y);
        $Durasi_Kerjasama = explode(",",$data->Durasi_Kerjasama);
        $Rev_Share = explode(",",$data->Rev_Share);
        $Sewa_Lahan = explode(",",$data->Sewa_Lahan);
        $INFRASTRUKTUR_KEPEMILIKAN = explode(",",$data->INFRASTRUKTUR_KEPEMILIKAN);

        $KEWARGA_NEGARAAN_PENGHUNI = explode(",",$data->KEWARGA_NEGARAAN_PENGHUNI);
        $STATUS_PENGHUNI = explode(",",$data->STATUS_PENGHUNI);
        $Mayoritas_Jenis_Usaha = explode(",",$data->Mayoritas_Jenis_Usaha);
        $TYPE_UNIT = explode(",",$data->TYPE_UNIT);
        $LAYANAN_YANG_DI_SEDIAKAN_MKM = explode(",",$data->LAYANAN_YANG_DI_SEDIAKAN_MKM);
        $JENIS_PEKERJAAN = explode(",",$data->JENIS_PEKERJAAN);
        $Presentase_Operasional = explode(",",$data->Presentase_Operasional);

        $MARKETING_AKTIFITAS = explode(",",$data->MARKETING_AKTIFITAS);
        $MARKETING_POP_UP = explode(",",$data->MARKETING_POP_UP);
        $MARKETING_SPANDUK = explode(",",$data->MARKETING_SPANDUK);
        $MARKETING_POSTER = explode(",",$data->MARKETING_POSTER);
        $MARKETING_STICKER = explode(",",$data->MARKETING_STICKER);
        $MARKETING_ROLL = explode(",",$data->MARKETING_ROLL);
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
        <tbody>
            <tr>

                        
                            <td width="30%">{{$data->BUILDING_NAME}}</td>
                       
                        
                            <td>{{$data->PIC_MNC}}</td>
                       
                        
                            <td>{{$data->PROGRESS_STATUS}}</td>
                       
                        
                            <td>{{$data->COLOR_MAP_ONLINE}}</td>
                       
                        
                            <td>{{$data->ADDRESS}}</td>
                       
                    
                        
                            <td> <span id="PROVINCE">{{$data->PROVINCE}}</span></td>
                       
                        
                            <td> <span id="CITY">{{$data->CITY}}</span>
                            </td>
                       
                        
                            <td> <span id="SUBDISTRICT">{{$data->SUBDISTRICT}}</span></td>
                       
                        
                            <td id="COORDINATE">{{$data->COORDINATE}}</td>
                       
                        
                            <td>{{$data->PROPERTY_TYPE}}</td>
                       
                        
                            <td>{{$data->DEVELOPERORCOMPANY_NAME}}</td>
                       
                    
                        
                            <td>{{$data->NAME}}</td>
                       
                        
                            <td>{{$data->EMAIL}}</td>
                       
                        
                            <td>{{$data->EMAIL_1}}</td>
                       
                        
                            <td>{{$data->PHONEORMOBILE}}</td>
                       
                        
                            <td>{{$data->MOBILEPHONE}}</td>
                       
                    
                    
                    
                        {{-- 
                                                                    <th style="padding:10px; background-color:#0293B6;color:white; ">TOTAL
                                                                            OCCUPANCY</th>
                                                                    <td>{{$data->TOTAL_OCCUPANCY}}</td>
                        --}}
                        {{-- 
                                                            
                                                                    <th style="padding:10px; background-color:#0293B6;color:white; ">
                                                                            Bersedia Re-Wiring FTTH</th>
                                                                    <td>{{$data->RE_WIRING_FTTH}}</td>
                        --}}
                        {{-- 
                                                                    <th style="padding:10px; background-color:#0293B6;color:white; ">
                                                                            Pengelolah bersedia melakukan
                                                                            perapihan ke penghuni</th>
                                                                    <td>{{$data->PENGELOLA_BERSEDIA_MELAKUKAN_PERAPIHAN_INSTALASI}}
                        </td>
                        --}}
                        {{-- 
                                                                    <th style="padding:10px; background-color:#0293B6;color:white; border-bottom:1px solid white;border-top:1px solid white"
                                                                            class="h5">Tower ke
                                                                            {{ $loop->iteration }}
                        </th>
                       
                        
                            <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                                Lantai</th>
                            <td>{{$data->Jumlah_Lantai}}</td>
                       
                        
                            <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                                unit</th>
                            <td>{{$data->Jumlah_unit}}</td>
                       
                        
                            <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                                Yang di huni</th>
                            <td>{{$data->Jumlah_Yang_di_huni}}</td>
                       
                        
                            <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                                Tingkat Okupansi</th>
                            <td>{{$data->Jumlah_Tingkat_Okupansi}}</td>
                       
                        
                            <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                                Unit Area Komersial</th>
                            <td>{{$data->Jumlah_Unit_Area_Komersial}}</td>
                       
                        
                            <th style="padding:10px; background-color:#0293B6;color:white; ">Jumlah
                                Kendaraan Terdaftar</th>
                            <td>{{$data->Jumlah_Kendaraan_Terdaftar}}</td>
                        --}}
                        
                            <td>{{$data->RE_WIRING_FTTH}}</td>
                       
                        
                            <td>{{$data->PENGELOLA_BERSEDIA_MELAKUKAN_PERAPIHAN_INSTALASI}}
                            </td>
                       
                        
                            <td>
                            @if ($data->TYPE_UNIT != null)
                                    Studio =
                                {{$TYPE_UNIT[0]}}1 BR =
                                {{$TYPE_UNIT[1]}}2 BR =
                                {{$TYPE_UNIT[2]}}3 BR =
                                {{$TYPE_UNIT[3]}}Penthouse =
                                {{$TYPE_UNIT[4]}}
                                @else
                        </td>
                            @endif
                       
                        
                            <td> Terendah = {{$data->HARGA_UNIT_TERENDAH}}
                                Tertinggi = {{$data->HARGA_UNIT_TERTINGGI}}
                            </td>
                       
                        
                            <td>
                                    @if ($data->INFRASTRUKTUR_TERSEDIA != null)
                                        
                                 @php
                                $data_1 = $data->INFRASTRUKTUR_TERSEDIA;
                                $data_0 = $data->INFRASTRUKTUR_KEPEMILIKAN;
                                $data_0 = explode(",",$data_0);
                                $data_1 = explode(",",$data_1);
                                $all_data = [];
                                for ($i=0; $i < 3 ; $i++) { if(preg_match("/{$data_1[$i]}/i", $data_0[$i])) { $all_data[$i]=$data_0[$i]; } }
                                    $all_data=implode(", ",$all_data);
                                                                                                                                   @endphp
                                                                            {{$all_data}}
                     @endif                     
                    
                                                                    </td>
                                                           
                                                            
                    
                    
                            <td>
                                Di Unit = {{$MAIN_HOLE_READY_UNIT[0]}}
                                Di Koridor = {{$data->MAIN_HOLE_READY_KORIDOR}}
                    
                    
                            </td>
                       
                        
                            <td>
                             {{-- {{dd($BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI)}}     --}}
                                @if ($BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI[0] != null)
                                    {{$BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI[0]}},
                                    {{$BIAYA_PERAPIHAN_DITAGIH_LANGSUNG_KE_PENGHUNI[1]}}
                                    

                                    @endif
                    
                    
                            </td>
                       
                        
                            <td>
                                @if ( $LAYANAN_YANG_DI_SEDIAKAN_MKM[0] != null)
                                1. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[0]}}
                                2. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[1]}}
                                3. {{$LAYANAN_YANG_DI_SEDIAKAN_MKM[2]}}
                                @endif 
                    
                            </td>
                       
                        
                            <td>
                                    @if ($KEWARGA_NEGARAAN_PENGHUNI[0] != null)
                                    Expatriat = {{$KEWARGA_NEGARAAN_PENGHUNI[0]."%"}}
                                    Mayoritas Negara
                                    = {{$KEWARGA_NEGARAAN_PENGHUNI[1]}}
                                    Indonesia = {{$KEWARGA_NEGARAAN_PENGHUNI[2]."%"}}
                                    @endif
                          
                            </td>
                       
                        
                            <td>
                                @if ($JENIS_PEKERJAAN[0] != null)
                                Mahasiswa = {{$JENIS_PEKERJAAN[0]."%"}}
                                Karyawan
                                = {{$JENIS_PEKERJAAN[1]}}
                                Pengusaha = {{$JENIS_PEKERJAAN[2]."%"}}
                                @endif
                            </td>
                       
                        
                            <td>
                                    @if ($STATUS_PENGHUNI[0] != null)
                                    Single = {{$STATUS_PENGHUNI[0]."%"}}
                                    Keluarga = {{$STATUS_PENGHUNI[1]."%"}}
                                    @endif
                            </td>
                       
                    
                        
                    
                            <td>
                                    {{-- {{dd($MAIN_HOLE_READY_UNIT)}} --}}
                                    @if ($MAIN_HOLE_READY_UNIT[0] != null)
                                    Main Hole Ready =
                                    {{$MAIN_HOLE_READY_UNIT[1]}}
                                    @endif
                            </td>
                       
                        
                    
                            <td>
                                
                                {{$data->rata_rata}}
                            </td>
                       
                        
                    
                            <td>
                                
                                {{$data->Membantu_Penjualan}}
                            </td>
                       
                        
                    
                            <td>
                                
                                {{$data->INFRASTRUKTUR_TERSEDIA}}
                            </td>
                       
                        
                    
                            <td>
                                
                                {{$data->Pembangunan_Infrastruktur}}
                            </td>
                       
                    
                        
                            <td>
                                
                                {{$data->Internet_Service}}
                            </td>
                       
                        
                    
                       
                        
                                @if ($Mayoritas_Jenis_Usaha[0] != null)
                                Distributor({{$Mayoritas_Jenis_Usaha[0]}}),Resto/Cafe({{$Mayoritas_Jenis_Usaha[1]}}),Bank({{$Mayoritas_Jenis_Usaha[2]}}),Mini
                                Market
                                /Apotek({{$Mayoritas_Jenis_Usaha[3]}}),Tour &
                                Travel({{$Mayoritas_Jenis_Usaha[4]}}),Lembaga
                    
                                Pendidikan({{$Mayoritas_Jenis_Usaha[5]}}),Konsultan
                                Non legal &
                                Legal({{$Mayoritas_Jenis_Usaha[6]}}),Modern Market /Hyper
                                Store({{$Mayoritas_Jenis_Usaha[7]}}),ATPM/Principle({{$Mayoritas_Jenis_Usaha[8]}}),
                                Expedisi({{$Mayoritas_Jenis_Usaha[9]}}),Others({{$Mayoritas_Jenis_Usaha[10]}})
                                @endif
                            </td>
                       
                        
                    
                            <td>
                                
                                {{$data->rata_rata}}
                    
                    
                            </td>
                       
                        
                    
                    
                           
                       
                        
                            <td>
                                
                                {{$data->Membantu_Penjualan}}
                    
                    
                            </td>
                       
                        
                    
                            <td>
                                
                                {{$data->INFRASTRUKTUR_TERSEDIA}}
                            </td>
                       
                        
                    
                            <td>
                                Di Unit = {{$MAIN_HOLE_READY_UNIT[0]}}
                                Di Koridor =
                                {{$data->MAIN_HOLE_READY_KORIDOR}}
                            </td>
                       
                        
                    
                    
                            <td>
                                
                                {{$data->Pembangunan_Infrastruktur}}
                            </td>
                       
                    
                        
                            <td>
                                
                                {{$data->Metode_Pembangunan_Infrastruktur}}
                            </td>
                       
                    
                    
                    
                        
                            <td>
                                
                                {{$data->Metode_Pembangunan_Infrastruktur}}
                            </td>
                       
                    
                    
                    
                        
                    
                            <td>
                                
                                {{$data->Internet_Service}}
                            </td>
                       
                        
                            <td>
                                    @if ($Presentase_Operasional[0] != null)
                                    Weekday =
                                    {{$data->Presentase_Operasional[0]."%"}}
                                    Weekend, Sabtu =
                                    {{$data->Presentase_Operasional[1]."%"}}
                                    Minggu =
                                    {{$data->Presentase_Operasional[2]."%"}}
                                    @endif
                            </td>
                    
                       
                        
                            <td>
                                    @if ($Mayoritas_Jenis_Usaha[0] != null)
                                        
                                Distributor({{$Mayoritas_Jenis_Usaha[0]}}),Resto/Cafe({{$Mayoritas_Jenis_Usaha[1]}}),Bank({{$Mayoritas_Jenis_Usaha[2]}}),Mini
                                Market
                                /Apotek({{$Mayoritas_Jenis_Usaha[3]}}),Tour &
                                Travel({{$Mayoritas_Jenis_Usaha[4]}}),Lembaga
                    
                                Pendidikan({{$Mayoritas_Jenis_Usaha[5]}}),Konsultan
                                Non legal &
                                Legal({{$Mayoritas_Jenis_Usaha[6]}}),Modern Market /Hyper
                                Store({{$Mayoritas_Jenis_Usaha[7]}}),ATPM/Principle({{$Mayoritas_Jenis_Usaha[8]}}),
                                Expedisi({{$Mayoritas_Jenis_Usaha[9]}}),Others({{$Mayoritas_Jenis_Usaha[10]}})
                        @endif                          
                        </td>
                       
                        
                            <td>
                                
                                {{$data->Membantu_Penjualan}}
                            </td>
                       
                        
                            <td> Terendah = {{$data->HARGA_UNIT_TERENDAH}}
                                Tertinggi = {{$data->HARGA_UNIT_TERTINGGI}}
                            </td>
                       
                        
                    
                    
                            <td>
                                {{$data->INFRASTRUKTUR_TERSEDIA}}
                    
                    
                            </td>
                       
                        
                    
                            <td>
                                
                                {{$data->Metode_Pembangunan_Infrastruktur}}
                            </td>
                       
                        
                    
                            <td>
                                
                                {{$data->Pembangunan_Infrastruktur_landed_house}}
                    
                            </td>
                       
                        
                    
                            <td>
                                
                                {{$data->Internet_Service}}
                            </td>
                       
                        
                    
                    
                     
                       
                        
                    
                            <td>
                                    @if ($JENIS_PEKERJAAN[0] != null)
                                    Mahasiswa = {{$JENIS_PEKERJAAN[0]."%"}}
                                    Karyawan
                                    = {{$JENIS_PEKERJAAN[1]}}
                                    Pengusaha = {{$JENIS_PEKERJAAN[2]."%"}}
                                    @endif
                            </td>
                       
                        
                    
                    
                            <td>
                                    @if ($STATUS_PENGHUNI[0] != null)
                                    Single = {{$STATUS_PENGHUNI[0]."%"}}
                                    Pasangan Muda = {{$STATUS_PENGHUNI[1]."%"}}
                                    Usia > 45 Thn = {{$STATUS_PENGHUNI[2]."%"}}
                                    @endif
                            </td>
                       
                    
                        
                            <td>{{$data->SUBMIT_PROPOSAL_DATE}}</td>
                       
                        
                            <td>{{$data->BUSDEV_SIGNED}}</td>
                       
                        
                            <td>{{$data->BM_SIGNED}}</td>
                       
                        
                            <td>{{$data->EXCLUSIVE}}</td>
                       
                        
                            <td>{{$data->REVENUE_SHARE}}%</td>
                       
                        
                            <td>{{$data->RENTAL_BASE}} </td>
                       
                        
                            <td>{{$data->ONE_TIME_FEE}}</td>
                       
                        
                            <td>{{$data->FREE_SERVICES}}</td>
                       
                        @php
                        $free_services_1 = (explode(" ",$data->FREE_SERVICES_1))
                        @endphp
                        @if ($free_services_1[0] != "")
                        
                            <td>{{$data->FREE_SERVICES_1}}</td>
                       
                        @endif
                        
                            <td>{{$data->FREE_WIFI}}</td>
                       
                    
                    
                        
                            <td>{{$data->BUSDEV_SIGNED}}</td>
                       
                        
                            <td>{{$data->BM_SIGNED}}</td>
                       
                        
                            <td>{{$data->SALES_SIGNED}}</td>
                       
                        
                            <td>{{$data->GM_SALES_SIGNED}}</td>
                       
                        
                            <td>{{$data->RECOMMENDATION}}</td>
                       
                        
                            <td>{{$data->SITE_SURVEY_DATE}}</td>
                       
                        
                            <td>{{$data->BOQ_RECEIVED_DATE}}</td>
                       
                        
                    
                        
                            <td>{{$data->PNL_FULL_SIGN_DATE}}</td>
                       
                        
                            <td>{{$data->Tingkat_Okupansi_PNL}}</td>
                       
                        
                            <td>{{$data->Occp_Based}}</td>
                       
                        
                            <td>{{$data->Revenue_Share_persen . "%"}}</td>
                       
                        
                            <td>{{$data->Revenue_Share_rp}}</td>
                       
                    
                        
                            <td>{{$data->Biaya_Sewa}}</td>
                       
                    
                        
                            <td>{{$data->total_biaya}}</td>
                       
                        
                            <td>{{$data->Total_Revenue}}</td>
                       
                        
                            <td>{{$data->Investasi}}</td>
                       
                        
                            <td>{{$data->cpe_cost}}</td>
                       
                        
                            <td>{{$data->margin_by_total_duration}}</td>
                       
                        
                            <td>{{$data->margin_persen."%"}}</td>
                       
                        
                            <td>{{$data->breakeven_point."%"}}</td>
                       
                    
                        
                            <td>{{$data->PKS_DATE}} </td>
                       
                        
                            <td>{{$data->WO_DATE}} </td>
                       
                    
                        
                            <td>{{$data->BASO_DATE}}</td>
                       
                    
                        
                            <td>{{$data->PKS_END}}</td>
                       
                        
                            <td>{{$data->CONTRACT_DURATION." Years"}} </td>
                       
                        
                            <td>{{$data->HP_PORT}}</td>
                       
                        
                            <td>{{$data->NO_PKS}}</td>
                       
                        
                            <td>{{$data->REJECT_CODE}}</td>
                       
                        
                            <td>{{$data->BASOORBAST_No}}</td>
            </tr>                       
        @endforeach
    </tbody>
</table>