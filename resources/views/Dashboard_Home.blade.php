@extends('layouts.admin')
@section('content')
<div class="tab-content" id="myTabContent">
    <div class="card">
        <div class="card-body" style="padding-top:0px">

            <div class="row">
                <div class="col-md-9">
                    <h4 class="mt-4 mb-3"> <b>Ready To Sell {{date("Y")}}</b> <span
                            style="font-size:15px">({{Count($lastData)}}
                            PROPERTY, {{$total_hp_tahun}} HP)</span></h4>
                    <table class="table table-bordered  table-sm mt-5" id="users-table" style="margin:0px;">
                        <thead>
                            <tr>
                                <td style=" background-color:#007bff;color:white">Building</td>
                                <td style=" background-color:#007bff;color:white">Area</td>
                                <td style=" background-color:#007bff;color:white">Contract</td>
                                <td style="background-color:#007bff;color:white">HP</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastData as $data)
                            <tr>
                                <td>{{$data->BUILDING_NAME}}</td>
                                <td>
                                {{-- {{dd()}} --}}

                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`id` = $data->id")) == 1)
                                    Jakarta 1
                                    @elseif (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`id` = $data->id")) == 1)
                                    Jakarta 2
                                    @elseif(Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`id` = $data->id")) == 1)
                                    Jakarta 3
                                    @elseif(Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`id` = $data->id")) == 1)
                                    Semarang
                                    @elseif(Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`id` = $data->id")) == 1)
                                    Surabaya
                                    @endif

                                </td>
                                <td>{{$data->DEAL_YEAR}}</td>

                                <td>{{$data->HP_PORT}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class=" table table-bordered table-sm " style="height:100px; margin-top:20px; ">
                        <thead>
                            <tr>
                                <td class="text-center" style=" background-color:#007bff;color:white">AREA</td>
                                <td class="text-center" style=" background-color:#007bff;color:white">ROLL OUT</td>
                                <td class="text-center" style=" background-color:#007bff;color:white">PKS REVIEW</td>
                                <td class="text-center" style=" background-color:#007bff;color:white">Pnl</td>
                                <td class="text-center" style=" background-color:#007bff;color:white">BOQ</td>
                                <td class="text-center" style=" background-color:#007bff;color:white">Survey</td>
                                <td class="text-center" style=" background-color:#007bff;color:white">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>JAKARTA 1</td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (\DB::select("select COUNT(*) from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                {{-- {{dd()}} --}}
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) == 0)
                                        Tidak ada data
                                    @else
                                    @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                        where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'"))}}
                            
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                 @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                                                            where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                   @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) == 0)
                                        Tidak ada data
                                    @else
                                 @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                </td>
                                <td class="text-center">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                </td>
                            </tr>
                            <tr>
                                <td>JAKARTA 2</td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (\DB::select("select COUNT(*) from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                {{-- {{dd()}} --}}
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) == 0)
                                        Tidak ada data
                                    @else
                                    @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                        where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'"))}}
                            
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                 @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                                                            where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                   @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) == 0)
                                        Tidak ada data
                                    @else
                                 @foreach (\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'") as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                </td>
                                <td class="text-center">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                     where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                     where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                     where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                     where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                     where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                    {{-- {{DB::table('jakarta_2')->where('PROGRESS_STATUS', 'ROLL-OUT PROGRESS')->count() + DB::table('jakarta_2')->where('PROGRESS_STATUS', 'NEGOTIATION 2 - PKS REVIEW')->count() + DB::table('jakarta_2')->where('PROGRESS_STATUS', 'PnL PROGRESS')->count() + DB::table('jakarta_2')->where('PROGRESS_STATUS', 'BOQ, SITE SURVEY REPORT, DESIGN')->count() + DB::table('jakarta_2')->where('PROGRESS_STATUS', 'SITE SURVEY')->count()}} --}}
                                </td>
                            </tr>
                            <tr>
                                <td>JAKARTA 3</td>
                                    <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (\DB::select("select COUNT(*) from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) == 0)
                                        Tidak ada data
                                    @else
                                    @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                        where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'"))}}
                            
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                 @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                                                            where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                   @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) == 0)
                                        Tidak ada data
                                    @else
                                 @foreach (\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'") as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                </td>
                                <td class="text-center">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                </td>
                            </tr>
                            <tr>
                                <td>SEMARANG</td>
                                                                    <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (\DB::select("select COUNT(*) from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) == 0)
                                        Tidak ada data
                                    @else
                                    @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                        where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'"))}}
                            
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                 @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                                                            where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                   @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) == 0)
                                        Tidak ada data
                                    @else
                                 @foreach (\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'") as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                </td>
                                <td class="text-center">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                    {{-- {{DB::table('semarang')->where('PROGRESS_STATUS', 'ROLL-OUT PROGRESS')->count() + DB::table('semarang')->where('PROGRESS_STATUS', 'NEGOTIATION 2 - PKS REVIEW')->count() + DB::table('semarang')->where('PROGRESS_STATUS', 'PnL PROGRESS')->count() + DB::table('semarang')->where('PROGRESS_STATUS', 'BOQ, SITE SURVEY REPORT, DESIGN')->count() + DB::table('semarang')->where('PROGRESS_STATUS', 'SITE SURVEY')->count()}} --}}
                                </td>
                            </tr>
                            <tr>
                                <td>SURABAYA</td>
                                    <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (\DB::select("select COUNT(*) from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'") as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                    @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) == 0)
                                        Tidak ada data
                                    @else
                                    @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br> 
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                        where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'"))}}
                            
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                 @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) == 0)
                                        Tidak ada data
                                    @else
                                   @foreach (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                                                            where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'"))}}
                                </td>
                                <td class="text-center" data-toggle="tooltip" data-placement="top" data-html="true"
                                    title="
                                   @if (Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) == 0)
                                        Tidak ada data
                                    @else
                                 @foreach (\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'") as $data)
                                         {{$loop->iteration.". ". $data->BUILDING_NAME}} <br>
                                            
                                    @endforeach
                                    @endif
                                    ">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                </td>
                                <td class="text-center">
{{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                                                         where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                    {{-- {{DB::table('surabaya')->where('PROGRESS_STATUS', 'ROLL-OUT PROGRESS')->count() + DB::table('surabaya')->where('PROGRESS_STATUS', 'NEGOTIATION 2 - PKS REVIEW')->count() + DB::table('surabaya')->where('PROGRESS_STATUS', 'PnL PROGRESS')->count() + DB::table('surabaya')->where('PROGRESS_STATUS', 'BOQ, SITE SURVEY REPORT, DESIGN')->count() + DB::table('surabaya')->where('PROGRESS_STATUS', 'SITE SURVEY')->count()}} --}}
                                </td>
                            </tr>
                            <tr>
                                <td>Total</td>

                                <td class="text-center">
                                   {{
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'"))
                                   }}
                                </td>
                                {{-- lanjutin yang bawah nyaaa --}}
                                <td class="text-center">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'"))}}
                                    {{-- {{DB::table('jakarta_1')->where('PROGRESS_STATUS', '')->count() + DB::table('jakarta_2')->where('PROGRESS_STATUS', 'NEGOTIATION 2 - PKS REVIEW')->count() + DB::table('jakarta_3')->where('PROGRESS_STATUS', 'NEGOTIATION 2 - PKS REVIEW')->count() + DB::table('semarang')->where('PROGRESS_STATUS', 'NEGOTIATION 2 - PKS REVIEW')->count()  + DB::table('surabaya')->where('PROGRESS_STATUS', 'NEGOTIATION 2 - PKS REVIEW')->count() }} --}}
                                </td>
                                <td class="text-center">
                                   {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'"))}}
                                    {{-- {{DB::table('jakarta_1')->where('PROGRESS_STATUS', 'PnL PROGRESS')->count() + DB::table('jakarta_2')->where('PROGRESS_STATUS', 'PnL PROGRESS')->count() + DB::table('jakarta_3')->where('PROGRESS_STATUS', 'PnL PROGRESS')->count() + DB::table('semarang')->where('PROGRESS_STATUS', 'PnL PROGRESS')->count()  + DB::table('surabaya')->where('PROGRESS_STATUS', 'PnL PROGRESS')->count() }} --}}
                                </td>
                                <td class="text-center">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'"))}}
                                    {{-- {{DB::table('jakarta_1')->where('PROGRESS_STATUS', 'BOQ, SITE SURVEY REPORT, DESIGN')->count() + DB::table('jakarta_2')->where('PROGRESS_STATUS', 'BOQ, SITE SURVEY REPORT, DESIGN')->count() + DB::table('jakarta_3')->where('PROGRESS_STATUS', 'BOQ, SITE SURVEY REPORT, DESIGN')->count() + DB::table('semarang')->where('PROGRESS_STATUS', 'BOQ, SITE SURVEY REPORT, DESIGN')->count()  + DB::table('surabaya')->where('PROGRESS_STATUS', 'BOQ, SITE SURVEY REPORT, DESIGN')->count() }} --}}
                                </td>
                                <td class="text-center">
                                    {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) +
                                    Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                    where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'"))}}
                                    {{-- {{DB::table('jakarta_1')->where('PROGRESS_STATUS', 'SITE SURVEY')->count() + DB::table('jakarta_2')->where('PROGRESS_STATUS', 'SITE SURVEY')->count() + DB::table('jakarta_3')->where('PROGRESS_STATUS', 'SITE SURVEY')->count() + DB::table('semarang')->where('PROGRESS_STATUS', 'SITE SURVEY')->count()  + DB::table('surabaya')->where('PROGRESS_STATUS', 'SITE SURVEY')->count() }} --}}
                                </td>
                                <td class="text-center">
                                
                                {{Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 2 - PKS REVIEW'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL PROGRESS'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE SURVEY'")) + Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) +
                                Count(\DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
                                where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE SURVEY REPORT, DESIGN'")) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h3 class="text-center bg-warning text-danger pt-1 pb-1">CONTRACT ACHIEVEMENT
                        {{-- {{}} --}}
                        @php
                        $data = App\Report::where('PROGRESS_STATUS','READY TO SELL')->latest("id")->first();
                        $data_roll = App\Report::where('PROGRESS_STATUS','ROLL-OUT PROGRESS')->latest("id")->first();
                        $tahun = App\Tahun::all()->last();
                        echo $data->DEAL_YEAR;
                        @endphp
                        {{-- ->or --}}
                        :
                        {{App\Report::where('BASO_DATE', 'like', "%" . $tahun->tahun)->Where("PROGRESS_STATUS", "READY TO SELL")->count() + App\Report::Where('PROGRESS_STATUS', 'ROLL-OUT PROGRESS')->Where('DEAL_YEAR', '2019')->count()}}
                        CONTRACT <span style="font-size:20px;">(as of
                            {{date('M', strtotime($data_roll->WO_DATE))}}`19)</span>
                    </h3>
                </div>
                <div class="col-md-3 border">
                    <div class="bg-primary rounded">
                        <h5 class="text-center mt-4 " style="margin-bottom:0px;">READY TO SELL</h5>
                        <p class="text-center" style="font-size:10px;">{{$sell}} PROPERTY, {{$total_hp}} HP</p>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-9">
                                BUILDING NAME
                            </div>
                            <div class="col-md-3">

                                HP
                            </div>
                        </div>
                        <div style="height:90px;overflow-y: scroll;">

                            <table>
                                @foreach ($ready_to_sell as $data)
                                <tr>
                                    <td> <a href="{{Route('DetailsProgres',$data->id)}}" target="_blank"
                                            class="text-dark">{{$data->BUILDING_NAME}}</a>
                                    </td>
                                    <td class="text-center">{{$data->HP_PORT}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                    <hr>
                    <div class="bg-primary rounded">
                        <h5 class="text-center mt-4 " style="margin-bottom:0px; ">ROLL-OUT PROGRESS</h5>
                        <p class="text-center" style="font-size:10px;">{{$roll}} PROPERTY, {{$total_hp_pnl}} HP</p>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-9">

                                BUILDING NAME
                            </div>
                            <div class="col-md-3">
                                HP
                            </div>
                        </div>
                        <div style="height:90px;overflow-y: scroll;">
                            <table>
                                @foreach ($roll_out as $data)
                                <tr>
                                    <td style="width:1000px;"> <a href="{{Route('DetailsProgres',$data->id)}}"
                                            target="_blank" class="text-dark">{{$data->BUILDING_NAME}}</a>
                                    </td>
                                    <td class="text-center">
                                        @if ($data->HP_PNL == null)
                                        0
                                        @else
                                        {{$data->HP_PNL}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <hr>
                        <div class="bg-primary rounded">

                            <h5 class="text-center mt-4 bg-primary" style="margin-bottom:0px;">PKS REVIEW</h5>
                            <p class="text-center" style="font-size:10px;">{{$pks_review}} PROPERTY,
                                {{$total_hp_pnl_pks}}
                                HP</p>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-md-8">
                                    BUILDING NAME</div>
                                <div class="col-md-4">
                                    HP
                                </div>
                            </div>
                            <div style="height:90px;overflow-y: scroll;">
                                <table>
                                    @foreach ($pks_data as $data)
                                    <tr>
                                        <td> <a href="{{Route('DetailsProgres',$data->id)}}" target="_blank"
                                                class="text-dark">{{$data->BUILDING_NAME}}</a>
                                        </td>
                                        <td class="text-center">{{$data->HP_PNL}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        <div class="card card-outline card-primary">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                        style="text-decoration:none">
                        CHART
                    </button>
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                        style="text-decoration:none">
                        -
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col border">
                            <div class="text-center">
                                <h5 class="mt-2">Progress</h5>
                                <canvas id="progress" class="text-center" width="190" height="100"
                                    style="display:inline"></canvas>
                            </div>

                        </div>
                        <div class=" col border">
                            <div class="text-center">
                                <h5 class="mt-2">Ready To Sell</h5>
                                <canvas id="rts" class="text-center" width="150" height="100"
                                    style="display:inline"></canvas>
                            </div>
                        </div>
                        <div class="col border">
                            <div class="text-center">
                                <h5 class="mt-2">Reject</h5>
                                <canvas id="reject" class="text-center" width="150" height="100"
                                    style="display:inline"></canvas>
                            </div>
                        </div>
                        <div class="col border">
                            <div class="text-center">
                                <h5 class="mt-2">Property</h5>
                                <canvas id="property" class="text-center" width="200" height="100"
                                    style="display:inline"></canvas>
                            </div>
                        </div>
                        <div class="col border">
                            <div class="text-center">
                                <h5 class="mt-2">Homepass</h5>
                                <canvas id="homepass" class="text-center" width="150" height="100"
                                    style="display:inline"></canvas>
                            </div>
                        </div>

                    </div>
                    <h5 class="mt-4">SLA</h5>
                    <div style=" height:100px">
                        {{-- <h5 class="mt-2">Homepass</h5> --}}
                        {{-- <div class="text-center"> --}}
                        {{-- <div style="margin-top:100px; z-index:10000"> --}}
                        <canvas id="stackedBarChart" style="height:100px"></canvas>
                        {{-- </div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
    @section('script')
    <script>
        $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
    @include('admin.javascript.javascript_dashboard')
    @endsection