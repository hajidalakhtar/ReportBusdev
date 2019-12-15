<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">MY PROGRESS <button type="button" class="btn btn-primary float-right"
                data-toggle="modal" data-target="#new">
                Tambah Report
            </button></div>

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
                            <th>COLOR&nbspMAP&nbspONLINE</th>
                            <th>
                                Report&nbspDate&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            </th>
                            <th>VIEW</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->BUILDING_NAME}}</td>
                            <td>{{$data->PROGRESS_STATUS}}</td>
                            <td>{{$data->COLOR_MAP_ONLINE}}</td>
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
                                <a class="btn btn-primary" target="_blank"
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
<!--
|--------------------------------------------------------------------------|
| ADD NEW                                                     |
|--------------------------------------------------------------------------|
 -->
<div class="modal hide fade" id="new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new">DESK SURVEY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" name="new" action="{{Route('new')}}">
                    @csrf
                    <div>
                        <label>PIC MNC</label>
                        <h4 class="mb-4">{{Auth::user()->name}}</h4>
                    </div>
                    <div class="row">
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
                                    <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                        DESIGN
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
                                <input type="text" name="ADDRESS" class="form-control" placeholder="Masukan ADDRESS" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>PROVINCE </label>
                                <select name="PROVINCE_1" id="PROVINCE_1" class="form-control required">
                                    <option>Pilih Provinsi</option>
                                    @foreach ($provinsi as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CITY</label>
                                <select name="CITY" id="CITY_1" class="form-control">
                                    <option>Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>SUBDISTRICT</label>
                                <select name="SUBDISTRICT" id="SUBDISTRICT_1" class="form-control">
                                    <option>Pilih Wilayah</option>
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
                                <label>PROPERTY TYPE</label>

                                <select name="PROPERTY_TYPE" class="form-control">
                                    <option value="Office Building">Office Building</option>
                                    <option value="Apartemen">Apartemen</option>
                                    <option value="Ruko/Rukan">Ruko/Rukan</option>
                                    <option value="Landed House">Landed House</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-4">
                            <button type="submit " class="btn btn-primary" style="width:100px;">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                <a href="" class="btn btn-primary btn-sm" id="FA_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> SITE SURVEY</p>
                                <a href="" class="btn btn-primary btn-sm" id="SITE_SURVEY_DETAILS"
                                    target="_blank">Download PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> BOQ</p>
                                <a href="" class="btn btn-primary btn-sm" id="BOQ_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> PLN</p>
                                <a href="" class="btn btn-primary btn-sm" id="PNL_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> IOM FULL SIGNED</p>
                                <a href="" class="btn btn-primary btn-sm" id="IOM_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> WO</p>
                                <a href="" class="btn btn-primary btn-sm" id="WO_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> TERM AND CONDITION</p>
                                <a href="" class="btn btn-primary btn-sm" id="TERM_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <p style="margin-bottom:1px;"> PKS</p>
                                <a href="" class="btn btn-primary btn-sm" id="PKS_DETAILS" target="_blank">Download
                                    PDF</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <p style="margin-bottom:0px">UPDATE PROGRESS</p>
                        <textarea name="text_UPDATE_PROGRESS" cols="30" rows="10" class="form-control"
                            id="text_UPDATE_PROGRESS" disabled></textarea>
                        {{-- <h4 id="text_PKS_END" style="margin-top:0px"></h4> --}}
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="" id="download_pdf" class="btn btn-primary">Download</a>
            </div>
        </div>
    </div>
</div>

<!--
|--------------------------------------------------------------------------|
| EDIT                                                            |
|--------------------------------------------------------------------------|
 -->
<div class="modal hide fade" id="DESKSURVEY" tabindex="-1" role="dialog" aria-labelledby="DESKSURVEY"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DESKSURVEY_TITLE">DESK SURVEY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label>PIC MNC</label>
                        <h4 id="PIC_MNC" class="mb-4">{{Auth::user()->name}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <label>BUILDING NAME</label>
                        <h4 id="BUILDING_NAME" class="mb-4"></h4>
                        <input type="hidden" id="BUILDING_NAME1" name="BUILDING_NAME" class="mb-4" />
                    </div>
                </div>


                <div id="Edit_REPORT_DESK_SURVEY">
                    <form method="POST" action="/update/report" name="Edit_REPORT_DESK_SURVEY">
                        <input type="hidden" name="id_DESK" id="id_DESK" />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" selected>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME</option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                            DESIG
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS" disabled>SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL" disabled>READY TO SELL</option>
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
                                    <select name="PROPERTY_TYPE" id="PROPERTY_TYPE" class="form-control">
                                        <option value="Office Building">Office Building</option>
                                        <option value="Apartemen">Apartemen</option>
                                        <option value="Ruko/Rukan">Ruko/Rukan</option>
                                        <option value="Landed House">Landed House</option>
                                    </select>
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
                <div id="Edit_REPORT_SUBMIT_PROPOSAL" class="ilang">
                    <div class="row">
                        <div class="col-sm-3 mb-3">
                            <div class="form-group">
                                <label>UPLOAD FA (PDF)</label>
                                <form action="{{Route('update.uploadFA')}}" name="uploadFA" id="uploadFA" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group clearfix">
                                        <input type="hidden" name="id_proposal_pdf" id="id_proposal_pdf" />
                                        <input type="file" accept=".pdf" name="form_fa" />
                                        <input type="submit" value="UPLOAD" class="btn btn-primary btn-sm mt-3 w-50">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{Route('update.proposal')}}" name="Edit_REPORT_SUBMIT_PROPOSAL"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_proposal" id="id_proposal" />
                        <div class=" row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_SUBMIT_PROPOSAL" class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" selected>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME"><a href="submit">NEGOTIATION 1 -
                                                BUSINESS SCHEME</a>
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                            DESIG
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
                                    <label>DEVELOPER/COMPANY NAME</label>
                                    <input type="text" name="DEVELOPERORCOMPANY_NAME" id="DEVELOPERORCOMPANY_NAME"
                                        class="form-control" placeholder="Masukan Developer Name" />
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
                                    <label>ISP EXISTING</label>

                                    <textarea class="form-control" name="ISP_EXISTING" id="ISP_EXISTING" cols="30"
                                        rows="1" placeholder="Masukan ISP EXISTING"></textarea>
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
                                        placeholder="Masukan No HP (optional)" />

                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>TOTAL TOWER</label>
                                    <input type="number" name="TOTAL_TOWER" id="TOTAL_TOWER" class="form-control"
                                        placeholder="Masukan TOTAL TOWER" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label> FLOOR/TOWER</label>
                                    <input type="number" name="TOTAL_FLOORORTOWER" id="TOTAL_FLOORORTOWER"
                                        class="form-control" placeholder="Masukan TOTAL FLOOR/TOWER" />
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>TOTAL UNIT</label>
                                    <input type="number" name="TOTAL_UNIT" id="TOTAL_UNIT" class="form-control"
                                        placeholder="Masukan TOTAL UNIT" />
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label> OCCUPANCY</label>
                                    <input type="number" name="TOTAL_OCCUPANCY" id="TOTAL_OCCUPANCY"
                                        class="form-control" placeholder="Masukan TOTAL OCCUPANCY" />
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>EXCLUSIVE</label>
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="exclusive_1" value="YES" name="exclusive" checked />
                                            <label for="exclusive_1">YES</label>
                                        </div>
                                        <div class="icheck-primary d-inline ml-3">
                                            <input type="radio" id="exclusive_2" value="NO" name="exclusive" />
                                            <label for="exclusive_2">NO</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>DATE BUSDEV SIGNED</label>
                                    <div class="form-group clearfix">
                                        <input type="text" data-toggle="datepicker" class="form-control"
                                            name="BUSDEV_SIGNED" id="BUSDEV_SIGNED" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>SUBMIT PROPOSAL DATE</label>
                                    <div class="form-group clearfix">
                                        <input type="text" data-toggle="datepicker" name="SUBMIT_PROPOSAL_DATE"
                                            id="SUBMIT_PROPOSAL_DATE" class="form-control" name="busdev_ date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>DATE BM SIGNED</label>
                                    <div class="form-group clearfix">
                                        <input type="text" data-toggle="datepicker" class="form-control"
                                            name="BM_SIGNED" id="BM_SIGNED" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="h5">Layanan</label>
                                    <div class="row">
                                        <div class="col-sm-3" style="margin-left:0px;">
                                            <div class="form-group">
                                                <div class="icheck-primary d-inline ml-3">
                                                    <input type="checkbox" id="SOHO" value="V" name="SOHO" />
                                                    <label for="SOHO">SOHO</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="icheck-primary d-inline ml-3">
                                                    <input type="checkbox" id="DEDICATED_INTERNET" value="V"
                                                        name="DEDICATED_INTERNET" />
                                                    <label for="DEDICATED_INTERNET">DEDICATED INTERNET</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="icheck-primary d-inline ml-3">
                                                    <input type="checkbox" id="DATA_COMMUNICATI  ON" value="V"
                                                        name="DATA_COMMUNICATION" />
                                                    <label for="DATA_COMMUNICATION">DATA COMMUNICATION</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="icheck-primary d-inline ml-3">
                                                    <input type="checkbox" id="RESIDENTIAL" name="RESIDENTIAL"
                                                        value="V" />
                                                    <label for="RESIDENTIAL">RESIDENTIAL</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">

                                    <label class="h5">Marketing</label>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">Aktifitas Sales Probing <span class="badge">(Penyebaran
                                                    Marketing
                                                    Tools)</span>
                                            </h5>
                                            <div class="row mt-3">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_lobby"
                                                                value="aktifitas_lobby" name="aktifitas[lobby]" />
                                                            <label for="aktifitas_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="icheck-primary d-inline  " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_basemant"
                                                                value="aktifitas_basemant" name="aktifitas[basemant]" />
                                                            <label for="aktifitas_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_pintu_parkir"
                                                                value="aktifitas_pintu_parkir"
                                                                name="aktifitas[pintu_parkir]" />
                                                            <label for="aktifitas_pintu_parkir">Pintu Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_lift"
                                                                value="aktifitas_lift" name="aktifitas[lift]" />
                                                            <label for="aktifitas_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_swmg_pool"
                                                                value="aktifitas_swmg_pool"
                                                                name="aktifitas[swmg_pool]" />
                                                            <label for="aktifitas_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_fitness"
                                                                name="aktifitas[fitness]" value="aktifitas_fitness" />
                                                            <label for="aktifitas_fitness">Fitness Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_mgmt_office"
                                                                value="aktifitas_mgmt_office"
                                                                name="aktifitas[mgmt_office]" />
                                                            <label for="aktifitas_mgmt_office">Mgmt. Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_receptionist"
                                                                value="aktifitas_receptionist"
                                                                name="aktifitas[receptionist]"
                                                                value="aktifitas_receptionist" />
                                                            <label for="aktifitas_receptionist">Receptionist</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">POP UP TABLE <span class="badge">(terlampir)</span></h5>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_lobby"
                                                                value="POP_UP_TABLE_lobby" name="POP_UP[0]" />
                                                            <label for="POP_UP_TABLE_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_basemant"
                                                                value="POP_UP_TABLE_basemant" name="POP_UP[1]" />
                                                            <label for="POP_UP_TABLE_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_pintu_parkir"
                                                                value="POP_UP_TABLE_pintu_parkir" name="POP_UP[2]" />
                                                            <label for="POP_UP_TABLE_pintu_parkir">Pintu Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_lift"
                                                                value="POP_UP_TABLE_lift" name="POP_UP[3]" />
                                                            <label for="POP_UP_TABLE_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_swmg_pool"
                                                                value="POP_UP_TABLE_swmg_pool" name="POP_UP[4]" />
                                                            <label for="POP_UP_TABLE_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_fitness"
                                                                name="POP_UP[5]" value="POP_UP_TABLE_fitness" />
                                                            <label for="POP_UP_TABLE_fitness">Fitness Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_mgmt_office"
                                                                value="POP_UP_TABLE_mgmt_office" name="POP_UP[6]" />
                                                            <label for="POP_UP_TABLE_mgmt_office">Mgmt. Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_receptionist"
                                                                name="POP_UP[7]" value="POP_UP_TABLE_receptionist" />
                                                            <label for="POP_UP_TABLE_receptionist">Receptionist</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">Penempatan Spanduk <span class="badge">(terlampir)</span>
                                            </h5>
                                            <div class="row mt-3">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="penempatan_standuk_lobby"
                                                                value="penempatan_standuk_lobby" name="spanduk[0]" />
                                                            <label for="penempatan_standuk_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="icheck-primary d-inline  " style="padding:0px;">
                                                            <input type="checkbox" id="penempatan_standuk_basemant"
                                                                value="penempatan_standuk_basemant" name="spanduk[1]" />
                                                            <label for="penempatan_standuk_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="penempatan_standuk_pintu_parkir"
                                                                value="penempatan_standuk_pintu_parkir"
                                                                name="spanduk[2]" />
                                                            <label for="penempatan_standuk_pintu_parkir">Pintu
                                                                Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="penempatan_standuk_lift"
                                                                value="penempatan_standuk_lift" name="spanduk[3]" />
                                                            <label for="penempatan_standuk_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="penempatan_standuk_swmg_pool"
                                                                value="penempatan_standuk_swmg_pool"
                                                                name="spanduk[4]" />
                                                            <label for="penempatan_standuk_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="penempatan_standuk_fitness"
                                                                name="spanduk[5]" value="penempatan_standuk_fitness" />
                                                            <label for="penempatan_standuk_fitness">Fitness
                                                                Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="penempatan_standuk_mgmt_office"
                                                                value="penempatan_standuk_mgmt_office"
                                                                name="spanduk[6]" />
                                                            <label for="penempatan_standuk_mgmt_office">Mgmt.
                                                                Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="penempatan_standuk_receptionist"
                                                                name="spanduk[7]"
                                                                value="penempatan_standuk_receptionist" />
                                                            <label
                                                                for="penempatan_standuk_receptionist">Receptionist</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">Penempatan Poster <span class="badge">(terlampir)</span>
                                            </h5>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Poster_lobby"
                                                                value="Penempatan_Poster_lobby" name="poster[0]" />
                                                            <label for="Penempatan_Poster_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Poster_basemant"
                                                                value="Penempatan_Poster_basemant" name="poster[1]" />
                                                            <label for="Penempatan_Poster_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Poster_pintu_parkir"
                                                                value="Penempatan_Poster_pintu_parkir"
                                                                name="poster[2]" />
                                                            <label for="Penempatan_Poster_pintu_parkir">Pintu
                                                                Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Poster_lift"
                                                                value="Penempatan_Poster_lift" name="poster[3]" />
                                                            <label for="Penempatan_Poster_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Poster_swmg_pool"
                                                                value="Penempatan_Poster_swmg_pool" name="poster[4]" />
                                                            <label for="Penempatan_Poster_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Poster_fitness"
                                                                name="poster[5]" value="Penempatan_Poster_fitness" />
                                                            <label for="Penempatan_Poster_fitness">Fitness
                                                                Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Poster_mgmt_office"
                                                                value="Penempatan_Poster_mgmt_office"
                                                                name="poster[6]" />
                                                            <label for="Penempatan_Poster_mgmt_office">Mgmt.
                                                                Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Poster_receptionist"
                                                                name="poster[7]"
                                                                value="Penempatan_Poster_receptionist" />
                                                            <label
                                                                for="Penempatan_Poster_receptionist">Receptionist</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">Sticker Pintu Lift <span class="badge">(terlampir)</span>
                                            </h5>
                                            <div class="row mt-3">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="sticker_lobby"
                                                                value="sticker_lobby" name="sticker[0]" />
                                                            <label for="sticker_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="icheck-primary d-inline  " style="padding:0px;">
                                                            <input type="checkbox" id="sticker_basemant"
                                                                value="sticker_basemant" name="sticker[1]" />
                                                            <label for="sticker_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="sticker_pintu_parkir"
                                                                value="sticker_pintu_parkir" name="sticker[2]" />
                                                            <label for="sticker_pintu_parkir">Pintu Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="sticker_lift"
                                                                value="sticker_lift" name="sticker[3]" />
                                                            <label for="sticker_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="sticker_swmg_pool"
                                                                value="sticker_swmg_pool" name="sticker[4]" />
                                                            <label for="sticker_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="sticker_fitness"
                                                                name="sticker[5]" value="sticker_fitness" />
                                                            <label for="sticker_fitness">Fitness Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="sticker_mgmt_office"
                                                                value="sticker_mgmt_office" name="sticker[6]" />
                                                            <label for="sticker_mgmt_office">Mgmt. Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="sticker_receptionist"
                                                                name="sticker[7]" value="sticker_receptionist" />
                                                            <label for="sticker_receptionist">Receptionist</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">X/Roll Up Banner <span class="badge">(terlampir)</span>
                                            </h5>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="roll_up_lobby"
                                                                value="roll_up_lobby" name="roll[]" />
                                                            <label for="roll_up_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="roll_up_basemant"
                                                                value="roll_up_basemant" name="roll[1]" />
                                                            <label for="roll_up_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="roll_up_pintu_parkir"
                                                                value="roll_up_pintu_parkir" name="roll[2]" />
                                                            <label for="roll_up_pintu_parkir">Pintu Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="roll_up_lift"
                                                                value="roll_up_lift" name="roll[3]" />
                                                            <label for="roll_up_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="roll_up_swmg_pool"
                                                                value="roll_up_swmg_pool" name="roll[4]" />
                                                            <label for="roll_up_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="roll_up_fitness" name="roll[5]"
                                                                value="roll_up_fitness" />
                                                            <label for="roll_up_fitness">Fitness Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="roll_up_mgmt_office"
                                                                value="roll_up_mgmt_office" name="roll[6]" />
                                                            <label for="roll_up_mgmt_office">Mgmt. Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="roll_up_receptionist"
                                                                name="roll[7]" value="roll_up_receptionist" />
                                                            <label for="roll_up_receptionist">Receptionist</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">Acrilic Box/Brosur<span class="badge">(terlampir)</span>
                                            </h5>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="acrilic_lobby"
                                                                value="acrilic_lobby" name="acrilic[0]" />
                                                            <label for="acrilic_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="acrilic_basemant"
                                                                value="acrilic_basemant" name="acrilic[1]" />
                                                            <label for="acrilic_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="acrilic_pintu_parkir"
                                                                value="acrilic_pintu_parkir" name="acrilic[2]" />
                                                            <label for="acrilic_pintu_parkir">Pintu Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="acrilic_lift"
                                                                value="acrilic_lift" name="acrilic[3]" />
                                                            <label for="acrilic_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="acrilic_swmg_pool"
                                                                value="acrilic_swmg_pool" name="acrilic[4]" />
                                                            <label for="acrilic_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="acrilic_fitness"
                                                                name="acrilic[5]" value="acrilic_fitness" />
                                                            <label for="acrilic_fitness">Fitness Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="acrilic_mgmt_office"
                                                                value="acrilic_mgmt_office" name="acrilic[6]" />
                                                            <label for="acrilic_mgmt_office">Mgmt. Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="acrilic_receptionist"
                                                                name="acrilic[7]" value="acrilic_receptionist" />
                                                            <label for="acrilic_receptionist">Receptionist</label>
                                                        </div>
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
                <div id="Edit_NEGOTIATION_1" class="ilang">
                    <form method="POST" action="{{Route('update.negotiation')}}" name="Edit_NEGOTIATION_1">
                        <input type="hidden" name="id_NEGOTIATION" id="id_NEGOTIATION" />
                        <div class=" row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_NEGOTIATION_1" class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" selected>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY">SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                            DESIG
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
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label>RENTAL BASE</label>
                                    <input type="text" name="RENTAL_BASE" id="RENTAL_BASE" class="form-control"
                                        placeholder="Masukan RENTAL BASE" />
                                </div>
                            </div>
                            <div class="col-sm-9">
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>FREE SERVICES</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input type="text" class="form-control" style="width:50px;"
                                            name="FREE_SERVICE_1" id="FREE_SERVICE_1">
                                        <label class="form-check-label" for="inlineCheckbox1"> &nbsp&nbspLayanan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <select id="#FREE_SERVICE_2" class="form-control" name="FREE_SERVICE_2"
                                            id="FREE_SERVICE_2">
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="50">50</option>
                                            <option value="70">70</option>
                                        </select>
                                        {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> --}}
                                        <label class="form-check-label" for="inlineCheckbox2"> &nbsp&nbspMbps</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <select name="FREE_SERVICE_3" id="iptv" id="FREE_SERVICE_3"
                                            class="form-control">
                                            <option value="Family Pack">Family Pack</option>
                                        </select>
                                        {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled> --}}
                                        <label class="form-check-label" for="inlineCheckbox3"> &nbsp&nbspIPTV</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <select name="FREE_SERVICE_4" id="FREE_SERVICE_4" class="form-control">
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
                                        <label class="form-check-label" for="inlineCheckbox3"> &nbsp&nbspALaCarte
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>FREE SERVICES</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input type="text" class="form-control" style="width:50px;"
                                            name="FREE_SERVICE_5" id="FREE_SERVICE_5">
                                        <label class="form-check-label" for="inlineCheckbox1"> &nbsp&nbspLayanan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <select id="#FREE_SERVICE_6" class="form-control" name="FREE_SERVICE_6"
                                            id="FREE_SERVICE_6">
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="50">50</option>
                                            <option value="70">70</option>
                                        </select>
                                        {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> --}}
                                        <label class="form-check-label" for="inlineCheckbox2"> &nbsp&nbspMbps</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <select name="FREE_SERVICE_7" id="iptv" id="FREE_SERVICE_7"
                                            class="form-control">
                                            <option value="Family Pack">Family Pack</option>
                                        </select>
                                        {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled> --}}
                                        <label class="form-check-label" for="inlineCheckbox3"> &nbsp&nbspIPTV</label>
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
                                        <label class="form-check-label" for="inlineCheckbox3"> &nbsp&nbspALaCarte
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_NEGOTION_1"
                                        id="UPDATE_PROGRESS_NEGOTION_1" cols="30" rows="10"
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

                <div id="Edit_SITE_SURVEY" class="ilang">
                    <div class="row">
                        <div class="col-sm-3 mb-5">
                            <div class="form-group">
                                <label>UPLOAD FA FULL (PDF)</label>
                                <div class="form-group clearfix">
                                    <form action="{{Route('update.uploadFAFULL')}}" name="UPLOAD_FA_FULL"
                                        id="UPLOAD_FA_FULL" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="id_SITE_SURVEY_PDF" name="id_SITE_SURVEY_PDF">
                                        <input type="file" accept=".pdf" name="UPLOAD_FA_FULL" id="UPLOAD_FA_FULL" />
                                        <input type="submit" value="UPLOAD" class="btn btn-primary btn-sm mt-3 w-50">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{Route('update.site_survey')}}" name="Edit_SITE_SURVEY"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" id="id_SITE_SURVEY" name="id_SITE_SURVEY">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" selected>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG">BOQ, SITE SURVEY REPORT, DESIG
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
                                    <label>DATE SELES SIGNED</label>
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
                                    <label>GM SELES SIGNED</label>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{Route('uploadBOQ_SITE_SURVEY')}}" id="site_survey_pdf"
                                name="site_survey_pdf" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="id_BOQ_PDF_SITE_SURVEY" name="id_BOQ_PDF_SITE_SURVEY">
                                <div class="form-group">
                                    <label>UPLOAD SITE SURVEY</label>
                                    <input type="file" accept=".pdf" name="site_survey_pdf" id="">
                                    <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                                </div>
                            </form>

                        </div>

                        <div class="col-sm-6">
                            <form action="{{Route('uploadBOQ')}}" id="upload_boq_pdf" name="upload_boq_pdf"
                                method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>UPLOAD BOQ, APD FULL SIGEND</label>
                                    <input type="hidden" id="id_BOQ_UPLOAD" name="id_BOQ_UPLOAD">
                                    <input type="file" accept=".pdf" name="upload_boq_pdf" id="upload_boq_pdf">
                                    <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                                </div>
                        </div>
                        </form>
                    </div>
                    <form method="POST" action="{{Route('update.boq')}}" name="Edit_BOQ" enctype="multipart/form-data">
                        <div class=" row">
                            <input type="hidden" id="id_BOQ" name="id_BOQ">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" selected>BOQ, SITE SURVEY REPORT,
                                            DESIG
                                        </option>
                                        <option value="PnL PROGRESS">PnL PROGRESS</option>
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
                                    <label>BOQ DATE</label>
                                    <input type="text" name="BOQ_DATE" data-toggle="datepicker" id="BOQ_DATE"
                                        class="form-control">
                                </div>
                            </div>

                            {{--  --}}

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
                    <div class="row">
                        <div class="col-sm-3 mb-5">
                            <div class="form-group">
                                <label>UPLOAD PNL FULL APPROVE</label>
                                <div class="form-group clearfix">
                                    <form action="{{Route('UploadPNL')}}" name="upload_pnl_pdf" id="upload_pnl_pdf"
                                        method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="id_PNL_PDF" name="id_PNL_PDF">
                                        <input type="file" accept=".pdf" name="upload_pnl_pdf" id="">
                                        <input type="submit" class="btn btn-primary btn-sm mt-3 w-50">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{Route('update.pnl')}}" name="Edit_PNL" enctype="multipart/form-data">
                        <input type="hidden" name="id_PNL" id="id_PNL" />
                        <div class=" row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                            DESIG
                                        </option>
                                        <option value="PnL PROGRESS" selected>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW</option>
                                        <option value="SIGNED PKS">SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL" disabled>READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PNL DATE</label>
                                    <input type="text" data-toggle="datepicker" name="PNL_DATE" id="PNL_DATE"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                            DESIG
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" selected>NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS">SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL" disabled>READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>PKS REVIEW DATE</label> <br>
                                    <input type="text" data-toggle="datepicker" class="form-control"
                                        name="pks_review_date" id="pks_review_date">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" name="UPDATE_PROGRESS_PKS_REVIEW"
                                        id="UPDATE_PROGRESS_PKS_REVIEW" cols="30" rows="10"
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

                <div id="Edit_ROLL" class="ilang">
                    <div class="row">
                        <div class="col-sm-3 mb-5">
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
                    </div>
                    <form method="POST" name="Edit_ROLL" action="{{Route('update.ROLL_OUT')}}"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_ROLL" id="id_ROLL" />
                        <div class=" row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                            DESIG
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS" disabled>SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" selected>ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL">READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>WO DATE</label> <br>
                                    <input type="text" data-toggle="datepicker" class="form-control" name="wo_date"
                                        id="wo_date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label></label> <br>
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
                    <div class="row">
                        <div class="col-sm-3 mb-3">
                            <div class="form-group">
                                <label>UPLOAD FA (PDF)</label>
                                <form action="{{Route('update.uploadFAFULLREJECT')}}" name="uploadFAREJECT"
                                    id="uploadFAREJECT" method="post" enctype="multipart/form-data">
                                    <div class="form-group clearfix">
                                        <input type="hidden" name="id_proposal_pdf_reject"
                                            id="id_proposal_pdf_reject" />
                                        <input type="file" accept=".pdf" name="form_fa" />
                                        <input type="submit" value="UPLOAD" class="btn btn-primary btn-sm mt-3 w-50">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{Route('update.reject')}}">
                        <input type="hidden" name="id_REJECT" id="id_REJECT" />
                        <div class=" row">
                            <div class="col-sm-12">
                                <div class="form-group">

                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                            DESIG
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS" disabled>SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL">READY TO SELL</option>
                                        <option value="REJECT" selected>REJECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Reject Date</label> <br>
                                    <input type="text" data-toggle="datepicker" class="form-control" name="reject_date"
                                        id="reject_date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Reject Code</label> <br>
                                    <select name="Reject_Code" id="Reject_Code" class="form-control">
                                        <option value="Exclusive">Exclusive</option>
                                        <option value="Limited ISP Provider">Limited ISP Provider</option>
                                        <option value="Sales isn t recommend">Sales isn't recommend</option>
                                        <option value="IKR/OSP isn t recommend">IKR/OSP isn't recommend</option>
                                        <option value="PnL calculation is not meet minimum margin profit">PnL
                                            calculation is not meet
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
                    <div class="row">
                        <div class="col-sm-3 mb-5">
                            <div class="form-group">
                                <label>UPLOAD PKS (PDF)</label>
                                <div class="form-group clearfix">
                                    <form action="{{Route('PKS_PDF')}}" id="PKS_PDF" name="PKS_PDF" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="id_PKS_PDF" id="id_PKS_PDF" />
                                        <input type="file" accept=".pdf" name="PKS_PDF" id="PKS_PDF" />
                                        <input type="submit" value="UPLOAD" class="btn btn-primary btn-sm mt-3 w-50">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" name="Edit_READY" action="{{Route('update.ready')}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_READY" id="id_READY" />
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                            DESIG
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS REVIEW
                                        </option>
                                        <option value="SIGNED PKS" disabled>SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL" selected>READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PKS Date (Baso)</label> <br>
                                    <input type="text" data-toggle="datepicker" class="form-control" name="baso_date"
                                        id="baso_date">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PKS End </label> <br>
                                    <input type="text" maxlength="10" data-toggle="datepicker" readonly="readonly"
                                        class="form-control" name="pks_end" id="pks_end">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>HP (Port)</label> <br>
                                    <input type="number" class="form-control" name="hp_port" id="hp_port">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Agreement Duration (years)</label> <br>
                                    <input type="text" class="form-control" name="duration" id="duration">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>No BASO/BAST</label> <br>
                                    <input type="text" class="form-control" name="BASO" id="BASO">
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
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{Route('updateIOM')}}" method="post" id="IOM_FULL_SIGNED"
                                name="IOM_FULL_SIGNED" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>IOM Full Sigend</label> <br>
                                    <input type="hidden" id="id_iom_pdf" name="id_iom_pdf">
                                    <input type="file" accept=".pdf" name="IOM_FULL_SIGNED" id="IOM_FULL_SIGNED">
                                    <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                                </div>
                            </form>
                        </div>

                        <div class="col-sm-6">
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
                     
                    </div>
                    <form method="POST" action="{{Route('update.SIGNED_PKS')}}" name="Edit_PKS_SIGN"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_PKS_SIGN" id="id_PKS_SIGN" />
                        <div class=" row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SEdit_PKSITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIG" disabled>BOQ, SITE SURVEY REPORT,
                                            DESIG
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS REVIEW
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
                                    <input type="text" data-toggle="datepicker" class="form-control" name="PKS_DATE"
                                        id="PKS_DATE">
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
                                        id="UPDATE_PROGRESS_PKS_SIGN" cols="30" rows="10"
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

            </div>
        </div>
    </div>
</div>

<!--
|--------------------------------------------------------------------------|
| VIEW                                                         |
|--------------------------------------------------------------------------|
 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="w-100 text-center" id="exampleModalLabel" style="margin-bottom:0px;"><b> ALERT </b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mt-5 mb-5">
                    <img src="park.svg" width="300px;" alt="" srcset="">
                    <h4 style="color:#928F8E" class="mt-3"><b> YOU DON'T HAVE ANY WARNING </b></h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>