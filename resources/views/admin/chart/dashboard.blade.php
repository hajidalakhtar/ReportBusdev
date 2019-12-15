<div>
    <div class="card">
        <div class="card-body" style="padding:0px;">
            <div class="row">
                <div class="col-md-8">
                    <canvas id="barChart" style="height:200px; min-height:230px"></canvas>
                    {{-- <canvas id="stackedBarChart" style="height:230px; min-height:230px"></canvas> --}}
                </div>
                <div class="col-md-4" style="border-left:1px solid #DCDDE0; padding-left:0px;">
                    <div class="ml-3 mt-3">
                        <h4 class="text-center">Ready To Sell </h4>
                    </div>
                    <hr style="margin-bottom:0px;">
               
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Building</th>
                                <th scope="col">Kontrak</th>
                                <th scope="col">Kontrak</th>
                                <th scope="col">Skema Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Ready_To_sell as $data)
                            <tr>
                                <th scope="row">{{$data->BUILDING_NAME}}</th>
                                <td>{{$data->BASO_DATE}}</td>
                                <td>{{$data->PKS_END}}</td>
                                <td>
                                    @if ($data->REVENUE_SHARE != null || $data->REVENUE_SHARE != "%")
                                    &nbspREVENUE SHARE : {{$data->REVENUE_SHARE}}%
                                    <br>
                                    @endif
                                    @if ($data->RENTAL_BASE != "Rp. 0")
                                    &nbspRENTAL_BASE
                                    <br>
                                    : {{$data->RENTAL_BASE}}
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="mt-2 float-right mr-3">
                        {{$Ready_To_sell->links()}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-center">READY TO SELL</h5>
                    <canvas id="readyToSell"></canvas>
                </div>
                <div class="col-md-4">
                    <h5 class="text-center">WILAYAH</h5>
                    <canvas id="wilayah"></canvas>
                </div>
                <div class="col-md-4">
                    <h5 class="text-center">PROPERTY</h5>
                    <canvas id="Property"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>