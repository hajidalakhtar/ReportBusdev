<div class="info-box" style="height:147px">
    <div class="info-box-content">
        <span class="info-box-text text-center h5"><b> ALERT </b> </span>
        <div class="text-center">
            <img src="park.svg" alt="" srcset="" width="45%" class="mt-1" style="transform: scaleX(-1);">
        </div>
    </div>
</div>


<nav>
    <div class="nav nav-tabs" style="margin-bottom:-2px;" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
            aria-controls="nav-home" aria-selected="true">Summary</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
            aria-controls="nav-profile" aria-selected="false">Reject</a>
    </div>
</nav>


<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <h1>
            <div class="info-box" style="height:330px;">

                <div class="info-box-content">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center h4" style="margin-bottom:0px;">Summary Project</p>
                            <p class="text-center " style="font-size:12px;"><b> All Project : {{$all}}</b></p>
                        </div>
                        <div class="col-md-12">
                            <canvas id="donutChart" style="width:150%;"></canvas>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#007bff"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">SITE SURVEY</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#6C757D"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">BOQ</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#FFEA4A"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">PnL PROGRESS</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#D94360"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">PKS REVIEW</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#001F3F"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">Sign PKS</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#FD803A"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">ROLL-OUT</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#5BE772"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">READY TO SELL</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:red"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">REJECT</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </h1>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <h1>
            <div class="info-box" style="height:320px;">

                <div class="info-box-content">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center h4" style="margin-bottom:0px;">Reject</p>
                            <p class="text-center " style="font-size:12px;"><b> All Reject : {{$reject}}</b></p>
                        </div>
                        <div class="col-md-12">
                            <canvas id="donutChart_reject" style="width:150%;"></canvas>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#007bff"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">CODE 1</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#6C757D"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">CODE 2</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#FFEA4A"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">CODE 3</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#D94360"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">CODE 4</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#001F3F"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">CODE 5</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div style="width:10px;height:10px;background-color:#FD803A"></div>
                                <p style="font-size:9px; margin-bottom:0px;" class="ml-2">CODE 6</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </h1>
    </div>

</div>