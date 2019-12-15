@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">DATABASE <a href="{{Route('ExportReport',"download")}}"
                class="float-right btn btn-success ml-2"><i class="far fa-file-excel"></i></a><button type="button"
                class="btn btn-primary float-right" data-toggle="modal" data-target="#new">
                Tambah Report
            </button></div>

        <div class="card-body">
            <table class="table table-striped table-bordered nowrap" id="users-table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>
                            BUILDING&nbspNAME
                        </th>
                        <th>PROGRESS&nbspSTATUS</th>
                        <th>PIC&nbspMNC&nbsp&nbsp&nbsp</th>
                        <th>
                            Report&nbspDate&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th>
                            FILE&nbspUPLOAD&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th>VIEW</th>
                        <th>DELETE</th>
                        <th>LAST&nbspUPDATE&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->BUILDING_NAME}}</td>
                        <td>{{$data->PROGRESS_STATUS}}</td>
                        <td>{{$data->PIC_MNC}}</td>
                        @if ($data->PROGRESS_STATUS == "SUBMIT PROPOSAL")
                        <td>{{$data->SUBMIT_PROPOSAL_DATE}}</td>
                        @else
                        @if ($data->PROGRESS_STATUS == "DESK SURVEY")
                        <td>Data Tidak Ada</td>
                        @else
                        @if ($data->PROGRESS_STATUS == "BOQ, SITE SURVEY REPORT, DESIGN")
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
                        {{-- <td>{{$data->NAME}}</td> --}}
                        <td>
                            <div class="row">
                                <div class="col-md-1">
                                    <label for>FA</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->NO_FA ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for>SS</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->SITE_SURVEY_PDF ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <label for>PnL</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->PNL_PDF ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for>IOM</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->IOM_FULL_SIGNED_PDF ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for>TnC</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool"
                                            {{$data->Term_And_Condition_pdf ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for>WO</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->WO_PDF ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for>PKS</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->PKS_PDF ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for>FP3</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->FP3_PDF ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for>BOQ </label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->BOQ_PDF ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for>BASO </label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->BASO_PDF ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for>APD/ABD</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->APD_PDF ? 'checked' : ''}} />
                                        <label for></label>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3">
                                    <label for>Draf Pnl</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" class="viewcheckbox" id="roll_up_swmg_pool"
                                            value="roll_up_swmg_pool" {{$data->DraftPnlPdf ? 'checked' : ''}} />
                                <label for></label>
                            </div>
        </div> --}}


    </div>

    </td>
</div>
</td>
<td class="detailss">
    <a class="btn btn-primary" id="details" target="_blank" href="{{Route('DetailsProgres',$data->id)}}">DETAILS</a>
