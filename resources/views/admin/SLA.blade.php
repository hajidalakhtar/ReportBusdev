@extends('layouts.admin')
@section('content')

<div class="card w-100">
    <div class="card-body">
        <h1 class="text-center mb-4"> <b>SLA SETTING</b> </h1>
        <form action="{{Route('admin.PostUpdateSLA')}}" method="POST">
            <div class="container w-50">
                <div class="row justify-content-center ">
                    <label for="" class="col-form-label">SUBMIT PROPOSAL <i class="fas fa-arrow-right ml-2 mr-2"></i>
                        NEGOTIATION 1 - BUSINESS SCHEME</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="{{$data->SUBMITPROPOSAL_TO_NEGOTIATION}}"
                            name="SUBMITPROPOSAL_TO_NEGOTIATION" id="SUBMITPROPOSAL_TO_NEGOTIATION">
                        <div class="input-group-append">
                            <span class="input-group-text">DAY</span>
                        </div>
                    </div>

                    <label for="" class="col-form-label">NEGOTIATION 1 - BUSINESS SCHEME <i
                            class="fas fa-arrow-right ml-2 mr-2"></i>
                        SITE SURVEY</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="{{$data->NEGOTIATION_TO_SITESURVEY}}"
                            name="NEGOTIATION_TO_SITESURVEY" id="NEGOTIATION_TO_SITESURVEY">
                        <div class="input-group-append">
                            <span class="input-group-text">DAY</span>
                        </div>
                    </div>

                    <label for="" class="col-form-label">SITE SURVEY <i class="fas fa-arrow-right ml-2 mr-2"></i>BOQ,
                        SITE
                        SURVEY REPORT, DESIGN PROGRESS
                    </label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="{{$data->SITESURVE_TO_BOQ}}"
                            name="SITESURVE_TO_BOQ" id="SITESURVE_TO_BOQ">
                        <div class="input-group-append">
                            <span class="input-group-text">DAY</span>
                        </div>
                    </div>



                    <label for="" class="col-form-label">BOQ, SITE SURVEY REPORT, DESIGN PROGRESS <i
                            class="fas fa-arrow-right ml-2 mr-2"></i>
                        PnL PROGRESS</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="{{$data->BOQ_TO_PNL}}" name="BOQ_TO_PNL"
                            id="BOQ_TO_PNL">
                        <div class="input-group-append">
                            <span class="input-group-text">DAY</span>
                        </div>
                    </div>


                    <label for="" class="col-form-label">PnL PROGRESS <i class="fas fa-arrow-right ml-2 mr-2"></i>
                        PKS REVIEW</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="{{$data->PNL_TO_PKSREVIEW}}"
                            name="PNL_TO_PKSREVIEW" id="PNL_TO_PKSREVIEW">
                        <div class="input-group-append">
                            <span class="input-group-text">DAY</span>
                        </div>
                    </div>


                    <label for="" class="col-form-label">PKS REVIEW<i class="fas fa-arrow-right ml-2 mr-2"></i>
                        SIGNED PKS</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="{{$data->PKSREVIEW_TO_SIGNEDPKS}}"
                            name="PKSREVIEW_TO_SIGNEDPKS" id="PKSREVIEW_TO_SIGNEDPKS">
                        <div class="input-group-append">
                            <span class="input-group-text">DAY</span>
                        </div>
                    </div>


                    <label for="" class="col-form-label">SIGNED PKS<i class="fas fa-arrow-right ml-2 mr-2"></i>
                        ROLL-OUT PROGRESS</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="{{$data->SIGNEDPKS_TO_ROLLOUT}}"
                            name="SIGNEDPKS_TO_ROLLOUT" id="SIGNEDPKS_TO_ROLLOUT">
                        <div class="input-group-append">
                            <span class="input-group-text">DAY</span>
                        </div>
                    </div>


                    <label for="" class="col-form-label">ROLL-OUT PROGRESS<i class="fas fa-arrow-right ml-2 mr-2"></i>
                        READY TO SELL</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="{{$data->ROLLOUT_TO_READYTOSELL}}"
                            name="ROLLOUT_TO_READYTOSELL" id="ROLLOUT_TO_READYTOSELL">
                        <div class="input-group-append">
                            <span class="input-group-text">DAY</span>
                        </div>
                    </div>

                    <label for="" class="col-form-label">ROLL-OUT PROGRESS<i class="fas fa-arrow-right ml-2 mr-2"></i>
                        REJECT</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="{{$data->ROLLOUT_TO_REJECT}}"
                            name="ROLLOUT_TO_REJECT" id="ROLLOUT_TO_REJECT">
                        <div class="input-group-append">
                            <span class="input-group-text">DAY</span>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary float-right mt-5 w-25" value="save">
            </div>
        </form>
    </div>
</div>
@endsection