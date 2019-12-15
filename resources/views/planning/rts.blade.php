@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">


        <div class="card-header">MY PROGRESS </div>

        <div class="card-body">

            <div>
                <table class="table table-bordered" id="users-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>
                                BUILDING&nbspNAME
                            </th>
                            <th>PROGRESS&nbspSTATUS</th>
                            <th>PKS&nbspDATE&nbsp&nbsp&nbsp&nbsp</th>
                            <th>BASO&nbspDATE </th>
                            <th>HP</th>
                            <th>STATUS&nbspKERJASAMA</th>
                            <th>Tingkat&nbspOkupansi</th>
                            <th>Target&nbspDari&nbspOccp.&nbspBased</th>
                            <th>Total&nbspRevenue</th>
                            <th>Rev&nbspShare&nbsp(%)&nbsp(Biaya)</th>
                            <th>Rev&nbspShare&nbsp(Rp)&nbsp(Biaya)</th>
                            <th>Biaya&nbspSewa&nbsp(Biaya)</th>
                            <th>One&nbspTime&nbspFee&nbsp(Biaya)</th>
                            <th>Total&nbspBiaya(Biaya)</th>
                            <th>Investasi</th>
                            <th>CPE&nbspCost&nbsp(STB+ONT+DW)</th>
                            <th>COGS</th>
                            <th>by&nbspTotal&nbspDuration&nbsp(Margin)</th>
                            <th>Persentase&nbsp(%)&nbsp(Margin)</th>
                            <th>Breakeven&nbspPoint(thn)</th>
                            <th>VIEW</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->BUILDING_NAME}}</td>
                            <td>{{$data->PROGRESS_STATUS}}</td>
                            <td>{{$data->PKS_DATE}}</td>
                            <td>{{$data->BASO_DATE}}</td>
                            <td>{{$data->HP_PORT}}</td>
                            <td>{{ $data->EXCLUSIVE === "YES" ? "EXCLUSIVE" : "NOT EXCLUSIVE" }}</td>
                            <td>{{ $data->Tingkat_Okupansi_PNL }}</td>
                            <td>{{ $data->Occp_Based }}</td>
                            <td>{{ $data->Total_Revenue }}</td>
                            <td>{{ $data->Revenue_Share_persen }}</td>
                            <td>{{ $data->Revenue_Share_rp }}</td>
                            <td>{{ $data->Biaya_Sewa }}</td>
                            <td>{{ $data->ONE_TIME_FEE }}</td>
                            <td>{{ $data->total_biaya }}</td>
                            <td>{{ $data->Investasi }}</td>
                            <td>{{ $data->cpe_cost }}</td>
                            <td>{{ $data->COGS }}</td>
                            <td>{{ $data->margin_by_total_duration }}</td>
                            <td>{{ $data->margin_persen }}</td>
                            <td>{{ $data->breakeven_point }}</td>



                            <td id="detailss">
                                <a class="btn btn-primary" id="details" target="_blank"
                                    href="{{Route('DetailsProgres',$data->id)}}">DETAILS</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
{{-- @include('admin.contentjs') --}}
@include('staff.javascript')