</td>
<td class="detailss"><a href="{{Route('admin.deleteReport',$data->id)}}" class="btn btn-danger">Delete</a>
</td>
<td>{{$data->updated_at}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
<!--
|--------------------------------------------------------------------------|
| ADD NEW                                                     |
|--------------------------------------------------------------------------|
 -->
<div class="modal hide fade" id="new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-form" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new">DESK SURVEY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" name="new" id="form_new" action="{{Route('new')}}">
                    @csrf
                    <div class="text-center">
                        <h1 class="mb-5">{{Auth::user()->name}}</h1>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <input type="hidden" name="id" />
                            <div class="form-group">
                                <label>BUILDING NAME</label>
                                <input type="text" name="BUILDING_NAME" class="form-control"
                                    placeholder="Masukan BUILDING NAME" />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>PROGRESS STATUS</label>
                                <select name="PROGRESS_STATUS" class="form-control">
                                    <option value="DESK SURVEY" selected>DESK SURVEY</option>
                                    <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                    <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 - BUSINESS
                                        SCHEME</option>
                                    <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                    <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY REPORT,
                                        DESIGNN
                                        PROGRESS
                                    </option>
                                    <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                    <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS REVIEW
                                    </option>
                                    <option value="SIGNED PKS" disabled>SIGNED PKS</option>
                                    <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
                                    <option value="READY TO SELL" disabled>READY TO SELL</option>
                                    <option value="REJECT">REJECT</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ADDRESS</label>
                                <input type="text" name="ADDRESS" class="form-control" placeholder="Masukan ADDRESS" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>COLOR MAP ONLINE</label>
                                <select name="COLOR_MAP_ONLINE" id="COLOR_MAP_ONLINE" class="form-control">
                                    <option value="BROWN">BROWN</option>
                                    <option value="BLUE">BLUE</option>
                                    <option value="OLIVE">OLIVE</option>
                                    <option value="GREEN">GREEN</option>
                                    <option value="YELLOW">YELLOW</option>
                                    <option value="PURPLE">PURPLE</option>
                                    <option value="RED">RED</option>
                                    <option value="BLACK">BLACK</option>
                                    <option value="DEEP PINK">DEEP PINK</option>
                                    <option value="NO COLOR">NO COLOR</option>
                                </select>
                            </div>
                        </div>




                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>PROVINCE</label>
                                <select name="PROVINCE_1" id="PROVINCE_1" class="form-control ">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinsi as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>COORDINATE</label>
                                <input type="text" name="COORDINATE" class="form-control"
                                    placeholder="Masukan COORDINATE" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CITY</label>
                                <select name="CITY" id="CITY_1" class="form-control">
                                    <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>PROPERTY TYPE</label>
                                <select name="PROPERTY_TYPE" class="form-control" onchange="property_type(this)">
                                    <option value="Office Building">Office Building</option>
                                    <option value="Apartemen" selected>Apartemen</option>
                                    <option value="Ruko/Rukan">Ruko/Rukan</option>
                                    <option value="Landed House">Landed House</option>
                                    <option value="Pergudangan">Pergudangan</option>
                                    <option value="Mix Use">Mix Use</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>SUBDISTRICT</label>
                                <select name="SUBDISTRICT" id="SUBDISTRICT_1" class="form-control">
                                    <option value="">Pilih Wilayah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Launch DD/MM/YY</label>
                            <input type="text" name="launch_data" id="launch_data" data-toggle="datepicker"
                                class="form-control" id="">
                        </div>

                        <div class="col-sm-12" id="status_bagunan">
                            <div class="form-group ">
                                <label class="h5">STATUS BAGUNAN</label>
                                <div class="border ">

                                    <div class="row  mt-3 mr-2">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="icheck-primary d-inline ml-3">
                                                    <input type="radio" id="Existing_new" value="Existing"
                                                        name="status_bangunan" checked />
                                                    <label for="Existing_new">Existing </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="icheck-primary d-inline ml-3">
                                                    <input type="radio" id="On_Progres_new" name="status_bangunan"
                                                        value="On_Progres" />
                                                    <label for="On_Progres_new">On Progres </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-sm-12 mt-4">
                            <div style="margin-left:40%">
                                <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!--
|--------------------------------------------------------------------------|
| VIEW                                                            |
|--------------------------------------------------------------------------|
 -->
<div class="modal fade" id="VIEW_MODAL" tabindex="-1" role="dialog" aria-labelledby="VIEW_MODAL" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;"> BUILDING NAME</h5>
                        <h5 id="text_BUILDING_name" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PIC MNC</h5>
                        <h5 id="text_pic_mnc" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PROGRESS STATUS</h5>
                        <h5 id="text_PROGRESS_STATUS" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">COLOR MAP</h5>
                        <h5 id="text_COLOR_MAP" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">ADDRESS</h5>
                        <h5 id="text_ADDRESS" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PROVINCE</h5>
                        <h5 id="text_PROVINCE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">CITY</h5>
                        <h5 id="text_CITY" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">SUBDISTRICT</h5>
                        <h5 id="text_SUBDISTRICT" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">COORDINATE</h5>
                        <h5 id="text_COORDINATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PROPERTY TYPE</h5>
                        <h5 id="text_PROPERTY_TYPE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">DEVELOPERORCOMPANY_NAME</h5>
                        <h5 id="text_DEVELOPERORCOMPANY_NAME" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">NAME</h5>
                        <h5 id="text_NAME" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PHONEORMOBILE</h5>
                        <h5 id="text_PHONEORMOBILE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">EMAIL</h5>
                        <h5 id="text_EMAIL" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">ISP EXISTING</h5>
                        <h5 id="text_ISP_EXISTING" style="margin-top:0px">
                        </h5>
                    </div>

                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">TOTAL TOWER</h5>
                        <h5 id="text_TOTAL_TOWER" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">TOTAL_FLOORORTOWER</h5>
                        <h5 id="text_TOTAL_FLOORORTOWER" style="margin-top:0px">
                        </h5>
                    </div>

                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">TOTAL OCCUPANCY</h5>
                        <h5 id="text_TOTAL_OCCUPANCY" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">EXCLUSIVE</h5>
                        <h5 id="text_EXCLUSIVE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">REVENUE SHARE</h5>
                        <h5 id="text_REVENUE_SHARE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">RENTAL BASE</h5>
                        <h5 id="text_RENTAL_BASE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">ONE TIME FEE</h5>
                        <h5 id="text_ONE_TIME_FEE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">FREE SERVICES</h5>
                        <h5 id="text_FREE_SERVICES" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">FREE WIFI</h5>
                        <h5 id="text_FREE_WIFI" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">RESIDENTIAL</h5>
                        <h5 id="text_RESIDENTIAL" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">SOHO</h5>
                        <h5 id="text_SOHO" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">DEDICATED INTERNET</h5>
                        <h5 id="text_DEDICATED_INTERNET" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">DATA COMMUNICATION</h5>
                        <h5 id="text_DATA_COMMUNICATION" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">SUBMIT PROPOSAL DATE</h5>
                        <h5 id="text_SUBMIT_PROPOSAL_DATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">SITE SURVEY</h5>
                        <h5 id="text_SITE_SURVEY" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">BUSDEV SIGNED</h5>
                        <h5 id="text_BUSDEV_SIGNED" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">BM SIGNED</h5>
                        <h5 id="text_BM_SIGNED" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">SALES SIGNED</h5>
                        <h5 id="text_SALES_SIGNED" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">GM SALES SIGNED</h5>
                        <h5 id="text_GM_SALES_SIGNED" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">RECOMMENDATION</h5>
                        <h5 id="text_RECOMMENDATION" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">BOQ RECEIVED DATE</h5>
                        <h5 id="text_BOQ_RECEIVED_DATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">DESIGN RECEIVED DATE</h5>
                        <h5 id="text_DESIGN_RECEIVED_DATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">SURVEY RESULT REPORT DATE</h5>
                        <h5 id="text_SURVEY_RESULT_REPORT_DATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">SUBMIT DRAFT PKS DATE</h5>
                        <h5 id="text_SUBMIT_DRAFT_PKS_DATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PNL DRAFT RECEIVE DATE</h5>
                        <h5 id="text_PNL_DRAFT_RECEIVE_DATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PNL FULL SIGN DATE</h5>
                        <h5 id="text_PNL_FULL_SIGN_DATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">IOM FULL SIGN DATE</h5>
                        <h5 id="text_IOM_FULL_SIGN_DATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">CONTRACT DURATION</h5>
                        <h5 id="text_CONTRACT_DURATION" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PKS DATE</h5>
                        <h5 id="text_PKS_DATE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">DEAL YEAR</h5>
                        <h5 id="text_DEAL_YEAR" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PKS START</h5>
                        <h5 id="text_PKS_START" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PKS END</h5>
                        <h5 id="text_PKS_END" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">NO. PKS</h5>
                        <h5 id="text_NO_PKS" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">REJECT CODE</h5>
                        <h5 id="text_REJECT_CODE" style="margin-top:0px">
                        </h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <h5 style="margin-bottom:8px;font-weight: 600;">BASO/BAST No.</h5>
                        <h5 id="text_BASOORBAST_No" style="margin-top:0px">
                        </h5>
                    </div>


                    <div class="col-md-12 mt-3 mb-4">
                        <h5 style="margin-bottom:8px;font-weight: 600;">PDF</h5>
                        <hr style="border:1px solid black; margin-top:0px;">
                        <div class="row">
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> FORM ACQUISITIO(FA)</p>
                                <a href class="btn btn-primary btn-sm" id="FA_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> SITE SURVEY</p>
                                <a href class="btn btn-primary btn-sm" id="SITE_SURVEY_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> BOQ</p>
                                <a href class="btn btn-primary btn-sm" id="BOQ_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> PNL</p>
                                <a href class="btn btn-primary btn-sm" id="PNL_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> IOM FULL SIGNED</p>
                                <a href class="btn btn-primary btn-sm" id="IOM_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> WO</p>
                                <a href class="btn btn-primary btn-sm" id="WO_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> TERM AND CONDITION</p>
                                <a href class="btn btn-primary btn-sm" id="TERM_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> PKS</p>
                                <a href class="btn btn-primary btn-sm" id="PKS_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <p style="margin-bottom:0px">UPDATE PROGRESS</p>
                        <textarea name="text_UPDATE_PROGRESS" cols="30" rows="10" class="form-control"
                            id="text_UPDATE_PROGRESS"></textarea>
                        {{-- <h4 id="text_PKS_END" style="margin-top:0px"></h4> --}}
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href id="download_pdf" class="btn btn-primary">Download</a>
            </div>
        </div>
    </div>
</div>
<div class="modal hide fade" id="DESKSURVEY" tabindex="-1" role="dialog" aria-labelledby="DESKSURVEY"
    aria-hidden="true">
    <div class="modal-dialog modal-form" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DESKSURVEY_TITLE">DESK SURVEY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="mb-5">
                    <form action="{{Route('admin.UpdatePIC')}}" method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <label>BUILDING NAME</label>
                                <input type="text" name="building_name" id="building_name" class="form-control">
                            </div>
                            <input type="hidden" value="" id="id_update_pic" name="id_update_pic">
                            <div class="col-md-5">
                                <label for="">PIC MNC</label>
                                <select name="staff" id="staff" class="form-control">
                                    @foreach (App\User::all() as $data)
                                    <option value="{{$data->name}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" value="Save" class="btn btn-primary float-right w-100"
                                    style="margin-top: 29px;">
                            </div>
                        </div>
                    </form>
                    <input type="hidden" id="BUILDING_NAME1" name="BUILDING_NAME" class="mb-4" />
                </div>


                <div id="Edit_REPORT_DESK_SURVEY">
                    <form method="POST" action="{{Route('update')}}" name="Edit_REPORT_DESK_SURVEY"
                        id="Edit_REPORT_DESK_SURVEY_FORM">
                        <input type="hidden" name="id_DESK" id="id_DESK" />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" selected>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME">NEGOTIATION 1 -
                                            BUSINESS SCHEME</option>
                                        <option value="SITE SURVEY">SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS">PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS">SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL">READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                    <noscript><input type="submit" value="Submit"></noscript>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>COLOR MAP ONLINE</label>
                                    <select name="COLOR_MAP_ONLINE" id="COLOR_MAP_ONLINE" class="form-control">
                                        <option value="BROWN">BROWN</option>
                                        <option value="BLUE">BLUE</option>
                                        <option value="OLIVE">OLIVE</option>
                                        <option value="GREEN">GREEN</option>
                                        <option value="YELLOW">YELLOW</option>
                                        <option value="PURPLE">PURPLE</option>
                                        <option value="RED">RED</option>
                                        <option value="PINK">PINK</option>
                                        <option value="BLACK">BLACK</option>
                                        <option value="DEEP PINK">DEEP PINK</option>

                                        <option value="NO COLOR">NO COLOR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ADDRESS</label>
                                    <input type="text" name="ADDRESS" id="ADDRESS" class="form-control"
                                        placeholder="Masukan ADDRESS" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROVINCE</label>
                                    <input type="text" name="PROVINCE" id="PROVINCE" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>CITY</label>
                                    <input type="text" name="CITY" id="CITY" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SUBDISTRICT</label>
                                    <input type="text" name="SUBDISTRICT" id="SUBDISTRICT" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>COORDINATE</label>
                                    <input type="text" name="COORDINATE" id="COORDINATE" class="form-control"
                                        placeholder="Masukan COORDINATE" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROPERTY TYPE</label>
                                    <select onchange="property_type(this)" name="PROPERTY_TYPE" id="PROPERTY_TYPE"
                                        class="form-control">
                                        <option value="Office Building">Office Building</option>
                                        <option value="Apartemen">Apartemen</option>
                                        <option value="Ruko/Rukan">Ruko/Rukan</option>
                                        <option value="Landed House">Landed House</option>
                                        <option value="Pergudangan">Pergudangan</option>
                                        <option value="Mix Use">Mix Use</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Launch DD/MM/YY</label>
                                <input type="text" name="launch_data" id="launch_data_edit" data-toggle="datepicker"
                                    class="form-control" id>
                            </div>
                            <div class="col-sm-12 mt-3" id="status_bagunan">
                                <div class="form-group">
                                    <label class="h5">STATUS BAGUNAN</label>
                                    <div class="border ">
                                        <div class="row  mt-3 mr-2">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="radio" id="Existing" value="Existing"
                                                            name="status_bagunan" checked />
                                                        <label for="Existing">Existing </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="radio" id="On_Progres" name="status_bagunan"
                                                            value="On_Progres" />
                                                        <label for="On_Progres">On Progres </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_DESK"
                                        id="UPDATE_PROGRESS_DESK" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            <!-- <button type="submit " class="btn btn-primary" style="width:100px;">Save</button> -->
                        </div>
                    </form>
                </div>



                {{-- submit_proposal --}}
                <div id="Edit_REPORT_SUBMIT_PROPOSAL" class="ilang">
                    <div class="border">
                        <div class="row mt-2 ml-2 mb-2">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>UPLOAD FA (PDF)</label>
                                    <form action="{{Route('update.uploadFA')}}" name="uploadFA" id="uploadFA"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form-group clearfix">
                                            <input type="hidden" name="id_proposal_pdf" id="id_proposal_pdf" />
                                            <input type="file" accept=".pdf" name="form_fa" />
                                            <input type="submit" value="UPLOAD"
                                                class="btn btn-primary btn-sm mt-3 w-50">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <form method="POST" action="{{Route('update.proposal')}}" id="UpdateProposal"
                        name="Edit_REPORT_SUBMIT_PROPOSAL">
                        <input type="hidden" name="id_proposal" id="id_proposal" />
                        <input type="hidden" name="PROVINSI" id="PROVINSI" />
                        <input type="hidden" name="CITY" id="CITY_REPORT" />
                        <input type="hidden" name="WILAYAH" id="WILAYAH" />
                        <div class=" row mt-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_SUBMIT_PROPOSAL" class="form-control">
                                        <option value="DESK SURVEY">DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" selected>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME"><a href="submit">NEGOTIATION 1 -
                                                BUSINESS SCHEME</a>
                                        </option>
                                        <option value="SITE SURVEY">SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS">PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS">SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL">READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>DEVELOPER/COMPANY NAME</label>
                                    <input type="text" name="DEVELOPERORCOMPANY_NAME" id="DEVELOPERORCOMPANY_NAME"
                                        class="form-control" placeholder="Masukan Developer Name" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> BM SIGNED DATE</label>
                                    <div class="form-group clearfix">
                                        <input type="text" data-toggle="datepicker" class="form-control"
                                            name="BM_SIGNED" id="BM_SIGNED" />
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>NAME</label>
                                    <input type="text" name="NAME" id="NAME" class="form-control"
                                        placeholder="Masukan Name" />
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input type="email" name="EMAIL" id="EMAIL" class="form-control"
                                        placeholder="Masukan Email 1" />
                                    <input type="email" name="EMAIL_1" id="EMAIL_1" class="form-control"
                                        placeholder="Masukan Email 2" />
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PHONE/MOBILE</label>
                                    <input type="number" name="PHONEORMOBILE" id="PHONEORMOBILE" class="form-control"
                                        placeholder="Masukan Office Phone" />

                                    <input type="number" name="MOBILEPHONE" id="MOBILEPHONE" class="form-control"
                                        placeholder="Masukan No HP " />

                                </div>
                            </div>





                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>SUBMIT PROPOSAL DATE</label>
                                    <div class="form-group clearfix">
                                        <input type="text" data-toggle="datepicker" name="SUBMIT_PROPOSAL_DATE"
                                            id="SUBMIT_PROPOSAL_DATE_HALO" class="form-control" name="busdev_ date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> BUSDEV SIGNED DATE</label>
                                    <div class="form-group clearfix">
                                        <input type="text" data-toggle="datepicker" class="form-control"
                                            name="BUSDEV_SIGNED" id="BUSDEV_SIGNED" />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-4" id="rata_rata_gedung">
                                <div class="form-group">
                                    <label>Berapa harga rata-rata berlangganan internet per-bulan</label>
                                    <div class="form-group clearfix">
                                        <input type="text" class="form-control" name="rata_rata" id="rata-rata" />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-3" id="Main_Hole_Ready_gedung">
                                <div class="form-group">
                                    <label>Main Hole Ready</label>
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="main_hole_unit_1_GEDUNG" value="YES"
                                                name="main_hole_unit_gedung" checked />
                                            <label for="main_hole_unit_1_GEDUNG">YES</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="main_hole_unit_2_GEDUNG" value="NO"
                                                name="main_hole_unit_gedung" />
                                            <label for="main_hole_unit_2_GEDUNG">NO</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" id="membantu_gedung">
                                <div class="form-group">
                                    <label>Pengelola berkenan untuk membantu penjualan?</label>
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="membantu_1" value="YES" name="membantu" checked />
                                            <label for="membantu_1">YES</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="membantu_2" value="NO" name="membantu" />
                                            <label for="membantu_2">NO</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" id="re_wiring_apartemen">
                                <div class="form-group">
                                    <label>Bersedia Re-Wiring FTTH</label>
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="rewiring1" value="YES" name="rewiring" checked />
                                            <label for="rewiring1">YES</label>
                                        </div>
                                        <div class="icheck-primary d-inline ml-3">
                                            <input type="radio" id="rewiring2" value="NO" name="rewiring" />
                                            <label for="rewiring2">NO</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" id="perapihan_apartemen">
                                <div class="form-group">
                                    <label>Pengelolah bersedia melakukan perapihan ke penghuni</label>
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="perapihan_1" value="YES" name="perapihan" checked />
                                            <label for="perapihan_1">YES</label>
                                        </div>
                                        <div class="icheck-primary d-inline ml-3">
                                            <input type="radio" id="perapihan_2" value="NO" name="perapihan" />
                                            <label for="perapihan_2">NO</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-3 mb-3" id="tower_apartemen">
                                <table class="table-input">
                                    <tr>
                                        <td style="background-color:#0679FB"><b class="text-white">Tower</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">1</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">2</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">3</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">4</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">5</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">6</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">7</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">8</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">9</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">10</b></td>
                                        <td style="background-color:#0679FB"><b class="text-white">Total</b></td>
                                    </tr>
                                    <tr id="jumlah_lantai_tower">
                                        <td class="text-left pl-3">Jumlah Lantai</td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_1" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_2" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_3" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_4" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_5" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_6" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_7" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_8" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_9" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_lantai" name="jumlah_lantai_10" />
                                        </td>
                                        <td><input type="text" size="6" id="jumlah_lantai_total"
                                                name="jumlah_lantai_total" readonly /></td>


                                    </tr>
                                    <tr id="jumlah_unit_tower">
                                        <td class="text-left pl-3">Jumlah Unit</td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_1"
                                                id="jumlah_unit_1" /></td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_2"
                                                id="jumlah_unit_2" /></td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_3"
                                                id="jumlah_unit_3" /></td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_4"
                                                id="jumlah_unit_4" /></td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_5"
                                                id="jumlah_unit_5" /></td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_6"
                                                id="jumlah_unit_6" /></td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_7"
                                                id="jumlah_unit_7" /></td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_8"
                                                id="jumlah_unit_8" /></td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_9"
                                                id="jumlah_unit_9" /></td>
                                        <td><input type="text" size="3" class="jumlah_unit" name="jumlah_unit_10"
                                                id="jumlah_unit_10" />
                                        </td>
                                        <td><input type="text" size="6" name="jumlah_unit_total" readonly /></td>
                                    </tr>
                                    <tr id="jumlah_yang_dihuni_tower">
                                        <td class="text-left pl-3"><span id="text_jumlah_yang_dihuni">Jumlah Yang
                                                Dihuni</span></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_1" id="jumlah_yang_dihuni_1" /></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_2" id="jumlah_yang_dihuni_2" /></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_3" id="jumlah_yang_dihuni_3" /></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_4" id="jumlah_yang_dihuni_4" /></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_5" id="jumlah_yang_dihuni_5" /></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_6" id="jumlah_yang_dihuni_6" /></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_7" id="jumlah_yang_dihuni_7" /></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_8" id="jumlah_yang_dihuni_8" /></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_9" id="jumlah_yang_dihuni_9" /></td>
                                        <td><input type="text" size="3" class="jumlah_yang_dihuni"
                                                name="jumlah_yang_dihuni_10" id="jumlah_yang_dihuni_10" /></td>
                                        <td><input type="text" size="6" name="jumlah_yang_dihuni_total" readonly /></td>
                                    </tr>
                                    <tr id="jumlah_tingkat_okupansi_tower">
                                        <td class="text-left pl-3">Tingkat Okupansi (diisi MKM)</td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_1" id="tingkat_okupansi_1" readonly /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_2" readonly /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_3" readonly /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_4" readonly /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_5" readonly /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_6" readonly /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_7" readonly /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_8" readonly /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_9" readonly /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_10" readonly /></td>
                                        <td><input type="text" size="6" name="tingkat_okupansi_total" readonly /></td>
                                    </tr>
                                    <tr id="jumlah_unit_area_komersial_tower">
                                        <td class="text-left pl-3">Jumlah Unit Area Komersial</td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_1" id="jumlah_unit_area_kemerial_1" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_2" id="jumlah_unit_area_kemerial_2" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_3" id="jumlah_unit_area_kemerial_3" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_4" id="jumlah_unit_area_kemerial_4" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_5" id="jumlah_unit_area_kemerial_5" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_6" id="jumlah_unit_area_kemerial_6" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_7" id="jumlah_unit_area_kemerial_7" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_8" id="jumlah_unit_area_kemerial_8" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_9" id="jumlah_unit_area_kemerial_9" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_unit_area_kemerial"
                                                name="jumlah_unit_area_kemerial_10" id="jumlah_unit_area_kemerial_10" />
                                        </td>
                                        <td><input type="text" size="6" name="jumlah_unit_area_kemerial_total"
                                                id="jumlah_unit_area_kemerial_total" readonly /></td>
                                    </tr>

                                    <tr id="jumlah_area_komersial_dihuni_tower">
                                        <td class="text-left pl-3">Jumlah Area Komersial Dihuni</td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_1"
                                                id="jumlah_area_komersial_dihuni_1" /></td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_2"
                                                id="jumlah_area_komersial_dihuni_2" /></td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_3"
                                                id="jumlah_area_komersial_dihuni_3" /></td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_4"
                                                id="jumlah_area_komersial_dihuni_4" /></td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_5"
                                                id="jumlah_area_komersial_dihuni_5" /></td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_6"
                                                id="jumlah_area_komersial_dihuni_6" /></td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_7"
                                                id="jumlah_area_komersial_dihuni_7" /></td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_8"
                                                id="jumlah_area_komersial_dihuni_8" /></td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_9"
                                                id="jumlah_area_komersial_dihuni_9" /></td>
                                        <td><input type="text" size="3" class="jumlah_area_komersial_dihuni"
                                                name="jumlah_area_komersial_dihuni_10"
                                                id="jumlah_area_komersial_dihuni_10" /></td>
                                        <td><input type="text" size="6" name="jumlah_area_komersial_dihuni_total"
                                                id="jumlah_area_komersial_dihuni_total" readonly />
                                        </td>
                                    </tr>
                                    <tr id="tingkat_okupansi_2">
                                        <td class="text-left pl-3">Tingkat Okupansi (diisi MKM)</td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_1"
                                                id="jumlah_tingkat_okupansi_area_1" readonly /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_2"
                                                id="jumlah_tingkat_okupansi_area_2" readonly /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_3"
                                                id="jumlah_tingkat_okupansi_area_3" readonly /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi "
                                                name="jumlah_tingkat_okupansi_area_4"
                                                id="jumlah_tingkat_okupansi_area_4" readonly /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_5"
                                                id="jumlah_tingkat_okupansi_area_5" readonly /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_6"
                                                id="jumlah_tingkat_okupansi_area_6" readonly /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_7"
                                                id="jumlah_tingkat_okupansi_area_7" readonly /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_8"
                                                id="jumlah_tingkat_okupansi_area_8" readonly /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_9"
                                                id="jumlah_tingkat_okupansi_area_9" readonly /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_10"
                                                id="jumlah_tingkat_okupansi_area_10" readonly /></td>
                                        <td><input type="text" size="6" name="jumlah_tingkat_okupansi_area_total"
                                                readonly />
                                        </td>
                                    </tr>
                                    <tr id="jumlah_kendaraan_terdaftar">
                                        <td class="text-left pl-3">Jumlah Kendaraan Terdaftar</td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_1" id="jumlah_kendaraan_terdaftar_1" />
                                        </td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_2" /></td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_3" /></td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_4" /></td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_5" /></td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_6" /></td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_7" /></td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_8" /></td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_9" /></td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_10" /></td>
                                        <td><input type="text" size="6" name="jumlah_kendaraan_terdaftar_total"
                                                readonly /></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-sm-3">

                            </div>

                            <div class="col-sm-12" style="margin-top:-8">
                                <div class="form-group">
                                    <div class="border ">
                                        <div class="row   ml-2 mr-2">
                                            <div class="float-right" style="border-right:1px solid #DEE2E6">
                                                <h5 class="mt-3" style="margin-right:100px;">Exclusive
                                                </h5>
                                            </div>
                                            <div class="float-right mt-4 ml-2">
                                                <div class="form-group">
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="exclusive_1" value="YES"
                                                                name="exclusive" checked />
                                                            <label for="exclusive_1">YES</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline ml-3">
                                                            <input type="radio" id="exclusive_2" value="NO"
                                                                name="exclusive" />
                                                            <label for="exclusive_2">NO</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-3 mt-3" style="margin-top:-7px; margin-bottom:9px">
                                                <input type="text" name="terendah" id="terendah" class="form-control">
                                            </div> --}}

                                            <div class="float-right mt-3 ml-3"
                                                style="margin-top:-7px; margin-bottom:9px">
                                                <input type="text" name="thn" id="thn" style="width:90px"
                                                    class="form-control">
                                            </div>
                                            <div class="float-right mt-4 ml-3" id="thn_text"
                                                style="margin-top:-7px; margin-bottom:9px">
                                                <p class="h5">Thn</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" id="type_unit_apartemen">
                                <div class="form-group">
                                    <div class="border">
                                        <div class="row ml-2 ">
                                            <div class="float-right" style="border-right:1px solid #DEE2E6">
                                                <h5 class="mt-3" style="padding-right:100px;">
                                                    Type Unit
                                                </h5>
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                Studio
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                <input type="number" class="type_unit form-control"
                                                    name="type_unit_studio" id="type_unit_studio" class="form-control"
                                                    style="width:70px; margin-top:-7px; margin-bottom:10px">
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                1 BR
                                            </div>

                                            <div class="float-right ml-2 mt-3">
                                                <input type="number" class="type_unit form-control" name="type_unit_1br"
                                                    id="type_unit_1br" class="form-control"
                                                    style="width:70px; margin-top:-7px; margin-bottom:10px">
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                2 BR
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                <input type="number" class="type_unit form-control" name="type_unit_2br"
                                                    id="type_unit_2br" class="form-control"
                                                    style="width:70px; margin-top:-7px; margin-bottom:10px">
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                3 BR
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                <input type="number" class="type_unit form-control" name="type_unit_3br"
                                                    id="type_unit_3br" class="form-control"
                                                    style="width:70px; margin-top:-7px; margin-bottom:10px">
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                Penthouse
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                <input type="number" class="type_unit form-control"
                                                    name="type_unit_penthouse" id="type_unit_penthouse"
                                                    class="form-control"
                                                    style="width:70px; margin-top:-7px; margin-bottom:10px">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" id="average_apartemen" style="margin-top:-8">
                                <div class="form-group">
                                    <div class="border ">
                                        <div class="row   ml-2 mr-2">
                                            <div class="float-right" style="border-right:1px solid #DEE2E6">
                                                <h5 class="mt-3 mr-3">Average Harga Unit</h5>
                                            </div>
                                            <div class="float-right mt-4 ml-2">
                                                <h5 class>Terendah</h5>
                                            </div>
                                            <div class="col-md-3 mt-3" style="margin-top:-7px; margin-bottom:9px">
                                                <input type="text" name="terendah" id="terendah" style="width:160px"
                                                    class="form-control">
                                            </div>
                                            <div class="float-right mt-4 mr-2">
                                                <h5 class>Tertinggi</h5>
                                            </div>
                                            <div class="float-right mt-3" style="margin-top:-7px; margin-bottom:9px">
                                                <input type="text" name="tertingi" id="tertingi" style="width:160px"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="border ">
                                        <div class="row  ml-2">
                                            <div class="col-md-2 pl-2 "
                                                style="border-right:1px solid #DEE2E6;padding-right:40px;">

                                                <div class="float-left mt-3" id="mt_Infrastruktur">
                                                    <h5>Infrastruktur</h5>
                                                </div>

                                            </div>
                                            <div class="col-sm-2  mt-3 ml-2 "
                                                style="padding-right:0px;padding-left:0px;" style="margin-left:0px;">
                                                <div class="form-group mb-2">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Coaxial_building" value="Coaxial"
                                                            name="Infrastruktur_Coaxial" />
                                                        <label for="Coaxial_building">Coaxial</label>
                                                    </div>
                                                </div>
                                                <div id="Infrastruktur_apartemen" class="switch-field mt-4">
                                                    <input type="radio" id="coaxial_radio1" name="coaxial_radio"
                                                        value="BM" checked />
                                                    <label for="coaxial_radio1">BM</label>
                                                    <input type="radio" id="coaxial_radio2" name="coaxial_radio"
                                                        value="Operator" />
                                                    <label for="coaxial_radio2">Operator</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2  mt-3 " style="padding-right:0px;padding-left:0px;">
                                                <div class="form-group mb-2">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="FTTH_building" value="FTTH"
                                                            name="Infrastruktur_FTTH" />
                                                        <label for="FTTH_building">FTTH</label>
                                                    </div>
                                                </div>
                                                <div id="Infrastruktur_apartemen" class="switch-field mt-4 ml-3">
                                                    <input type="radio" id="FTTH_radio1" name="FTTH_radio" value="BM"
                                                        checked />
                                                    <label for="FTTH_radio1">BM</label>
                                                    <input type="radio" id="FTTH_radio2" name="FTTH_radio"
                                                        value="Operator" />
                                                    <label for="FTTH_radio2">Operator</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2  mt-3 " style="padding-right:0px;padding-left:0px;">
                                                <div class="form-group mb-2">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="ADSL_building" value="ADSL"
                                                            name="Infrastruktur_ADSL" />
                                                        <label for="ADSL_building">ADSL</label>
                                                    </div>
                                                </div>
                                                <div id="Infrastruktur_apartemen" class="switch-field mt-4 ml-3">
                                                    <input type="radio" id="ADSL_radio1" name="ADSL_radio" value="BM"
                                                        checked />
                                                    <label for="ADSL_radio1">BM</label>
                                                    <input type="radio" id="ADSL_radio2" name="ADSL_radio"
                                                        value="Operator" />
                                                    <label for="ADSL_radio2">Operator</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-2  mt-3 " style="padding-right:0px;padding-left:0px;">
                                                <div class="form-group mb-2">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="UTP_building"
                                                            name="Infrastruktur_UTP" value="UTP" />
                                                        <label for="UTP_building">UTP</label>
                                                    </div>
                                                </div>
                                                <div id="Infrastruktur_apartemen" class="switch-field mt-4 ml-3">
                                                    <input type="radio" id="UTP_radio1" name="UTP_radio" value="BM"
                                                        checked />
                                                    <label for="UTP_radio1">BM</label>
                                                    <input type="radio" id="UTP_radio2" name="UTP_radio"
                                                        value="Operator" />
                                                    <label for="UTP_radio2">Operator</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" id="main_hole_apartemen" style="margin-top:-24px;">
                                <div class="form-group">
                                    <label class="h5"></label>
                                    <div class="border ">
                                        <div class="row  ml-2 ">
                                            <div class="float-right"
                                                style="border-right:1px solid #DEE2E6;padding-right:40px;">
                                                <h5 class="mt-3">Main Hole Ready</h5>
                                            </div>
                                            <div class="float-right mt-3 ml-2" style="padding-right:0px;">
                                                <h5 class="mr-2">Di unit</h5>
                                            </div>
                                            <div class="float-right mt-3" style="padding-left:0px;">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="main_hole_unit_1" value="YES"
                                                            name="main_hole_unit" checked />
                                                        <label for="main_hole_unit_1">YES</label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="main_hole_unit_2" value="NO"
                                                            name="main_hole_unit" />
                                                        <label for="main_hole_unit_2">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="float-right mt-3 ml-5 mr-2" style="padding-right:0px;">
                                                <h5>Di Koridor</h5>
                                            </div>
                                            <div class="float-right mt-3 " style="padding-left:0px;">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="main_hole_koridor_YES" value="YES"
                                                            name="main_hole_koridor" checked />
                                                        <label for="main_hole_koridor_YES">YES</label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="main_hole_koridor_NO" value="NO"
                                                            name="main_hole_koridor" />
                                                        <label for="main_hole_koridor_NO">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" id="pembangunan_gedung">
                                <div class="form-group">
                                    <label class="h5"></label>
                                    <div class="border ">
                                        <div class="row">
                                            <div class="col-md-4" style="border-left:1px solid #DEE2E6;">
                                                <h5 class="mt-3 ml-2">
                                                    Pembangunan Infrastruktur s/d.
                                                </h5>
                                            </div>
                                            <div class="col-sm-3 mt-3" style="margin-left:0px;">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="Control_Room" value="Control_Room"
                                                            name="Control_Room" />
                                                        <label for="Control_Room">Control Room</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mt-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="Shaft" value="Shaft" name="Shaft" />
                                                        <label for="Shaft">Shaft (FAT)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" id="Metode_Pembangunan_land">
                                <div class="form-group">
                                    {{-- <label class="h5"></label> --}}
                                    <div class="border ">
                                        <div class="row  ">
                                            <div class="col-md-2 ml-3" style="border-right:1px solid #DEE2E6;">
                                                <h5 class=" mt-3">Metode Pembangunan Infrastruktur</h5>
                                            </div>
                                            <div class="col-sm-3 mt-3" style="margin-left:0px;">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="KU" value="KU – Kabel Udara (Pasang Tiang/Clamp
                                                            Wall/Ceilling)" name="KU" />
                                                        <label for="KU">KU – Kabel Udara (Pasang Tiang/Clamp
                                                            Wall/Ceilling)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mt-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="UG" value="UG – Under Ground (Bawah Tanah/Suwer – Saluran
                                                            Air)" name="UG" />
                                                        <label for="UG">UG – Under Ground (Bawah Tanah/Suwer – Saluran
                                                            Air)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mt-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="Mixed" value="Mixed KU (Kabel Udara) – UG (Under
                                                            Ground)" name="Mixed" />
                                                        <label for="Mixed">Mixed KU (Kabel Udara) – UG (Under
                                                            Ground)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" id="pembangunan_land">
                                <div class="form-group">
                                    <div class="border ">
                                        <div class="row  mt-3">
                                            <div class="col-md-2" style="border-right:1px solid #DEE2E6;">
                                                <h5>
                                                    Pembangunan <br> Infrastruktur s/d.
                                                </h5>
                                            </div>
                                            <div class="col-sm-3" style="margin-left:0px;">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="ODP" value="ODP" name="ODP" />
                                                        <label for="ODP">ODP/FAT</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="unit" value="unit" name="unit" />
                                                        <label for="unit">Unit (TB)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-12" id="internet_service_gedung">
                                <div class="form-group">
                                    <div class="border ">
                                        <div class="row  ">
                                            <div class="col-md-2 mr-3">
                                                <h5 class="mt-3 mr-2 ml-2">
                                                    Internet Service
                                                </h5>
                                            </div>
                                            <div class="col-sm-3" style="border-left:1px solid #DEE2E6;">
                                                <div class="form-group mt-3">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="Dedicated" value="Dedicated"
                                                            name="Dedicated" />
                                                        <label for="Dedicated">Dedicated</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mt-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="Broadband" name="Broadband"
                                                            value="Broadband" />
                                                        <label for="Broadband">Broadband</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" id="biaya_apartemen">
                                <div class="form-group">
                                    <div class="border ">
                                        <div class="row  ">
                                            <div class="col-md-5">
                                                <h5 class="mt-3 ml-2">
                                                    Biaya perapihan ditagih langsung ke penghuni
                                                </h5>
                                            </div>
                                            <div class="col-md-2 mt-3 ml-3">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="biaya_1" value="YES" name="biaya"
                                                            checked />
                                                        <label for="biaya_1">YES</label>
                                                    </div>
                                                    <div class="icheck-primary d-inline ml-2">
                                                        <input type="radio" id="biaya_2" value="NO" name="biaya" />
                                                        <label for="biaya_2">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3" style="padding-right:0px">
                                                Jumlah Biaya :
                                            </div>
                                            <div class="col-md-2 mt-3" style="padding-left:0px">
                                                <input type="text" id="perapihan_biaya" name="perapihan_biaya"
                                                    class="form-control" style="margin-top:-7px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{-- <label class="h5"></label> --}}
                                    <div class="border ">
                                        <div class="row ">
                                            <div class="col-md-2" style="margin-right:20px;">
                                                <h5 class="mt-3 ml-2">
                                                    Layanan Yang Disediakan MKM

                                                </h5>
                                            </div>
                                            <div class="col-sm-2 "
                                                style="margin-left:0px; border-left:1px solid #DEE2E6;">
                                                <div class="form-group mt-3">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="Internet" value="Internet"
                                                            name="Internet" />
                                                        <label for="Internet">Internet</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 mt-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="IPTV" value="IPTV" name="IPTV" />
                                                        <label for="IPTV">IPTV</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 mt-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="Telephony" value="Telephony"
                                                            name="Telephony" />
                                                        <label for="Telephony">Telephony*</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12" id="presentase">
                                <div class="form-group">
                                    <div class="border ">
                                        <div class="row ">
                                            <div class="col-md-2" style="margin-right:20px;">
                                                <h5 class="mt-3 ml-2">
                                                    Presentase Operasional Rukan / SOHO
                                                </h5>
                                            </div>
                                            <div class="col-sm-1"
                                                style="margin-left:0px; border-left:1px solid #DEE2E6;">
                                                <p class="mt-4">Weekday</p>
                                            </div>
                                            <div class="col-sm-2 mt-4">
                                                <div class="input-group ">
                                                    <input type="number" class="form-control"
                                                        placeholder="Masukan Mahasiswa" name="Weekday" id="Weekday" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1" style="margin-left:0px; ">
                                                <p class="mt-4">Weekend, Sabtu</p>
                                            </div>
                                            <div class="col-sm-2 mt-4">
                                                <div class="input-group ">
                                                    <input type="number" class="form-control"
                                                        placeholder="Masukan Mahasiswa" name="Weekend" id="Weekend" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1" style="margin-left:0px; ">
                                                <p class="mt-4">Minggu</p>
                                            </div>
                                            <div class="col-sm-2 mt-4">
                                                <div class="input-group ">
                                                    <input type="number" class="form-control"
                                                        placeholder="Masukan Mahasiswa" name="minggu" id="minggu" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" id="perofile_penghuni_apartemen">
                                <div class="form-group">
                                    <label class="h5">Profile Penghuni</label>
                                    <div class="border" id="Komposisi_Kewarganegaraan">
                                        <h5 class="mt-3 ml-2">Komposisi Kewarganegaraan Penghuni<span
                                                style="font-size:15px;"><b class="ml-1 text-danger"
                                                    id="error_kewarganegaraan"><i
                                                        class="fas fa-exclamation-triangle ml-1"></i></b></span></h5>
                                        <div class="row  mt-3">
                                            <div class="col-md-1 ml-1 mt-2">
                                                <b>Indonesia </b>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3" style="width: 105px;">
                                                    <input type="number" name="indonesia" id="indonesia"
                                                        class="form-control" placeholder="Masukan indonesia"
                                                        max="100" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 ml-3 mt-2">
                                                <b>Expatriat</b>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3" style="width: 105px;">
                                                    <input type="number" name="Expatriat" id="Expatriat"
                                                        class="form-control" placeholder="Masukan Expatriat" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2" style="padding-right:0px">
                                                <b> Mayoritas Negara</b>
                                            </div>
                                            <div class="col-md-3" style="padding:left:0px">
                                                <input type="text" name="Mayoritas_Negara" id="Mayoritas_Negara"
                                                    class="form-control">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="border mt-2" id="jenis_pekerjaan_apartemen">
                                        <h5 class="mt-3 ml-2">Jenis Pekerjaan<span style="font-size:15px;"><b
                                                    class="ml-1 text-danger" id="error_pekerjaan"><i
                                                        class="fas fa-exclamation-triangle ml-1"></i></b></span>
                                        </h5>
                                        <div class="row  mt-3">
                                            <div class="col-md-1 ml-3 mt-2" style="margin-right:20px;">
                                                <b>Mahasiswa</b>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3" style="width: 105px;">
                                                    <input type="number" name="mahasiswa" id="mahasiswa"
                                                        class="form-control" placeholder="Masukan Mahasiswa" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1  mt-2" style="margin-right:20px;padding-left:0px;">
                                                <b>Karyawan</b>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3" style="width: 105px;">
                                                    <input type="number" name="karyawan" id="karyawan"
                                                        class="form-control" placeholder="Masukan Karyawan" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 ml-1 mt-2" style="margin-right:20px">
                                                <b>Pengusaha</b>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3" style="width: 105px;">
                                                    <input type="number" name="pengusaha" id="pengusaha"
                                                        class="form-control" placeholder="Masukan Pengusaha" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border mt-2" id="status_penghuni">
                                        <h5 class="mt-3 ml-2">Status Penghuni
                                            <span style="font-size:15px;"><b class="ml-1 text-danger"
                                                    id="error_status_penghuni"><i
                                                        class="fas fa-exclamation-triangle ml-1"></i></b></span>
                                        </h5>
                                        <div class="row  mt-3">
                                            <div class="col-md-1 ml-3 mt-2">
                                                <b>Single </b>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3" style="width: 105px;">
                                                    <input type="number" name="single" id="single" class="form-control"
                                                        placeholder="Masukan single" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 ml-1 mt-2"><b id="text_keluarga">Keluarga</b>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3" style="width: 105px;">
                                                    <input type="number" name="keluarga" id="keluarga"
                                                        class="form-control" placeholder="Masukan keluarga" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 ml-1 mt-2" id="45ketas_text"><b>Usia > 45 Thn</b>
                                            </div>
                                            <div class="col-md-4" id="45keatas_input">
                                                <div class="input-group mb-3" style="width: 105px;">
                                                    <input type="number" name="empatlimakeatas" id="empatlimakeatas"
                                                        class="form-control" placeholder="Masukan keluarga" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12" id="mayoritas_jenis_usaha_gedung">
                                <div class="form-group">
                                    <label class="h5">Mayoritas Jenis Usaha (pilih dan isi dengan angka sesuai kondisi
                                        dilapangan)</label>
                                    <div class="border ">
                                        <div class="row ml-2 mr-2 mt-3">

                                            <div class="col-md-3">
                                                <p>Distributor</p>
                                                <p>Resto/Cafe</p>
                                                <p>Bank</p>
                                                <p>Mini Market /Apotek</p>
                                                <p>Tour & Travel</p>
                                                <p>Lembaga Pendidikan</p>





                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" name="Distributor" id="Distributor"
                                                    class="form-control">
                                                <input type="number" name="Resto" id="Resto" class="form-control">
                                                <input type="number" name="Bank" id="Bank" class="form-control">
                                                <input type="number" name="Mini_Market" id="Mini_Market"
                                                    class="form-control">
                                                <input type="number" name="Tour" id="Tour" class="form-control">

                                                <input type="number" name="Lembaga_Pendidikan" id="Lembaga_Pendidikan"
                                                    class="form-control">


                                            </div>
                                            <div class="col-md-3">
                                                <p>Konsultan Non legal & Legal</p>
                                                <p>Modern Market /Hyper Store</p>
                                                <p>ATPM/Principle</p>
                                                <p>Expedisi</p>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" name="Konsultan" id="Konsultan"
                                                    class="form-control">
                                                <input type="number" name="Modern_Market" id="Modern_Market"
                                                    class="form-control">
                                                <input type="number" name="ATPM" id="ATPM" class="form-control">
                                                <input type="number" name="Agency" id="Agency" class="form-control">

                                            </div>

                                        </div>
                                        <p class="ml-2 p-0">Others</p>
                                        <textarea name="Others" id="Others" rows="10"
                                            style="height:100px ;width: 1015px;"
                                            class="form-control ml-2 mb-2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-3 mb-3">
                                <table class="provider">
                                    <tr>
                                        <td rowspan="2" class="bg-primary text-white" colspan="2">Provider Existing</td>
                                        <td colspan="3" class="bg-primary text-white">Berikan tanda cek list</td>
                                        <td colspan="2" class="bg-primary text-white">Eksklusif</td>
                                        <td rowspan="2" class="bg-primary text-white">Durasi Kerjasama s/d. Bln/thn</td>
                                        <td colspan="3" class="bg-primary text-white">Skema Kerjasama</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white">Inet</td>
                                        <td class="bg-primary text-white">TV</td>
                                        <td class="bg-primary text-white">Telp.</td>
                                        <td class="bg-primary text-white">Y</td>
                                        <td class="bg-primary text-white">N</td>
                                        <td class="bg-primary text-white">Rev.Share (%)</td>
                                        <td class="bg-primary text-white">Sewa Lahan(Rp.)</td>
                                    </tr>
                                    <tr>
                                        <td width="20px">1</td>
                                        <td><input type="text" size="3" name="Provider_1" id="Provider_1" /></td>
                                        <td><input type="checkbox" size="3" value="Inet" name="Inet_1" /></td>
                                        <td><input type="checkbox" size="3" value="TV" name="TV_1" /></td>
                                        <td><input type="checkbox" size="3" value="Telp" name="Telp_1" /></td>
                                        <td><input type="radio" size="3" value="YES" name="Eksklusif_y_1"
                                                id="Eksklusif_y_1" /></td>
                                        <td><input type="radio" size="3" value="NO" name="Eksklusif_y_1"
                                                id="Eksklusif_n_1" /></td>
                                        <td><input type="text" size="3" name="Durasi_Kerjasama_1" /></td>
                                        <td><input type="text" size="3" name="Rev_Share_1" /></td>
                                        <td><input type="text" size="3" name="Sewa_Lahan_1" id="Sewa_Lahan_1" /></td>
                                    </tr>
                                    <tr>
                                        <td width="20px">2</td>
                                        <td><input type="text" size="3" name="Provider_2" id="Provider_2" /></td>
                                        <td><input type="checkbox" size="3" value="Inet" name="Inet_2" /></td>
                                        <td><input type="checkbox" value="TV" size="3" name="TV_2" /></td>
                                        <td><input type="checkbox" size="3" value="Telp" name="Telp_2" /></td>
                                        <td><input type="radio" size="3" value="YES" name="Eksklusif_y_2"
                                                id="Eksklusif_y_2" /></td>
                                        <td><input type="radio" size="3" value="NO" name="Eksklusif_y_2"
                                                id="Eksklusif_n_2" /></td>
                                        <td><input type="text" size="3" name="Durasi_Kerjasama_2" /></td>
                                        <td><input type="text" size="3" name="Rev_Share_2" /></td>
                                        <td><input type="text" size="3" name="Sewa_Lahan_2" id="Sewa_Lahan_2" /></td>
                                    </tr>
                                    <tr>
                                        <td width="20px">3</td>
                                        <td><input type="text" size="3" name="Provider_3" id="Provider_3" /></td>
                                        <td><input type="checkbox" size="3" value="Inet" name="Inet_3" /></td>
                                        <td><input type="checkbox" value="TV" size="3" name="TV_3" /></td>
                                        <td><input type="checkbox" size="3" value="Telp" name="Telp_3" /></td>
                                        <td><input type="radio" size="3" value="YES" name="Eksklusif_y_3"
                                                id="Eksklusif_y_3" /></td>
                                        <td><input type="radio" size="3" value="NO" name="Eksklusif_y_3"
                                                id="Eksklusif_n_3" /></td>
                                        <td><input type="text" size="3" name="Durasi_Kerjasama_3" /></td>
                                        <td><input type="text" size="3" name="Rev_Share_3" /></td>
                                        <td><input type="text" size="3" name="Sewa_Lahan_3" id="Sewa_Lahan_3" /></td>
                                    </tr>
                                    <tr>
                                        <td width="20px">4</td>
                                        <td><input type="text" size="3" name="Provider_4" id="Provider_4" /></td>
                                        <td><input type="checkbox" size="3" value="Inet" name="Inet_4" /></td>
                                        <td><input type="checkbox" value="TV" size="3" name="TV_4" /></td>
                                        <td><input type="checkbox" size="3" value="Telp" name="Telp_4" /></td>
                                        <td><input type="radio" size="3" value="YES" name="Eksklusif_y_4"
                                                id="Eksklusif_y_4" /></td>
                                        <td><input type="radio" size="3" value="NO" name="Eksklusif_y_4"
                                                id="Eksklusif_n_4" /></td>
                                        <td><input type="text" size="3" name="Durasi_Kerjasama_4" /></td>
                                        <td><input type="text" size="3" name="Rev_Share_4" /></td>
                                        <td><input type="text" size="3" name="Sewa_Lahan_4" id="Sewa_Lahan_4" /></td>
                                    </tr>
                                    <tr>
                                        <td width="20px">5</td>
                                        <td><input type="text" size="3" name="Provider_5" id="Provider_5" /></td>
                                        <td><input type="checkbox" size="3" value="Inet" name="Inet_5" /></td>
                                        <td><input type="checkbox" value="TV" size="3" name="TV_5" /></td>
                                        <td><input type="checkbox" size="3" value="Telp" name="Telp_5" /></td>
                                        <td><input type="radio" size="3" value="YES" name="Eksklusif_y_5"
                                                id="Eksklusif_y_5" /></td>
                                        <td><input type="radio" size="3" value="NO" name="Eksklusif_y_5"
                                                id="Eksklusif_n_5" /></td>
                                        <td><input type="text" size="3" name="Durasi_Kerjasama_5" /></td>
                                        <td><input type="text" size="3" name="Rev_Share_5" /></td>
                                        <td><input type="text" size="3" name="Sewa_Lahan_5" id="Sewa_Lahan_5" /></td>
                                    </tr>
                                </table>
                            </div>


                            <div class="container mt-3 mb-3 ">
                                <table class="marketing">
                                    <tr>
                                        <td class="text-left bg-primary text-white" style="padding: 10px;width: 220px;">
                                            Penempatan/Pemasangan/
                                            Penyebaran Marketing Tools</td>
                                        <td class="bg-primary text-white" style="padding:10px">Lobby</td>
                                        <td class="bg-primary text-white" style="padding:10px">Basement</td>
                                        <td class="bg-primary text-white" style="width: 100px;">Pintu parkir in/out</td>
                                        <td class="bg-primary text-white" style="width: 80px;">Lift</td>
                                        <td class="bg-primary text-white">Swm. Pool</td>
                                        <td class="bg-primary text-white">Fitness Center</td>
                                        <td class="bg-primary text-white">Cust. Service</td>
                                        <td class="bg-primary text-white" style="padding:10px;">Receptionist</td>
                                        <td class="bg-primary text-white">Harga</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="padding: 10px;width: 220px;">Aktifitas Sales
                                            Probing</td>

                                        <td><input type="checkbox" value="aktifitas_lobby" id="aktifitas_lobby"
                                                name="aktifitas_lobby">
                                        </td>
                                        <td><input type="checkbox" value="aktifitas_basemant" id="aktifitas_basemant"
                                                name="aktifitas_basemant"></td>
                                        <td><input type="checkbox" value="aktifitas_pintu_parkir"
                                                id="aktifitas_pintu_parkir" name="aktifitas_pintu_parkir"></td>
                                        <td><input type="checkbox" value="aktifitas_lift" id="aktifitas_lift"
                                                name="aktifitas_lift">
                                        </td>
                                        <td><input type="checkbox" value="aktifitas_swmg_pool" id="aktifitas_swmg_pool"
                                                name="aktifitas_swmg_pool"></td>
                                        <td><input type="checkbox" value="aktifitas_fitness" id="aktifitas_fitness"
                                                name="aktifitas_fitness"></td>
                                        <td><input type="checkbox" value="aktifitas_mgmt_office"
                                                id="aktifitas_mgmt_office" name="aktifitas_mgmt_office"></td>
                                        <td><input type="checkbox" value="aktifitas_receptionist"
                                                id="aktifitas_receptionist" name="aktifitas_receptionist"></td>
                                        <td><input type="text" name="aktifitas_harga" id="aktifitas_harga"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="padding: 10px;width: 220px;">Pop Up Table
                                            (terlampir)</td>
                                        <td><input type="checkbox" value="POP_UP_TABLE_lobby" id="POP_UP_TABLE_lobby"
                                                name="POP_UP_TABLE_lobby">
                                        </td>
                                        <td><input type="checkbox" value="POP_UP_TABLE_basemant"
                                                id="POP_UP_TABLE_basemant" name="POP_UP_TABLE_basemant"></td>
                                        <td><input type="checkbox" value="POP_UP_TABLE_pintu_parkir"
                                                id="POP_UP_TABLE_pintu_parkir" name="POP_UP_TABLE_pintu_parkir"></td>
                                        <td><input type="checkbox" value="POP_UP_TABLE_lift" id="POP_UP_TABLE_lift"
                                                name="POP_UP_TABLE_lift">
                                        </td>
                                        <td><input type="checkbox" value="POP_UP_TABLE_swmg_pool"
                                                id="POP_UP_TABLE_swmg_pool" name="POP_UP_TABLE_swmg_pool"></td>
                                        <td><input type="checkbox" value="POP_UP_TABLE_fitness"
                                                id="POP_UP_TABLE_fitness" name="POP_UP_TABLE_fitness"></td>
                                        <td><input type="checkbox" value="POP_UP_TABLE_mgmt_office"
                                                id="POP_UP_TABLE_mgmt_office" name="POP_UP_TABLE_mgmt_office"></td>
                                        <td><input type="checkbox" value="POP_UP_TABLE_receptionist"
                                                id="POP_UP_TABLE_receptionist" name="POP_UP_TABLE_receptionist"></td>
                                        <td><input type="text" name="POP_UP_TABLE_harga" id="POP_UP_TABLE_harga"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="padding: 10px;width: 220px;">Penempatan Spanduk
                                        </td>

                                        <td><input type="checkbox" value="penempatan_standuk_lobby"
                                                id="penempatan_standuk_lobby" name="penempatan_standuk_lobby">
                                        </td>
                                        <td><input type="checkbox" value="penempatan_standuk_basemant"
                                                id="penempatan_standuk_basemant" name="penempatan_standuk_basemant">
                                        </td>
                                        <td><input type="checkbox" value="penempatan_standuk_pintu_parkir"
                                                id="penempatan_standuk_pintu_parkir"
                                                name="penempatan_standuk_pintu_parkir"></td>
                                        <td><input type="checkbox" value="penempatan_standuk_lift"
                                                id="penempatan_standuk_lift" name="penempatan_standuk_lift">
                                        </td>
                                        <td><input type="checkbox" value="penempatan_standuk_swmg_pool"
                                                id="penempatan_standuk_swmg_pool" name="penempatan_standuk_swmg_pool">
                                        </td>
                                        <td><input type="checkbox" value="penempatan_standuk_fitness"
                                                id="penempatan_standuk_fitness" name="penempatan_standuk_fitness"></td>
                                        <td><input type="checkbox" value="penempatan_standuk_mgmt_office"
                                                id="penempatan_standuk_mgmt_office"
                                                name="penempatan_standuk_mgmt_office"></td>
                                        <td><input type="checkbox" value="penempatan_standuk_receptionist"
                                                id="penempatan_standuk_receptionist"
                                                name="penempatan_standuk_receptionist"></td>
                                        <td><input type="text" name="standuk_harga" id="standuk_harga"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="padding: 10px;width: 220px;">Penempatan Poster
                                            (terlampir)</td>
                                        <td><input type="checkbox" value="Penempatan_Poster_lobby"
                                                id="Penempatan_Poster_lobby" name="Penempatan_Poster_lobby">
                                        </td>
                                        <td><input type="checkbox" value="Penempatan_Poster_basemant"
                                                id="Penempatan_Poster_basemant" name="Penempatan_Poster_basemant"></td>
                                        <td><input type="checkbox" value="Penempatan_Poster_pintu_parkir"
                                                id="Penempatan_Poster_pintu_parkir"
                                                name="Penempatan_Poster_pintu_parkir"></td>
                                        <td><input type="checkbox" value="Penempatan_Poster_lift"
                                                id="Penempatan_Poster_lift" name="Penempatan_Poster_lift">
                                        </td>
                                        <td><input type="checkbox" value="Penempatan_Poster_swmg_pool"
                                                id="Penempatan_Poster_swmg_pool" name="Penempatan_Poster_swmg_pool">
                                        </td>
                                        <td><input type="checkbox" value="Penempatan_Poster_fitness"
                                                id="Penempatan_Poster_fitness" name="Penempatan_Poster_fitness"></td>
                                        <td><input type="checkbox" value="Penempatan_Poster_mgmt_office"
                                                id="Penempatan_Poster_mgmt_office" name="Penempatan_Poster_mgmt_office">
                                        </td>
                                        <td><input type="checkbox" value="Penempatan_Poster_receptionist"
                                                id="Penempatan_Poster_receptionist"
                                                name="Penempatan_Poster_receptionist"></td>
                                        <td><input type="text" name="Penempatan_Poster_harga"
                                                id="Penempatan_Poster_harga"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="padding: 10px;width: 220px;">Sticker Pintu Lift
                                            (terlampir)</td>
                                        <td><input type="checkbox" value="sticker_lobby" id="sticker_lobby"
                                                name="sticker_lobby">
                                        </td>
                                        <td><input type="checkbox" value="sticker_basemant" id="sticker_basemant"
                                                name="sticker_basemant"></td>
                                        <td><input type="checkbox" value="sticker_pintu_parkir"
                                                id="sticker_pintu_parkir" name="sticker_pintu_parkir"></td>
                                        <td><input type="checkbox" value="sticker_lift" id="sticker_lift"
                                                name="sticker_lift">
                                        </td>
                                        <td><input type="checkbox" value="sticker_swmg_pool" id="sticker_swmg_pool"
                                                name="sticker_swmg_pool"></td>
                                        <td><input type="checkbox" value="sticker_fitness" id="sticker_fitness"
                                                name="sticker_fitness"></td>
                                        <td><input type="checkbox" value="sticker_mgmt_office" id="sticker_mgmt_office"
                                                name="sticker_mgmt_office"></td>
                                        <td><input type="checkbox" value="sticker_receptionist"
                                                id="sticker_receptionist" name="sticker_receptionist"></td>
                                        <td><input type="text" name="sticker_harga" id="sticker_harga"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="padding: 10px;width: 220px;">X/Roll Up Banner
                                            (terlampir)</td>
                                        <td><input type="checkbox" value="roll_up_lobby" id="roll_up_lobby"
                                                name="roll_up_lobby">
                                        </td>
                                        <td><input type="checkbox" value="roll_up_basemant" id="roll_up_basemant"
                                                name="roll_up_basemant"></td>
                                        <td><input type="checkbox" value="roll_up_pintu_parkir"
                                                id="roll_up_pintu_parkir" name="roll_up_pintu_parkir"></td>
                                        <td><input type="checkbox" value="roll_up_lift" id="roll_up_lift"
                                                name="roll_up_lift">
                                        </td>
                                        <td><input type="checkbox" value="roll_up_swmg_pool" id="roll_up_swmg_pool"
                                                name="roll_up_swmg_pool"></td>
                                        <td><input type="checkbox" value="roll_up_fitness" id="roll_up_fitness"
                                                name="roll_up_fitness"></td>
                                        <td><input type="checkbox" value="roll_up_mgmt_office" id="roll_up_mgmt_office"
                                                name="roll_up_mgmt_office"></td>
                                        <td><input type="checkbox" value="roll_up_receptionist"
                                                id="roll_up_receptionist" name="roll_up_receptionist"></td>
                                        <td><input type="text" name="roll_up_harga" id="roll_up_harga"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" style="padding: 10px;width: 220px;">Acrilic Box /Brosur
                                            (terlampir)</td>
                                        <td><input type="checkbox" value="acrilic_lobby" id="acrilic_lobby"
                                                name="acrilic_lobby">
                                        </td>
                                        <td><input type="checkbox" value="acrilic_basemant" id="acrilic_basemant"
                                                name="acrilic_basemant"></td>
                                        <td><input type="checkbox" value="acrilic_pintu_parkir"
                                                id="acrilic_pintu_parkir" name="acrilic_pintu_parkir"></td>
                                        <td><input type="checkbox" value="acrilic_lift" id="acrilic_lift"
                                                name="acrilic_lift">
                                        </td>
                                        <td><input type="checkbox" value="acrilic_swmg_pool" id="acrilic_swmg_pool"
                                                name="acrilic_swmg_pool"></td>
                                        <td><input type="checkbox" value="acrilic_fitness" id="acrilic_fitness"
                                                name="acrilic_fitness"></td>
                                        <td><input type="checkbox" value="acrilic_mgmt_office" id="acrilic_mgmt_office"
                                                name="acrilic_mgmt_office"></td>
                                        <td><input type="checkbox" value="acrilic_receptionist"
                                                id="acrilic_receptionist" name="acrilic_receptionist"></td>
                                        <td><input type="text" name="acrilic_harga" id="acrilic_harga"></td>
                                    </tr>

                                </table>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS"
                                        id="UPDATE_PROGRESS" cols="30" rows="10" class="form-control"></textarea>
                                    <div class="col-sm-6 mt-4">
                                        <button type="submit " class="btn btn-primary"
                                            style="width:100px;">Save</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>










                {{-- </div> --}}
                <div id="Edit_NEGOTIATION_1" class="ilang">
                    <form method="POST" action="{{Route('update.negotiation')}}" name="Edit_NEGOTIATION_1"
                        id="Edit_NEGOTIATION_FORM">
                        <div class="row">
                            <input type="hidden" name="id_NEGOTIATION" id="id_NEGOTIATION" />
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_NEGOTIATION_1" class="form-control">
                                        <option value="DESK SURVEY">DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" selected>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY">SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS">PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS">SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL">READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>REVENUE SHARE</label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="REVENUE_SHARE" id="REVENUE_SHARE"
                                            class="form-control" placeholder="Masukan REVENUE_SHARE" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>RENTAL BASE</label>
                                    <input type="text" name="RENTAL_BASE" id="RENTAL_BASE" class="form-control"
                                        placeholder="Masukan RENTAL BASE" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>ONE TIME FEE</label>
                                    <input type="text" name="ONE_TIME_FEE" id="ONE_TIME_FEE" class="form-control"
                                        placeholder="Masukan ONE TIME FEE" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>FREE WIFI</label>
                                    <input type="number" name="FREE_WIFI" id="FREE_WIFI" class="form-control"
                                        placeholder="Masukan FREE WIFI" />
                                </div>
                            </div>
                            <div class="container">

                                <div class="border w-100">
                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group">
                                            <label>FREE SERVICES</label> <br>
                                            <div class="form-check form-check-inline">
                                                <input type="text" class="form-control" style="width:50px;"
                                                    name="FREE_SERVICE_1" id="FREE_SERVICE_1_1_1">
                                                <label class="form-check-label" for="inlineCheckbox1">
                                                    &nbsp&nbspLayanan</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <select class="form-control" name="FREE_SERVICE_2" id="FREE_SERVICE_2">
                                                    <option value="10 Mbps">10</option>
                                                    <option value="15 Mbps">15</option>
                                                    <option value="20 Mbps">20</option>
                                                    <option value="30 Mbps">30</option>
                                                    <option value="50 Mbps">50</option>
                                                    <option value="70 Mbps">70</option>
                                                </select>
                                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> --}}
                                                <label class="form-check-label" for="inlineCheckbox2">
                                                    &nbsp&nbspMbps</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <select name="FREE_SERVICE_3" id="iptv" id="FREE_SERVICE_3"
                                                    class="form-control">
                                                    <option value="Family Pack">Family Pack</option>
                                                </select>
                                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" > --}}
                                                <label class="form-check-label" for="inlineCheckbox3">
                                                    &nbsp&nbspIPTV</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <select name="FREE_SERVICE_4" id="FREE_SERVICE_4" class="form-control">
                                                    <option value="Entertainment" selected>Entertainment</option>
                                                    <option value="Lifestyle - Licious">Lifestyle - Licious</option>
                                                    <option value="Kids Junior Pack">Kids Junior Pack</option>
                                                    <option value="Happy Kids">Happy Kids</option>
                                                    <option value="NHK World Premium">NHK World Premium</option>
                                                    <option value="Asian Movies Lover">Asian Movies Lover</option>
                                                    <option value="Smartpedia">Smartpedia</option>
                                                    <option value="HBO Freak">HBO Freak</option>
                                                    <option value="Fox Movies Addict">Fox Movies Addict</option>
                                                    <option value="Sport Combo">Sport Combo</option>
                                                    <option value="Soccer Mania">Soccer Mania</option>
                                                    <option value="India 1">India 1</option>
                                                </select>
                                                <label class="form-check-label" for="inlineCheckbox3">
                                                    &nbsp&nbspALaCarte </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input type="text" class="form-control" style="width:50px;"
                                                    name="FREE_SERVICE_5" id="FREE_SERVICE_5">
                                                <label class="form-check-label" for="inlineCheckbox1">
                                                    &nbsp&nbspLayanan</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <select class="form-control" name="FREE_SERVICE_6" id="FREE_SERVICE_6">
                                                    <option value="10 Mbps">10</option>
                                                    <option value="15 Mbps">15</option>
                                                    <option value="20 Mbps">20</option>
                                                    <option value="30 Mbps">30</option>
                                                    <option value="50 Mbps">50</option>
                                                    <option value="70 Mbps">70</option>
                                                </select>
                                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> --}}
                                                <label class="form-check-label" for="inlineCheckbox2">
                                                    &nbsp&nbspMbps</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <select name="FREE_SERVICE_7" id="iptv" id="FREE_SERVICE_7"
                                                    class="form-control">
                                                    <option value="Family Pack">Family Pack</option>
                                                </select>
                                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" > --}}
                                                <label class="form-check-label" for="inlineCheckbox3">
                                                    &nbsp&nbspIPTV</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <select name="FREE_SERVICE_8" id="FREE_SERVICE_8" class="form-control">
                                                    <option value="Entertainment">Entertainment</option>
                                                    <option value="Lifestyle - Licious">Lifestyle - Licious</option>
                                                    <option value="Kids Junior Pack">Kids Junior Pack</option>
                                                    <option value="Happy Kids">Happy Kids</option>
                                                    <option value="NHK World Premium">NHK World Premium</option>
                                                    <option value="Asian Movies Lover">Asian Movies Lover</option>
                                                    <option value="Smartpedia">Smartpedia</option>
                                                    <option value="HBO Freak">HBO Freak</option>
                                                    <option value="Fox Movies Addict">Fox Movies Addict</option>
                                                    <option value="Sport Combo">Sport Combo</option>
                                                    <option value="Soccer Mania">Soccer Mania</option>
                                                    <option value="India 1">India 1</option>
                                                </select>
                                                <label class="form-check-label" for="inlineCheckbox3">
                                                    &nbsp&nbspALaCarte </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_NEGOTION_1"
                                        id="UPDATE_PROGRESS_NEGOTION_1" cols="30" rows="10"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <button type="submit" form="Edit_NEGOTIATION_FORM" class="btn btn-primary"
                                    style="width:100px;">Save</button>
                                {{-- <input type="submit" value="save"> --}}
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>


                <div id="Edit_SITE_SURVEY" class="ilang">
                    <div class="border mb-3">
                        <div class="row mt-2 ml-2">
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>UPLOAD FA FULL (PDF)</label>
                                    <div class="form-group clearfix">
                                        <form action="{{Route('update.uploadFAFULL')}}" name="UPLOAD_FA_FULL_PDF"
                                            id="UPLOAD_FA_FULL_PDF" method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="id_SITE_SURVEY_PDF" name="id_SITE_SURVEY_PDF">
                                            <input type="file" accept=".pdf" name="UPLOAD_FA_FULL"
                                                id="UPLOAD_FA_FULL" />
                                            <input type="submit" value="UPLOAD"
                                                class="btn btn-primary btn-sm mt-3 w-50">

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>UPLOAD WO (PDF)</label>
                                    <div class="form-group clearfix">
                                        <form action="{{Route('update.FirstWO')}}" name="UPLOAD_FIRST_WO"
                                            id="UPLOAD_FIRST_WO" method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="id_FIRST_WO_PDF" name="id_FIRST_WO_PDF">
                                            <input type="file" accept=".pdf" name="UPLOAD_FIRST_WO"
                                                id="UPLOAD_FIRST_WO" />
                                            <input type="submit" value="UPLOAD"
                                                class="btn btn-primary btn-sm mt-3 w-50">

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{Route('update.site_survey')}}" id="Edit_SITE_SURVEY_FORM"
                        name="Edit_SITE_SURVEY" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" id="id_SITE_SURVEY" name="id_SITE_SURVEY">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS_SURVEY"
                                        class="form-control">
                                        <option value="DESK SURVEY">DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME">NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" selected>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS">PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS">SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL">READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>DATE SALES SIGNED</label>
                                    <input type="text" data-toggle="datepicker" name="SALES_SIGNED" id="SALES_SIGNED"
                                        class="form-control">

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SITE SURVEY DATE</label>
                                    <input type="text" data-toggle="datepicker" name="SITE_SURVEY_DATE"
                                        id="SITE_SURVEY_DATE" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>GM SALES SIGNED</label>
                                    <input type="text" data-toggle="datepicker" name="GM_SALES_SIGNED"
                                        id="GM_SALES_SIGNED" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>RECOMENDATION</label>
                                    <select name="RECOMENDATION" id="RECOMENDATION" class="form-control">
                                        <option value="Approve">Approve</option>
                                        <option value="Reject">Reject</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>WO DATE</label>
                                    <input type="text" data-toggle="datepicker" name="WO_DATE_SITE_SURVEY"
                                        class="form-control" id="WO_DATE_SITE_SURVEY">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_SITE_SURVEY"
                                        id="UPDATE_PROGRESS_SITE_SURVEY" cols="30" rows="10"
                                        class="form-control"></textarea>
                                </div>
                            </div>


                            <div class="col-sm-6 mt-4">
                                <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="Edit_BOQ" class="ilang">
                    <div class="border">

                        <div class="row mt-2 ml-2 ">
                            <div class="col-sm-6">
                                <form action="{{Route('uploadBOQ_SITE_SURVEY')}}" id="site_survey_pdf"
                                    name="site_survey_pdf" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" id="id_BOQ_PDF_SITE_SURVEY" name="id_BOQ_PDF_SITE_SURVEY">
                                    <div class="form-group">
                                        <label>UPLOAD SITE SURVEY</label> <br>
                                        <input type="file" accept=".pdf" name="site_survey_pdf" id>
                                        <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                                    </div>
                                </form>

                            </div>

                            <div class="col-sm-6">
                                <form action="{{Route('uploadBOQ')}}" id="upload_boq_pdf" name="upload_boq_pdf"
                                    method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>UPLOAD BOQ</label> <br>
                                        <input type="hidden" id="id_BOQ_UPLOAD" name="id_BOQ_UPLOAD">
                                        <input type="file" accept=".pdf" name="upload_boq_pdf" id="upload_boq_pdf">
                                        <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{Route('uploadAPD')}}" id="upload_apd_pdf_FORM"
                                    name="upload_apd_pdf_FORM" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>UPLOAD APD/ABD</label> <br>
                                        <input type="hidden" id="id_apd_UPLOAD" name="id_apd_UPLOAD">
                                        <input type="file" accept=".pdf" name="upload_apd_pdf" id="upload_apd_pdf_data">
                                        <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{Route('update.boq')}}" name="Edit_BOQ" id="Edit_BOQ_FORM" class="mt-2"
                        enctype="multipart/form-data">
                        <div class=" row ">
                            <input type="hidden" id="id_BOQ" name="id_BOQ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS_BOQ"
                                        class="form-control">
                                        <option value="DESK SURVEY">DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME">NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY">SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" selected>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS">PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS">SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL">READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>BOQ, SITE SURVEY REPORT, DESIGNN</label>
                                    <input type="text" name="BOQ_DATE" data-toggle="datepicker" id="BOQ_DATE"
                                        class="form-control">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_BOQ"
                                        id="UPDATE_PROGRESS_BOQ" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="Edit_PNL" class="ilang">
                    <div class="border mb-2">
                        <div class="row mt-2 ml-2">
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>UPLOAD PNL FULL APPROVE</label>
                                    <div class="form-group clearfix">
                                        <form action="{{Route('UploadPNL')}}" name="upload_pnl_pdf" id="upload_pnl_pdf"
                                            method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="id_PNL_PDF" name="id_PNL_PDF">
                                            <input type="file" accept=".pdf" name="upload_pnl_pdf" id>
                                            <input type="submit" class="btn btn-primary btn-sm mt-3 w-50">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>UPLOAD DRAFT PNL</label>
                                    <div class="form-group clearfix">
                                        <form action="{{Route('UploadDraftPnl')}}" name="upload_draft_pnl_pdf"
                            id="upload_draft_pnl_pdf" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="id_Draft_PNL_PDF" name="id_PNL_PDF">
                            <input type="file" accept=".pdf" name="upload_draft_pnl_pdf" id>
                            <input type="submit" class="btn btn-primary btn-sm mt-3 w-50">
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <form method="POST" action="{{Route('update.pnl')}}" name="Edit_PNL" id="Edit_PNL_FORM"
            enctype="multipart/form-data">
            <input type="hidden" name="id_PNL" id="id_PNL" />
            <div class=" row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>PROGRESS STATUS</label>
                        <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS_PNL"
                            class="form-control">
                            <option value="DESK SURVEY">DESK SURVEY</option>
                            <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                            <option value="NEGOTIATION 1 - BUSINESS SCHEME">NEGOTIATION 1 -
                                BUSINESS SCHEME
                            </option>
                            <option value="SITE SURVEY">SITE SURVEY</option>
                            <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY
                                REPORT, DESIGN
                            </option>
                            <option value="PnL PROGRESS" selected>PnL PROGRESS</option>
                            <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW</option>
                            <option value="SIGNED PKS">SIGNED PKS</option>
                            <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                            <option value="READY TO SELL">READY TO SELL</option>
                            <option value="REJECT">REJECT</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>PNL FULL APPROVE DATE</label>
                        <input type="text" name="PNL_DATE" id="PNL_DATE" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>HP</label>
                        <input type="text" name="hp" id="hp" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Periode Kerjasama (thn)</label>
                        <input type="text" name="Periode_kerjasama" id="Periode_kerjasama" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Status Kerjasama</label>
                        <select name="status_kerjasama_pnl" class="form-control" id="status_kerjasama_pnl">
                            <option value="YES" id="Exclusive" selected>Exclusive</option>
                            <option value="NO" id="Not_Exclusive">Not Exclusive</option>
                        </select>
                        {{-- <input type="text" name id="status_kerjasama" class="form-control"> --}}
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Tingkat Okupansi</label>
                    <div class="input-group mb-3">
                        <input type="text" name="tingkat_okupansi_pnl" id="tingkat_okupansi_pnl" class="form-control">

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Target dari Occp Based</label>
                        <input type="text" name="occp_based" id="occp_based" class="form-control">
                    </div>
                </div>



                <div class="col-md-12">
                    <h3>Biaya</h3>
                    <hr style="border:1px solid black">
                </div>
                <div class="col-sm-2">
                    <label>Rev Share(%)</label>
                    <div class="input-group mb-3">
                        <input type="text" name="pnl_rev_share_persen" id="pnl_rev_share_persen" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Rev Share(Rp)</label>
                        <input type="text" name="rev_share_rp" id="rev_share_rp" class="form-control">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Biaya Sewa</label>
                        <input type="text" name="biaya_sewa" id="biaya_sewa" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>One Time Fee</label>
                        <input type="text" name="one_time_fee" id="one_time_fee" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-group">
                        <label>Total Biaya</label>
                        <input type="text" name="total_biaya" id="total_biaya" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Total Revenue(Rp)</label>
                        <input type="text" name="total_revenue" id="total_revenue" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Investasi</label>
                        <input type="text" name="Investasi" id="Investasi" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="form-group">
                        <label>COGS(Rp)</label>
                        <input type="text" name="COGS" id="COGS" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="form-group">
                        <label>CPE Cost (STB+ONT+OW) (Rp)</label>
                        <input type="text" name="cpe_cost" id="cpe_cost" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>Margin</h3>
                    <hr style="border:1px solid black">
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>by Total Duration (Rp)</label>
                        <input type="text" name="magin_duration" id="magin_duration" class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <label>Persentase (%)</label>
                    <div class="input-group mb-3">
                        <input type="text" name="margin_persentase" id="margin_persentase" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Breakeven Point(thn)</label>
                        <input type="text" name="Breakeven" id="Breakeven" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <hr style="border:1px solid black">
                </div>
                <div class="col-md-12">
                    <div class="border w-100">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group">
                                <label>FREE SERVICES</label> <br>
                                <div class="form-check form-check-inline">
                                    <input type="text" class="form-control" style="width:50px;" name="FREE_SERVICE_1"
                                        id="FREE_SERVICE_1_1_PNL">
                                    <label class="form-check-label" for="inlineCheckbox1">
                                        &nbsp&nbspLayanan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <select class="form-control" name="FREE_SERVICE_2" id="FREE_SERVICE_2_PNL">
                                        <option value="10 Mbps">10</option>
                                        <option value="15 Mbps">15</option>
                                        <option value="20 Mbps">20</option>
                                        <option value="30 Mbps">30</option>
                                        <option value="50 Mbps">50</option>
                                        <option value="70 Mbps">70</option>
                                    </select>
                                    {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> --}}
                                    <label class="form-check-label" for="inlineCheckbox2">
                                        &nbsp&nbspMbps</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <select name="FREE_SERVICE_3" id="iptv" id="FREE_SERVICE_3_PNL"
                                        class="form-control">
                                        <option value="Family Pack">Family Pack</option>
                                    </select>
                                    {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" > --}}
                                    <label class="form-check-label" for="inlineCheckbox3">
                                        &nbsp&nbspIPTV</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <select name="FREE_SERVICE_4" id="FREE_SERVICE_4_PNL" class="form-control">
                                        <option value="Entertainment" selected>Entertainment</option>
                                        <option value="Lifestyle - Licious">Lifestyle - Licious</option>
                                        <option value="Kids Junior Pack">Kids Junior Pack</option>
                                        <option value="Happy Kids">Happy Kids</option>
                                        <option value="NHK World Premium">NHK World Premium</option>
                                        <option value="Asian Movies Lover">Asian Movies Lover</option>
                                        <option value="Smartpedia">Smartpedia</option>
                                        <option value="HBO Freak">HBO Freak</option>
                                        <option value="Fox Movies Addict">Fox Movies Addict</option>
                                        <option value="Sport Combo">Sport Combo</option>
                                        <option value="Soccer Mania">Soccer Mania</option>
                                        <option value="India 1">India 1</option>
                                    </select>
                                    <label class="form-check-label" for="inlineCheckbox3">
                                        &nbsp&nbspALaCarte </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input type="text" class="form-control" style="width:50px;" name="FREE_SERVICE_5"
                                        id="FREE_SERVICE_5_PNL">
                                    <label class="form-check-label" for="inlineCheckbox1">
                                        &nbsp&nbspLayanan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <select class="form-control" name="FREE_SERVICE_6" id="FREE_SERVICE_6_PNL">
                                        <option value="10 Mbps">10</option>
                                        <option value="15 Mbps">15</option>
                                        <option value="20 Mbps">20</option>
                                        <option value="30 Mbps">30</option>
                                        <option value="50 Mbps">50</option>
                                        <option value="70 Mbps">70</option>
                                    </select>
                                    {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> --}}
                                    <label class="form-check-label" for="inlineCheckbox2">
                                        &nbsp&nbspMbps</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <select name="FREE_SERVICE_7" id="iptv" id="FREE_SERVICE_7_PNL"
                                        class="form-control">
                                        <option value="Family Pack">Family Pack</option>
                                    </select>
                                    {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" > --}}
                                    <label class="form-check-label" for="inlineCheckbox3">
                                        &nbsp&nbspIPTV</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <select name="FREE_SERVICE_8" id="FREE_SERVICE_8_PNL" class="form-control">
                                        <option value="Entertainment">Entertainment</option>
                                        <option value="Lifestyle - Licious">Lifestyle - Licious</option>
                                        <option value="Kids Junior Pack">Kids Junior Pack</option>
                                        <option value="Happy Kids">Happy Kids</option>
                                        <option value="NHK World Premium">NHK World Premium</option>
                                        <option value="Asian Movies Lover">Asian Movies Lover</option>
                                        <option value="Smartpedia">Smartpedia</option>
                                        <option value="HBO Freak">HBO Freak</option>
                                        <option value="Fox Movies Addict">Fox Movies Addict</option>
                                        <option value="Sport Combo">Sport Combo</option>
                                        <option value="Soccer Mania">Soccer Mania</option>
                                        <option value="India 1">India 1</option>
                                    </select>
                                    <label class="form-check-label" for="inlineCheckbox3">
                                        &nbsp&nbspALaCarte </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 mt-5">
                    <div class="form-group">
                        <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_PNL"
                            id="UPDATE_PROGRESS_PNL" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-6 mt-4">
                    <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>


    <div id="Edit_PKS_REVIEW" class="ilang">
        <form method="POST" name="Edit_PKS_REVIEW" action="{{Route('update.pks_date')}}">
            <input type="hidden" name="id_PKS_REVIEW" id="id_PKS_REVIEW" />
            <div class=" row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>PROGRESS STATUS</label>
                        <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS_PKS_REVIEW"
                            class="form-control">
                            <option value="DESK SURVEY">DESK SURVEY</option>
                            <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                            <option value="NEGOTIATION 1 - BUSINESS SCHEME">NEGOTIATION 1 -
                                BUSINESS SCHEME
                            </option>
                            <option value="SITE SURVEY">SITE SURVEY</option>
                            <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY
                                REPORT, DESIGN
                            </option>
                            <option value="PnL PROGRESS">PnL PROGRESS</option>
                            <option value="NEGOTIATION 2 - PKS REVIEW" selected>NEGOTIATION 2 - PKS REVIEW
                            </option>
                            <option value="SIGNED PKS">SIGNED PKS</option>
                            <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                            <option value="READY TO SELL">READY TO SELL</option>
                            <option value="REJECT">REJECT</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>PKS REVIEW DATE</label> <br>
                        <input type="text" data-toggle="datepicker" class="form-control" name="pks_review_date"
                            id="pks_review_date">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>UPDATE PROGRESS</label>
                        <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_PKS_REVIEW"
                            id="UPDATE_PROGRESS_PKS_REVIEW" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-6 mt-4">
                    <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>

    <div id="Edit_ROLL" class="ilang">
        <div class="border mb-3">

            <div class="row mt-2 ml-2">
                <div class="col-sm-6 ">
                    <div class="form-group">
                        <label>UPLOAD WO</label>
                        <div class="form-group clearfix">
                            <form action="{{Route('updateWO')}}" name="wo_pdf" id="wo_pdf" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" id="id_WO_PDF" name="id_WO_PDF">
                                <input type="file" accept=".pdf" name="wo_pdf" id="wo_pdf">
                                <input type="submit" value="UPLOAD" class="btn btn-primary btn-sm mt-3 w-50">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>UPLOAD Sign PKS (PDF)</label>
                        <div class="form-group clearfix">
                            <form action="{{Route('PKS_PDF')}}" id="PKS_PDF" name="PKS_PDF" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id_PKS_PDF" id="id_PKS_PDF" />
                                <input type="file" accept=".pdf" name="PKS_PDF_SIGN" id="PKS_PDF_SIGN" />
                                <input type="submit" value="UPLOAD" class="btn btn-primary btn-sm mt-3 w-50">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" name="Edit_ROLL" id="Edit_ROLL_FORM" action="{{Route('update.ROLL_OUT')}}"
            enctype="multipart/form-data">
            <input type="hidden" name="id_ROLL" id="id_ROLL" />
            <div class=" row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>PROGRESS STATUS</label>
                        <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS" class="form-control">
                            <option value="DESK SURVEY">DESK SURVEY</option>
                            <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                            <option value="NEGOTIATION 1 - BUSINESS SCHEME">NEGOTIATION 1 -
                                BUSINESS SCHEME
                            </option>
                            <option value="SITE SURVEY">SITE SURVEY</option>
                            <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY
                                REPORT, DESIGN
                            </option>
                            <option value="PnL PROGRESS">PnL PROGRESS</option>
                            <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
                            </option>
                            <option value="SIGNED PKS">SIGNED PKS</option>
                            <option value="ROLL-OUT PROGRESS" selected>ROLL-OUT PROGRESS</option>
                            <option value="READY TO SELL">READY TO SELL</option>
                            <option value="REJECT">REJECT</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>WO DATE</label> <br>
                        <input type="text" data-toggle="datepicker" class="form-control" name="wo_date" id="wo_date">
                    </div>
                </div>



                <div class="col-sm-12">
                    <div class="form-group">
                        <label>UPDATE PROGRESS</label>
                        <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_ROLL"
                            id="UPDATE_PROGRESS_ROLL" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-6 mt-4">
                    <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>

    <div id="Edit_REJECT" class="ilang">
        <div class="border">
            <div class="row mt-2 ml-2">
                <div class="col-sm-3 mb-3">
                    <div class="form-group">
                        <label>UPLOAD FA (PDF)</label>
                        <form action="{{Route('update.uploadFAFULLREJECT')}}" name="uploadFAREJECT" id="uploadFAREJECT"
                            method="post" enctype="multipart/form-data">
                            <div class="form-group clearfix">
                                <input type="hidden" name="id_proposal_pdf_reject" id="id_proposal_pdf_reject" />
                                <input type="file" accept=".pdf" name="form_fa" />
                                <input type="submit" value="UPLOAD" class="btn btn-primary btn-sm mt-3 w-50">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{Route('update.reject')}}" id="id_REJECT_FORM">
            <input type="hidden" name="id_REJECT" id="id_REJECT" />
            <div class=" row mt-2">
                <div class="col-sm-4">
                    <div class="form-group">

                        <label>PROGRESS STATUS</label>
                        <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS" class="form-control">
                            <option value="DESK SURVEY">DESK SURVEY</option>
                            <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                            <option value="NEGOTIATION 1 - BUSINESS SCHEME">NEGOTIATION 1 -
                                BUSINESS SCHEME
                            </option>
                            <option value="SITE SURVEY">SITE SURVEY</option>
                            <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY
                                REPORT, DESIGN
                            </option>
                            <option value="PnL PROGRESS">PnL PROGRESS</option>
                            <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
                            </option>
                            <option value="SIGNED PKS">SIGNED PKS</option>
                            <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                            <option value="READY TO SELL">READY TO SELL</option>
                            <option value="REJECT" selected>REJECT</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Reject Date</label> <br>
                        <input type="text" data-toggle="datepicker" class="form-control" name="reject_date"
                            id="reject_date">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Reject Code</label> <br>
                        <select name="Reject_Code" id="Reject_Code" class="form-control">
                            <option value="Exclusive">Exclusive</option>
                            <option value="Limited ISP Provider">Limited ISP Provider</option>
                            <option value="Sales isn t recommend">Sales isn't recommend</option>
                            <option value="IKR/OSP isn t recommend">IKR/OSP isn't recommend</option>
                            <option value="PnL calculation is not meet
                                            minimum margin profit">PnL calculation is not meet
                                minimum margin profit</option>
                            <option value="Business Scheme is not meet SOP">Business Scheme is not meet SOP
                            </option>

                        </select>

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>UPDATE PROGRESS</label>
                        <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_REJECT"
                            id="UPDATE_PROGRESS_REJECT" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-6 mt-4">
                    <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>


    <div id="Edit_READY" class="ilang">
        <div class="border mb-3">
            <div class="row">
                <div class="col-sm-3 mt-2 ml-2 ">
                    <div class="form-group">
                        <label>UPLOAD BASO </label>
                        <div class="form-group clearfix">
                            <form action="{{Route('update.updateBASO')}}" id="BASO_PDF" name="BASO_PDF" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id_BASO_PDF" id="id_BASO_PDF" />
                                <input type="file" accept=".pdf" name="baso_pdf" id="BASO_PDF" />
                                <input type="submit" value="UPLOAD" class="btn btn-primary btn-sm mt-3 w-50">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" name="Edit_READY" id="Edit_READY_FORM" action="{{Route('update.ready')}}">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="hidden" name="id_READY" id="id_READY" />
                        <label>PROGRESS STATUS</label>
                        <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS" class="form-control">
                            <option value="DESK SURVEY">DESK SURVEY</option>
                            <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                            <option value="NEGOTIATION 1 - BUSINESS SCHEME">NEGOTIATION 1 -
                                BUSINESS SCHEME
                            </option>
                            <option value="SITE SURVEY">SITE SURVEY</option>
                            <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY
                                REPORT, DESIGN
                            </option>
                            <option value="PnL PROGRESS">PnL PROGRESS</option>
                            <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
                            </option>
                            <option value="SIGNED PKS">SIGNED PKS</option>
                            <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                            <option value="READY TO SELL" selected>READY TO SELL</option>
                            <option value="REJECT">REJECT</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No BASO/BAST</label> <br>
                        <input type="text" class="form-control" name="BASO" id="BASO">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>PKS Date (Baso)</label> <br>
                        <input type="text" data-toggle="datepicker" class="form-control" name="baso_date"
                            id="baso_date">
                    </div>
                </div>


                <div class="col-sm-3">
                    <label>HP (Port)</label> <br>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="hp_port" id="hp_port">
                        <div class="input-group-append">
                            <span class="input-group-text">HP</span>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <label>Agreement Duration </label> <br>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="duration" id="duration">
                        <div class="input-group-append">
                            <span class="input-group-text">Tahun</span>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>PKS End </label> <br>
                        <input type="text" maxlength="10" data-toggle="datepicker" readonly="readonly"
                            class="form-control" name="pks_end" id="pks_end">
                    </div>
                </div>




                <div class="col-sm-12">
                    <div class="form-group">
                        <label>UPDATE PROGRESS</label>
                        <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_READY"
                            id="UPDATE_PROGRESS_READY" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-sm-6 mt-4">
                    <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>


    <div id="Edit_PKS_SIGN" class="ilang">

        <div class="border">
            <div class="row mt-2 ml-2 ">
                <div class="col-sm-6">
                    <form action="{{Route('updateIOM')}}" method="post" id="IOM_FULL_SIGNED" name="IOM_FULL_SIGNED"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label>IOM Full Sigend</label> <br>
                            <input type="hidden" id="id_iom_pdf" name="id_iom_pdf">
                            <input type="file" accept=".pdf" name="IOM_FULL_SIGNED" id="IOM_FULL_SIGNED">
                            <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                        </div>
                    </form>
                </div>

                <div class="col-sm-5 ml-1">
                    <form action="{{Route('updateTAC')}}" method="post" name="Term_And_Condition"
                        id="Term_And_Condition" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Term And Condition Full Signed</label> <br>
                            <input type="hidden" id="id_tac_pdf" name="id_tac_pdf">
                            <input type="file" accept=".pdf" name="Term_And_Condition" id="Term_And_Condition">
                            <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form action="{{Route('update.uploadFP3')}}" method="post" name="form_upload_FP3"
                        id="form_upload_FP3" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>FP3</label> <br>
                            <input type="hidden" id="id_upload_FP3" name="id_upload_FP3">
                            <input type="file" accept=".pdf" name="upload_FP3" id="Term_And_Condition">
                            <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form method="POST" action="{{Route('update.SIGNED_PKS')}}" name="Edit_PKS_SIGN" enctype="multipart/form-data"
            id="Edit_PKS_SIGN_FORM">
            <input type="hidden" name="id_PKS_SIGN" id="id_PKS_SIGN" />
            <div class=" row mt-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>PROGRESS STATUS</label>
                        <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS_PKS_SIGN"
                            class="form-control">
                            <option value="DESK SURVEY">DESK SURVEY</option>
                            <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                            <option value="NEGOTIATION 1 - BUSINESS SCHEME">NEGOTIATION 1 -
                                BUSINESS SCHEME
                            </option>
                            <option value="SITE SURVEY">SITE SURVEY</option>
                            <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY
                                REPORT, DESIGN
                            </option>
                            <option value="PnL PROGRESS">PnL PROGRESS</option>
                            <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
                            </option>
                            <option value="SIGNED PKS" selected>SIGNED PKS</option>
                            <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                            <option value="READY TO SELL">READY TO SELL</option>
                            <option value="REJECT">REJECT</option>
                        </select>
                    </div>
                </div>



                <div class="col-sm-6">
                    <div class="form-group">
                        <label>PKS Date</label> <br>
                        <input type="text" data-toggle="datepicker" class="form-control" name="PKS_DATE" id="PKS_DATE">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Deal Year</label> <br>
                        <input type="number" class="form-control" name="Deal_Year" id="Deal_Year">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No PKS</label> <br>
                        <input type="text" class="form-control" name="No_PKS" id="No_PKS">
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="form-group">
                        <label>UPDATE PROGRESS</label>
                        <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_PKS_SIGN"
                            id="UPDATE_PROGRESS_PKS_SIGN" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>


                <div class="col-sm-6 mt-4">
                    <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>

</div>
</div>
</div>
@endsection
@section('script')
@include('admin.javascript')
{{-- @include('staff.javascript') --}}
@endsection