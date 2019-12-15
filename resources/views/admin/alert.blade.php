@extends('layouts.admin')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        ALERT
    </div>
    <div class="card-body" style="height:500px;">
        <table class=" table">
            <thead>
                <tr>
                    <th scope="col">PIC NAME</th>
                    <th scope="col">BUILDING NAME</th>
                    <th scope="col">PROGRESS STATUS</th>
                    <th scope="col">REPORT DATE</th>
                    <th scope="col">LAST UPDATE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alert as $data)
                <tr>
                    <td scope="col">{{$data->Report->PIC_MNC}}</td>
                    <td scope="col">{{$data->Report->BUILDING_NAME}}</td>
                    <td scope="col">{{$data->Report->PROGRESS_STATUS}}</td>
                    @if ($data->Report->PROGRESS_STATUS == "SUBMIT PROPOSAL")
                    <td>{{$data->Report->SUBMIT_PROPOSAL_DATE}}</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "DESK SURVEY")
                    <td>Data Tidak Ada</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "BOQ, SITE SURVEY REPORT, DESIG")
                    <td>{{$data->Report->BOQ_RECEIVED_DATE}}</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "Sign PKS" || $data->Report->PROGRESS_STATUS == "SIGNED PKS")
                    <td>{{$data->Report->PKS_DATE}}</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "SITE SURVEY")
                    <td>{{$data->Report->SITE_SURVEY_DATE}}</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "NEGOTIATION 1 - BUSINESS SCHEME")
                    <td>{{$data->Report->SUBMIT_PROPOSAL_DATE}}</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "PnL PROGRESS")
                    <td>{{$data->Report->PNL_FULL_SIGN_DATE}}</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "NEGOTIATION 2 - PKS REVIEW")
                    <td>{{$data->Report->PKS_REVIEW_DATE}}</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "ROLL-OUT PROGRESS")
                    <td>{{$data->Report->WO_DATE}}</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "READY TO SELL")
                    <td>{{$data->Report->BASO_DATE}}</td>
                    @else
                    @if ($data->Report->PROGRESS_STATUS == "REJECT")
                    <td>{{$data->Report->REJECT_DATE}}</td>
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
                    <td>{{$data->Report->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="accordion" id="accordionExample">
    <div class="card card-outline card-primary">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne" style="text-decoration:none">
                    TEMPLATE ALERT
                </button>
                <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne" style="text-decoration:none">
                    -
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <form action="{{Route('admin.Update.sla.template')}}" method="POST">
                    <textarea name="template" class="form-control " id="" cols="30"
                        rows="10">{{$sla->template}}</textarea>
                    <input type="submit" class="btn btn-primary float-right mt-4">
                </form>
            </div>
        </div>
    </div>

</div>


@endsection