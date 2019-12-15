@section('sidebar')
<div class="info-box" style="height:147px;overflow-y: scroll; height:200px;">
    <div class="info-box-content">
        <span class="info-box-text text-center h5"><b> ALERT </b> </span>
        <div class="text-center">
            {{-- {{count($alert)}} --}}
            @if (Count($alert) == 0)
            <img src="{{ Request::is('staff') ? '' : '../' }}park.svg" alt="" srcset="" width="45%" class="mt-1"
                style="transform: scaleX(-1);">
            @else
            @foreach ($alert as $data)
            <hr>
            <p style="font-size:12px;" class="text-danger">- {{$data->pesan}}</p>
            @endforeach
            <hr>
            @endif
        </div>
    </div>
</div>


<nav>
    <div class="nav nav-tabs" style="margin-bottom:-2px;" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active w-50 text-center" id="nav-home-tab" data-toggle="tab" href="#nav-home"
            role="tab" aria-controls="nav-home" aria-selected="true">Summary</a>
        <a class="nav-item nav-link w-50 text-center" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
            role="tab" aria-controls="nav-profile" aria-selected="false">Reject</a>
    </div>
</nav>


<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <h1>
            <div class="info-box" style="height:349px;">

                <div class="info-box-content">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center h4" style="margin-bottom:0px;">Summary Project</p>
                            <p class="text-center " style="font-size:12px;"><b> All Project : {{$all}}</b></p>
                        </div>
                        <div class="col-md-12 mt-2">
                            <canvas id="donutChart" style="width:120%;"></canvas>
                        </div>
                    </div>
                    <div class="row " style="margin-top:30px;">

                        <div class="col-md-6 mb-2">
                            <div class="d-flex">
                                <div style="width:20px;height:10px;background-color:#03b1fc"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">SUBMIT PROPOSAL</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="d-flex">
                                <div style="width:20px;height:10px;background-color:#8DA9C4"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">NEGOTIATION</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#007bff"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">SITE SURVEY</p>
                            </div>
                        </div>
                        <div class="col-md-6  mb-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#6C757D"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">BOQ & APD</p>
                            </div>
                        </div>
                        <div class="col-md-6  mb-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#FFEA4A"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">PnL PROGRESS</p>
                            </div>
                        </div>
                        <div class="col-md-6  mb-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#D94360"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">PKS REVIEW</p>
                            </div>
                        </div>
                        <div class="col-md-6  mb-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#001F3F"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">Sign PKS</p>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#FD803A"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">ROLL-OUT</p>
                            </div>
                        </div>


                        <div class="col-md-6  mb-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:red"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">REJECT</p>
                            </div>
                        </div>
                        <div class="col-md-6  mb-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#5BE772"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">READY TO SELL</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </h1>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <h1>
            <div class="info-box" style="height:349px;">
                <div class="info-box-content">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center h4" style="margin-bottom:0px;">Reject</p>
                            <p class="text-center " style="font-size:12px;"><b> All Reject : {{$reject}}</b></p>
                        </div>
                        <div class="col-md-12">
                            <canvas id="donutChart_reject" style="width:130%;"></canvas>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 mt-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#007bff"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">Exclusive</p>

                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#6C757D"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">Limited ISP Provider</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#FFEA4A"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">Sales isn't recommend</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#D94360"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">IKR/OSP isn't recommend</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="d-flex">
                                <div style="width:30px;height:10px;background-color:#001F3F"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-1 ">PnL calculation is not
                                    meet
                                    minimum margin profit</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#FD803A"></div>
                                <p style="font-size:10px; margin-bottom:0px;" class="ml-2">Business Scheme is not meet
                                    SOP</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </h1>
    </div>
</div>


@endsection