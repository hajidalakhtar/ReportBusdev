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
                            <th>UPLOAD</th>
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
                            <td class="building_name">{{$data->BUILDING_NAME}}</td>
                            <td>{{$data->PROGRESS_STATUS}}</td>
                            <td>
                                @if ($data->PROGRESS_STATUS == "BOQ, SITE SURVEY REPORT, DESIGN" ||
                                $data->PROGRESS_STATUS == "SITE SURVEY" )
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="">SITE SURVEY</label>
                                        <br>
                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                            <input type="checkbox" disabled="disabled" class="viewcheckbox"
                                                id="roll_up_swmg_pool" value="roll_up_swmg_pool"
                                                {{$data->SITE_SURVEY_PDF ? 'checked' : ''}} />
                                            <label for=""></label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">BOQ</label>
                                        <br>
                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                            <input type="checkbox" disabled="disabled" class="viewcheckbox"
                                                id="roll_up_swmg_pool" value="roll_up_swmg_pool"
                                                {{$data->BOQ_PDF ? 'checked' : ''}} />
                                            <label for=""></label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if ($data->PROGRESS_STATUS == "PnL PROGRESS")
                                <div class="row">
                                    <div class="col-md-1 ">
                                        <label for="">PnL</label>
                                        <br>
                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                            <input type="checkbox" disabled="disabled" class="viewcheckbox"
                                                id="roll_up_swmg_pool" value="roll_up_swmg_pool"
                                                {{$data->PNL_PDF ? 'checked' : ''}} />
                                            <label for=""></label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 offset-1">
                                        <label for="">Draf Pnl</label>
                                        <br>
                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                            <input type="checkbox" disabled="disabled" class="viewcheckbox"
                                                id="roll_up_swmg_pool" value="roll_up_swmg_pool"
                                                {{$data->DraftPnlPdf ? 'checked' : ''}} />
                                            <label for=""></label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if ($data->PROGRESS_STATUS == "SIGNED PKS")
                                <div class="col-md-1">
                                    <label for="">PKS</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" disabled="disabled" class="viewcheckbox"
                                            id="roll_up_swmg_pool" value="roll_up_swmg_pool"
                                            {{$data->PKS_PDF ? 'checked' : ''}} />
                                        <label for=""></label>
                                    </div>
                                </div>
                                @endif
                                @if ($data->PROGRESS_STATUS == "READY TO SELL")
                                <div class="col-md-1">
                                    <label for="">PKS</label>
                                    <br>
                                    <div class="icheck-primary d-inline " style="padding:0px;">
                                        <input type="checkbox" disabled="disabled" class="viewcheckbox"
                                            id="roll_up_swmg_pool" value="roll_up_swmg_pool"
                                            {{$data->PKS_PDF ? 'checked' : ''}} />
                                        <label for=""></label>
                                    </div>
                                </div>
                                @endif

                            </td>
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
                <form method="POST" name="new" action="{{Route('new')}}">
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
                                <select readonly name="PROGRESS_STATUS" class="form-control">
                                    <option value="DESK SURVEY" selected>DESK SURVEY</option>
                                    <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                    <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                        BUSINESS
                                        SCHEME</option>
                                    <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                    <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                        REPORT,
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
                                <select name="PROVINCE_1" id="PROVINCE_1" class="form-control">
                                    <option>Pilih Provinsi</option>
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
                                    <option>Pilih Kota</option>
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
                                    <option>Pilih Wilayah</option>
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
                                                    <input type="checkbox" id="Existing_new" value="Existing"
                                                        name="Existing" />
                                                    <label for="Existing_new">Existing </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="icheck-primary d-inline ml-3">
                                                    <input type="checkbox" id="On_Progres_new" name="On_Progres"
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
| EDIT                                                            |
|--------------------------------------------------------------------------|
 -->
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
                <div class="text-center">
                    <h3 id="BUILDING_NAME"></h3>
                    <h5 id="PIC_MNC" class="mb-4">{{Auth::user()->name}}</h5>
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
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" selected>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL">SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME</option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS
                                            REVIEW
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
                                    class="form-control" id="">
                            </div>
                            <div class="col-sm-12 mt-3" id="status_bagunan">
                                <div class="form-group">
                                    <label class="h5">STATUS BAGUNAN</label>
                                    <div class="border ">
                                        <div class="row  mt-3 mr-2">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="Existing" value="Existing"
                                                            name="Existing" />
                                                        <label for="Existing">Existing / Sdh Terbangun</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline ml-3">
                                                        <input type="checkbox" id="On_Progres" name="On_Progres"
                                                            value="On_Progres" />
                                                        <label for="On_Progres">On Progres / Dalam
                                                            Pembagunan</label>
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
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly name="UPDATE_PROGRESS_DESK"
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
                        <div class=" row mt-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_SUBMIT_PROPOSAL" class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" selected>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME"><a href="submit">NEGOTIATION
                                                1 -
                                                BUSINESS SCHEME</a>
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS
                                            REVIEW
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
                                            id="SUBMIT_PROPOSAL_DATE" class="form-control" name="busdev_ date" />
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
                                                name="jumlah_lantai_total" /></td>


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
                                        <td><input type="text" size="6" name="jumlah_unit_total" /></td>
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
                                        <td><input type="text" size="6" name="jumlah_yang_dihuni_total" /></td>
                                    </tr>
                                    <tr id="jumlah_tingkat_okupansi_tower">
                                        <td class="text-left pl-3">Tingkat Okupansi (diisi MKM)</td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_1" /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_2" /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_3" /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_4" /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_5" /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_6" /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_7" /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_8" /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_9" /></td>
                                        <td><input type="text" size="3" class="tingkat_okupansi"
                                                name="tingkat_okupansi_10" /></td>
                                        <td><input type="text" size="6" name="tingkat_okupansi_total" /></td>
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
                                                id="jumlah_unit_area_kemerial_total" /></td>
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
                                                id="jumlah_area_komersial_dihuni_total" />
                                        </td>
                                    </tr>
                                    <tr id="tingkat_okupansi_2">
                                        <td class="text-left pl-3">Tingkat Okupansi (diisi MKM)</td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_1"
                                                id="jumlah_tingkat_okupansi_area_1" /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_2"
                                                id="jumlah_tingkat_okupansi_area_2" /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_3"
                                                id="jumlah_tingkat_okupansi_area_3" /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_4"
                                                id="jumlah_tingkat_okupansi_area_4" /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_5"
                                                id="jumlah_tingkat_okupansi_area_5" /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_6"
                                                id="jumlah_tingkat_okupansi_area_6" /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_7"
                                                id="jumlah_tingkat_okupansi_area_7" /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_8"
                                                id="jumlah_tingkat_okupansi_area_8" /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_9"
                                                id="jumlah_tingkat_okupansi_area_9" /></td>
                                        <td><input type="text" size="3" class="jumlah_tingkat_okupansi"
                                                name="jumlah_tingkat_okupansi_area_10"
                                                id="jumlah_tingkat_okupansi_area_10" /></td>
                                        <td><input type="text" size="6" name="jumlah_tingkat_okupansi_area_total" />
                                        </td>
                                    </tr>
                                    <tr id="jumlah_kendaraan_terdaftar">
                                        <td class="text-left pl-3">Jumlah Kendaraan Terdaftar</td>
                                        <td><input type="text" size="3" class="jumlah_kendaraan_terdaftar"
                                                name="jumlah_kendaraan_terdaftar_1" /></td>
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
                                        <td><input type="text" size="6" name="jumlah_kendaraan_terdaftar_total" />
                                        </td>
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
                                                <h5 class="mt-3 mr-3" style="margin-bottom:0px">Exclusive
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
                                                <input type="number" class="type_unit" name="type_unit_studio"
                                                    id="type_unit_studio" class="form-control"
                                                    style="width:50px; margin-top:-7px; margin-bottom:10px">
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                1 BR
                                            </div>

                                            <div class="float-right ml-2 mt-3">
                                                <input type="number" class="type_unit" name="type_unit_1br"
                                                    id="type_unit_1br" class="form-control"
                                                    style="width:50px; margin-top:-7px; margin-bottom:10px">
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                2 BR
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                <input type="number" class="type_unit" name="type_unit_2br"
                                                    id="type_unit_2br" class="form-control"
                                                    style="width:50px; margin-top:-7px; margin-bottom:10px">
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                3 BR
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                <input type="number" class="type_unit" name="type_unit_3br"
                                                    id="type_unit_3br" class="form-control"
                                                    style="width:50px; margin-top:-7px; margin-bottom:10px">
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                Penthouse
                                            </div>
                                            <div class="float-right ml-2 mt-3">
                                                <input type="number" class="type_unit" name="type_unit_penthouse"
                                                    id="type_unit_penthouse" class="form-control"
                                                    style="width:50px; margin-top:-7px; margin-bottom:10px">
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
                                                <h5 class="">Terendah</h5>
                                            </div>
                                            <div class="col-md-3 mt-3" style="margin-top:-7px; margin-bottom:9px">
                                                <input type="text" name="terendah" id="terendah" style="width:160px"
                                                    class="form-control">
                                            </div>
                                            <div class="float-right mt-4 mr-2">
                                                <h5 class="">Tertinggi</h5>
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
                                                            name="Infrastruktur[0]" />
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
                                                            name="Infrastruktur[1]" />
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
                                                            name="Infrastruktur[2]" />
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
                                                        <input type="checkbox" id="UTP_building" name="Infrastruktur[3]"
                                                            value="UTP" />
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
                                            <div class="col-md-3" style="border-right:1px solid #DEE2E6;">
                                                <h5 class="ml-2 mt-3">Metode Pembangunan Infrastruktur</h5>
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
                                                        <label for="UG">UG – Under Ground (Bawah Tanah/Suwer –
                                                            Saluran
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
                                            <div class="col-md-4">
                                                <h5>
                                                    Pembangunan Infrastruktur s/d.
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
                                            <div class="col-md-2">
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
                                                        class="fas fa-exclamation-triangle ml-1"></i></b></span>
                                        </h5>
                                        <div class="row  mt-3">
                                            <div class="col-md-1 ml-1 mt-2">
                                                <b>Indonesia </b>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3" style="width: 105px;">
                                                    <input type="number" name="indonesia" id="indonesia"
                                                        class="form-control" placeholder="Masukan indonesia" max="100"
                                                        required="true" message="you can give score -10 to +10 only" />
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
                                    <label class="h5">Mayoritas Jenis Usaha (pilih dan isi dengan angka sesuai
                                        kondisi
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
                                        <td><input type="text" size="3" name="Sewa_Lahan_1" /></td>
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
                                        <td><input type="text" size="3" name="Sewa_Lahan_2" /></td>
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
                                        <td><input type="text" size="3" name="Sewa_Lahan_3" /></td>
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
                                        <td><input type="text" size="3" name="Sewa_Lahan_4" /></td>
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
                                        <td><input type="text" size="3" name="Sewa_Lahan_5" /></td>
                                    </tr>
                                </table>
                            </div>
                            {{-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="h5">Layanan</label>
                                    <div class="border ">

                                        <div class="row  mt-3">
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
                                                        <input type="checkbox" id="DATA_COMMUNICATION" value="V"
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
                            </div> --}}


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
                                                id="POP_UP_TABLE_pintu_parkir" name="POP_UP_TABLE_pintu_parkir">
                                        </td>
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
                                                id="POP_UP_TABLE_receptionist" name="POP_UP_TABLE_receptionist">
                                        </td>
                                        <td><input type="text" name="POP_UP_TABLE_harga" id="POP_UP_TABLE_harga">
                                        </td>
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
                                                id="penempatan_standuk_fitness" name="penempatan_standuk_fitness">
                                        </td>
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
                                                id="Penempatan_Poster_basemant" name="Penempatan_Poster_basemant">
                                        </td>
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
                                                id="Penempatan_Poster_fitness" name="Penempatan_Poster_fitness">
                                        </td>
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
                                        <td class="text-left" style="padding: 10px;width: 220px;">Acrilic Box
                                            /Brosur
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

                            {{-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="h5">Marketing Activity</label>

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
                                                                value="aktifitas_lobby" name="aktifitas[0]" />
                                                            <label for="aktifitas_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="icheck-primary d-inline  " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_basemant"
                                                                value="aktifitas_basemant" name="aktifitas[1]" />
                                                            <label for="aktifitas_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_pintu_parkir"
                                                                value="aktifitas_pintu_parkir" name="aktifitas[2]" />
                                                            <label for="aktifitas_pintu_parkir">Pintu Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_lift"
                                                                value="aktifitas_lift" name="aktifitas[3]" />
                                                            <label for="aktifitas_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_swmg_pool"
                                                                value="aktifitas_swmg_pool" name="aktifitas[4]" />
                                                            <label for="aktifitas_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_fitness"
                                                                name="aktifitas[5]" value="aktifitas_fitness" />
                                                            <label for="aktifitas_fitness">Fitness Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_mgmt_office"
                                                                value="aktifitas_mgmt_office" name="aktifitas[6]" />
                                                            <label for="aktifitas_mgmt_office">Mgmt. Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="aktifitas_receptionist"
                                                                value="aktifitas_receptionist" name="aktifitas[7]"
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
                                            <h5 class="mt-2">POP UP TABLE </h5>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_TABLE_lobby"
                                                                value="POP_UP_TABLE_TABLE_lobby" name="POP_UP[0]" />
                                                            <label for="POP_UP_TABLE_TABLE_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_TABLE_basemant"
                                                                value="POP_UP_TABLE_TABLE_basemant" name="POP_UP[1]" />
                                                            <label for="POP_UP_TABLE_TABLE_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_TABLE_pintu_parkir"
                                                                value="POP_UP_TABLE_TABLE_pintu_parkir" name="POP_UP[2]" />
                                                            <label for="POP_UP_TABLE_TABLE_pintu_parkir">Pintu Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_TABLE_lift"
                                                                value="POP_UP_TABLE_TABLE_lift" name="POP_UP[3]" />
                                                            <label for="POP_UP_TABLE_TABLE_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_TABLE_swmg_pool"
                                                                value="POP_UP_TABLE_TABLE_swmg_pool" name="POP_UP[4]" />
                                                            <label for="POP_UP_TABLE_TABLE_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_TABLE_fitness"
                                                                name="POP_UP[5]" value="POP_UP_TABLE_TABLE_fitness" />
                                                            <label for="POP_UP_TABLE_TABLE_fitness">Fitness Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_TABLE_mgmt_office"
                                                                value="POP_UP_TABLE_TABLE_mgmt_office" name="POP_UP[6]" />
                                                            <label for="POP_UP_TABLE_TABLE_mgmt_office">Mgmt. Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="POP_UP_TABLE_TABLE_receptionist"
                                                                name="POP_UP[7]" value="POP_UP_TABLE_TABLE_receptionist" />
                                                            <label for="POP_UP_TABLE_TABLE_receptionist">Receptionist</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">Penempatan Spanduk </h5>
                                            <div class="row mt-3">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id=""penempatan_standuk_lobby"
                                                                value=""penempatan_standuk_lobby" name="spanduk[0]" />
                                                            <label for=""penempatan_standuk_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="icheck-primary d-inline  " style="padding:0px;">
                                                            <input type="checkbox" id=""penempatan_standuk_basemant"
                                                                value=""penempatan_standuk_basemant" name="spanduk[1]" />
                                                            <label for=""penempatan_standuk_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id=""penempatan_standuk_pintu_parkir"
                                                                value=""penempatan_standuk_pintu_parkir"
                                                                name="spanduk[2]" />
                                                            <label for=""penempatan_standuk_pintu_parkir">Pintu
                                                                Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id=""penempatan_standuk_lift"
                                                                value=""penempatan_standuk_lift" name="spanduk[3]" />
                                                            <label for=""penempatan_standuk_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id=""penempatan_standuk_swmg_pool"
                                                                value=""penempatan_standuk_swmg_pool"
                                                                name="spanduk[4]" />
                                                            <label for=""penempatan_standuk_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id=""penempatan_standuk_fitness"
                                                                name="spanduk[5]" value=""penempatan_standuk_fitness" />
                                                            <label for=""penempatan_standuk_fitness">Fitness
                                                                Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id=""penempatan_standuk_mgmt_office"
                                                                value=""penempatan_standuk_mgmt_office"
                                                                name="spanduk[6]" />
                                                            <label for=""penempatan_standuk_mgmt_office">Mgmt.
                                                                Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id=""penempatan_standuk_receptionist"
                                                                name="spanduk[7]"
                                                                value=""penempatan_standuk_receptionist" />
                                                            <label
                                                                for=""penempatan_standuk_receptionist">Receptionist</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">Penempatan Poster </h5>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Penempatan_Poster_lobby"
                                                                value="Penempatan_Penempatan_Poster_lobby" name="poster[0]" />
                                                            <label for="Penempatan_Penempatan_Poster_lobby">Lobby</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Penempatan_Poster_basemant"
                                                                value="Penempatan_Penempatan_Poster_basemant" name="poster[1]" />
                                                            <label for="Penempatan_Penempatan_Poster_basemant">Basemant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Penempatan_Poster_pintu_parkir"
                                                                value="Penempatan_Penempatan_Poster_pintu_parkir"
                                                                name="poster[2]" />
                                                            <label for="Penempatan_Penempatan_Poster_pintu_parkir">Pintu
                                                                Parkir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Penempatan_Poster_lift"
                                                                value="Penempatan_Penempatan_Poster_lift" name="poster[3]" />
                                                            <label for="Penempatan_Penempatan_Poster_lift">Lift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Penempatan_Poster_swmg_pool"
                                                                value="Penempatan_Penempatan_Poster_swmg_pool" name="poster[4]" />
                                                            <label for="Penempatan_Penempatan_Poster_swmg_pool">Swmg. Pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Penempatan_Poster_fitness"
                                                                name="poster[5]" value="Penempatan_Penempatan_Poster_fitness" />
                                                            <label for="Penempatan_Penempatan_Poster_fitness">Fitness
                                                                Center</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Penempatan_Poster_mgmt_office"
                                                                value="Penempatan_Penempatan_Poster_mgmt_office"
                                                                name="poster[6]" />
                                                            <label for="Penempatan_Penempatan_Poster_mgmt_office">Mgmt.
                                                                Office</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="icheck-primary d-inline " style="padding:0px;">
                                                            <input type="checkbox" id="Penempatan_Penempatan_Poster_receptionist"
                                                                name="poster[7]"
                                                                value="Penempatan_Penempatan_Poster_receptionist" />
                                                            <label
                                                                for="Penempatan_Penempatan_Poster_receptionist">Receptionist</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border mt-2">
                                        <div style="padding:10px;">
                                            <h5 class="mt-2">Sticker Pintu Lift </h5>
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
                                            <h5 class="mt-2">X-Roll Up Banner </h5>
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
                                            <h5 class="mt-2">Acrilic Box/Brosur</h5>
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
                            </div> --}}

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly name="UPDATE_PROGRESS"
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
                        <input type="hidden" name="id_NEGOTIATION" id="id_NEGOTIATION" />
                        <div class=" row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_NEGOTIATION_1" class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" selected>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY">SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS
                                            REVIEW
                                        </option>
                                        <option value="SIGNED PKS" disabled>SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL" disabled>READY TO SELL</option>
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
                                                    name="FREE_SERVICE_1" id="FREE_SERVICE_1">
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
                                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled> --}}
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
                                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled> --}}
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
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly
                                        name="UPDATE_PROGRESS_NEGOTION_1" id="UPDATE_PROGRESS_NEGOTION_1" cols="30"
                                        rows="10" class="form-control"></textarea>
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
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_SURVEY" class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" selected>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN">BOQ, SITE SURVEY REPORT,
                                            DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS
                                            REVIEW
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
                                    <textarea disabled placeholder="Masukan UPDATE PROGRESS"
                                        name="UPDATE_PROGRESS_SITE_SURVEY" id="UPDATE_PROGRESS_SITE_SURVEY" cols="30"
                                        rows="10" class="form-control"></textarea>
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
                                        <input type="file" accept=".pdf" name="site_survey_pdf" id="">
                                        <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                                    </div>
                                </form>

                            </div>

                            <div class="col-sm-6">
                                <form action="{{Route('uploadBOQ')}}" id="upload_boq_pdf" name="upload_boq_pdf"
                                    method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>UPLOAD BOQ, APD FULL DESIGN</label>
                                        <input type="hidden" id="id_BOQ_UPLOAD" name="id_BOQ_UPLOAD">
                                        <input type="file" accept=".pdf" name="upload_boq_pdf" id="upload_boq_pdf">
                                        <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <form method="POST" action="{{Route('update.boq')}}" name="Edit_BOQ" id="Edit_BOQ_FORM" class="mt-2"
                        enctype="multipart/form-data">
                        <div class=" row ">
                            <input type="hidden" id="id_BOQ" name="id_BOQ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" readonly readonly name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_BOQ" class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" selected>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS">PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS
                                            REVIEW
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
                                    <label>BOQ, SITE SURVEY REPORT, DESIGNN</label>
                                    <input type="text" name="BOQ_DATE" data-toggle="datepicker" id="BOQ_DATE"
                                        class="form-control">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly disabled
                                        name="UPDATE_PROGRESS_BOQ" id="UPDATE_PROGRESS_BOQ" cols="30" rows="10"
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
                                            <input type="file" accept=".pdf" name="upload_pnl_pdf" id="">
                                            <input type="submit" class="btn btn-primary btn-sm mt-3 w-50">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>UPLOAD DRAFT PNL</label>
                                    <div class="form-group clearfix">
                                        <form action="{{Route('UploadDraftPnl')}}" name="upload_draft_pnl_pdf"
                                            id="upload_draft_pnl_pdf" method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="id_Draft_PNL_PDF" name="id_PNL_PDF">
                                            <input type="file" accept=".pdf" name="upload_draft_pnl_pdf" id="">
                                            <input type="submit" class="btn btn-primary btn-sm mt-3 w-50">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{Route('update.pnl')}}" name="Edit_PNL" id="Edit_PNL_FORM"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_PNL" id="id_PNL" />
                        <div class=" row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_PNL" class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" selected>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW">NEGOTIATION 2 - PKS REVIEW
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
                                    <label>PNL FULL APPROVE DATE</label>
                                    <input type="text" data-toggle="datepicker" name="PNL_DATE" id="PNL_DATE"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly disabled
                                        name="UPDATE_PROGRESS_PNL" id="UPDATE_PROGRESS_PNL" cols="30" rows="10"
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


                <div id="Edit_PKS_REVIEW" class="ilang">
                    <form method="POST" name="Edit_PKS_REVIEW" action="{{Route('update.pks_date')}}">
                        <input type="hidden" name="id_PKS_REVIEW" id="id_PKS_REVIEW" />
                        <div class=" row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_PKS_REVIEW" disabled class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" selected>NEGOTIATION 2 - PKS
                                            REVIEW
                                        </option>
                                        <option value="SIGNED PKS">SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL" disabled>READY TO SELL</option>
                                        <option value="REJECT">REJECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PKS REVIEW DATE</label> <br>
                                    <input type="text" data-toggle="datepicker" class="form-control"
                                        name="pks_review_date" id="pks_review_date">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly
                                        name="UPDATE_PROGRESS_PKS_REVIEW" id="UPDATE_PROGRESS_PKS_REVIEW" disabled
                                        cols="30" rows="10" class="form-control"></textarea>
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
                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label>UPLOAD WO</label>
                                    <div class="form-group clearfix">
                                        <form action="{{Route('updateWO')}}" name="wo_pdf" id="wo_pdf" method="post"
                                            enctype="multipart/form-data">
                                            <input type="hidden" id="id_WO_PDF" name="id_WO_PDF">
                                            <input type="file" accept=".pdf" name="wo_pdf" id="wo_pdf">
                                            <input type="submit" value="UPLOAD"
                                                class="btn btn-primary btn-sm mt-3 w-50">
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
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS
                                            REVIEW
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

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly name="UPDATE_PROGRESS_ROLL"
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
                                    <form action="{{Route('update.uploadFAFULLREJECT')}}" name="uploadFAREJECT"
                                        id="uploadFAREJECT" method="post" enctype="multipart/form-data">
                                        <div class="form-group clearfix">
                                            <input type="hidden" name="id_proposal_pdf_reject"
                                                id="id_proposal_pdf_reject" />
                                            <input type="file" accept=".pdf" name="form_fa" />
                                            <input type="submit" value="UPLOAD"
                                                class="btn btn-primary btn-sm mt-3 w-50">
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
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS
                                            REVIEW
                                        </option>
                                        <option value="SIGNED PKS" disabled>SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
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
                                        <option value="Sales isn't recommend">Sales isn't recommend</option>
                                        <option value="IKR/OSP isn't recommend">IKR/OSP isn't recommend</option>
                                        <option value="PnL calculation is not meet
                                            minimum margin profit">PnL calculation is not meet
                                            minimum margin profit</option>
                                        <option value="Business Scheme is not meet SOP">Business Scheme is not meet
                                            SOP
                                        </option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly
                                        name="UPDATE_PROGRESS_REJECT" id="UPDATE_PROGRESS_REJECT" cols="30" rows="10"
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


                <div id="Edit_READY" class="ilang">
                    <div class="border mb-3">
                        <div class="row">
                            <div class="col-sm-3 mt-2 ml-2 ">
                                <div class="form-group">
                                    <label>UPLOAD PKS (PDF)</label>
                                    <div class="form-group clearfix">
                                        <form action="{{Route('PKS_PDF')}}" id="PKS_PDF" name="PKS_PDF" method="post"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="id_PKS_PDF" id="id_PKS_PDF" />
                                            <input type="file" accept=".pdf" name="PKS_PDF" id="PKS_PDF" />
                                            <input type="submit" value="UPLOAD"
                                                class="btn btn-primary btn-sm mt-3 w-50">
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
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS" id="PROGRESS_STATUS"
                                        class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS
                                            REVIEW
                                        </option>
                                        <option value="SIGNED PKS" disabled>SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS" disabled>ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL" selected>READY TO SELL</option>
                                        <option value="REJECT" disabled>REJECT</option>
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
                                <div class="form-group">
                                    <label>PKS End </label> <br>
                                    <input type="text" maxlength="10" data-toggle="datepicker" readonly="readonly"
                                        class="form-control" name="pks_end" id="pks_end">
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


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>UPDATE PROGRESS</label>
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly
                                        name="UPDATE_PROGRESS_READY" id="UPDATE_PROGRESS_READY" cols="30" rows="10"
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


                <div id="Edit_PKS_SIGN" class="ilang">

                    <div class="border">
                        <div class="row mt-2 ml-2 ">
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

                            <div class="col-sm-5 ml-1">
                                <form action="{{Route('updateTAC')}}" method="post" name="Term_And_Condition"
                                    id="Term_And_Condition" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Term And Condition Full Signed</label> <br>
                                        <input type="hidden" id="id_tac_pdf" name="id_tac_pdf">
                                        <input type="file" accept=".pdf" name="Term_And_Condition"
                                            id="Term_And_Condition">
                                        <input type="submit" class="btn btn-primary btn-sm mt-3 w-25">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{Route('update.SIGNED_PKS')}}" name="Edit_PKS_SIGN"
                        enctype="multipart/form-data" id="Edit_PKS_SIGN_FORM">
                        <input type="hidden" name="id_PKS_SIGN" id="id_PKS_SIGN" />
                        <div class=" row mt-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PROGRESS STATUS</label>
                                    <select onchange="fase(this);" readonly name="PROGRESS_STATUS"
                                        id="PROGRESS_STATUS_PKS_SIGN" class="form-control">
                                        <option value="DESK SURVEY" disabled>DESK SURVEY</option>
                                        <option value="SUBMIT PROPOSAL" disabled>SUBMIT PROPOSAL</option>
                                        <option value="NEGOTIATION 1 - BUSINESS SCHEME" disabled>NEGOTIATION 1 -
                                            BUSINESS SCHEME
                                        </option>
                                        <option value="SITE SURVEY" disabled>SEdit_PKSITE SURVEY</option>
                                        <option value="BOQ, SITE SURVEY REPORT, DESIGN" disabled>BOQ, SITE SURVEY
                                            REPORT, DESIGN
                                        </option>
                                        <option value="PnL PROGRESS" disabled>PnL PROGRESS</option>
                                        <option value="NEGOTIATION 2 - PKS REVIEW" disabled>NEGOTIATION 2 - PKS
                                            REVIEW
                                        </option>
                                        <option value="SIGNED PKS" selected>SIGNED PKS</option>
                                        <option value="ROLL-OUT PROGRESS">ROLL-OUT PROGRESS</option>
                                        <option value="READY TO SELL" disabled>READY TO SELL</option>
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
                                    <textarea placeholder="Masukan UPDATE PROGRESS" readonly
                                        name="UPDATE_PROGRESS_PKS_SIGN" id="UPDATE_PROGRESS_PKS_SIGN" cols="30"
                                        rows="10" class="form-control"></textarea>
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



@endsection