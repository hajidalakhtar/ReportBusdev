@extends('layouts.admin')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        UPDATE
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">PIC NAME</th>
                    <th scope="col" style="width:300px;">BUILDING NAME</th>
                    <th scope="col">PROGRESS STATUS</th>
                    <th scope="col">REPORT DATE</th>
                    <th scope="col">LAST UPDATE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $data)
                <tr>
                    <th scope="row">{{$data->PIC_MNC}}</th>
                    <td>{{$data->BUILDING_NAME}}</td>
                    <td>{{$data->PROGRESS_STATUS}}</td>
                    @if ($data->PROGRESS_STATUS == "SUBMIT PROPOSAL")
                    <td>{{$data->SUBMIT_PROPOSAL_DATE}}</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "DESK SURVEY")
                    <td>Data Tidak Ada</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "BOQ, SITE SURVEY REPORT, DESIG")
                    <td>{{$data->BOQ_RECEIVED_DATE}}</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "Sign PKS" || $data->PROGRESS_STATUS == "SIGNED PKS")
                    <td>{{$data->PKS_DATE}}</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "SITE SURVEY")
                    <td>{{$data->SITE_SURVEY_DATE}}</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "NEGOTIATION 1 - BUSINESS SCHEME")
                    <td>{{$data->SUBMIT_PROPOSAL_DATE}}</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "PnL PROGRESS")
                    <td>{{$data->PNL_FULL_SIGN_DATE}}</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "NEGOTIATION 2 - PKS REVIEW")
                    <td>{{$data->PKS_REVIEW_DATE}}</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "ROLL-OUT PROGRESS")
                    <td>{{$data->WO_DATE}}</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "READY TO SELL")
                    <td>{{$data->BASO_DATE}}</td>
                    @else
                    @if ($data->PROGRESS_STATUS == "REJECT")
                    <td>{{$data->REJECT_DATE}}</td>
                    @else
                    <td>Data Tidak Ada</td>
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    <td>{{$data->updated_at}}</td>
                </tr>
                @endforeach



            </tbody>
        </table>
    </div>
</div>
@endsection