@extends('layouts.admin')
@section('content')
<div class="row">
    @foreach ($user as $data)
    <div class="col-md-4">
        <div class="card">
            <div class="row">
                <div class="col-md-5" style="padding-right:0px;">
                    <div class="card-body h-100 w-100 text-center">
                        <img class="img-circle"
                            src="{{ $data->gender == "Male" ? 'default-male_2.jpg' : 'no-profile-picture-icon-female-3.jpg' }}"
                            alt="User Avatar" width="100px;">
                        <h5 style="font-size:15px;" class="mt-3">{{$data->name}}</h5>
                        <p class="text-center"><b>{{$data->produktivitas}}</b></p>
                    </div>
                </div>
                <div class="col-md-7" style="padding-left:0px;">
                    <ul class="list-group">

                        <li class="list-group-item"
                            style="border-top-left-radius:0px; margin-top:-1px;margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">
                            SUBMIT PROPOSAL <span class=" float-right">{{$data->submit_proposal}}</span>
                        </li>
                        <li class="list-group-item"
                            style="border-top-left-radius:0px; margin-top:-1px;margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">
                            SITE
                            SURVEY <span class=" float-right">{{$data->site_survey}}</span></li>
                        <li class="list-group-item"
                            style="margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">BOQ<span
                                class=" float-right">{{$data->boq}}</span></li>
                        <li class="list-group-item"
                            style="margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">PNL<span
                                class=" float-right">{{$data->pnl}}</span></li>
                        <li class="list-group-item"
                            style="margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">PKS
                            REVIEW<span class=" float-right">{{$data->pks_review}}</span></li>
                        <li class="list-group-item"
                            style="border-bottom-left-radius:0px; margin-bottom:-1px;margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">
                            SIGNED PKS<span class=" float-right">{{$data->Sign_pks}}</span></li>
                        <li class="list-group-item"
                            style="border-bottom-left-radius:0px; margin-bottom:-1px;margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">
                            ROLL-OUT<span class=" float-right">{{$data->roll}}</span></li>
                        <li class="list-group-item"
                            style="border-bottom-left-radius:0px; margin-bottom:-1px;margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">
                            READY TO SELL<span class=" float-right">{{$data->sell}}</span></li>
                        <li class="list-group-item"
                            style="border-bottom-left-radius:0px; margin-bottom:-1px;margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">
                            REJECT<span class=" float-right">{{$data->reject}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-md-4">
        <div class="card">
            <div class="row">

                <div class="col-md-12" style="padding-left:0px;">
                    <ul class="list-group">
                        <li class="list-group-item"
                            style="border-top-left-radius:0px; margin-top:-1px;margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">
                            PROJECT (DESK SURVEY)<span class=" float-right">{{$report_all}}</span></li>
                        <li class="list-group-item"
                            style="margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">PROGRESS<span
                                class=" float-right">{{$progress}}</span></li>
                        <li class="list-group-item"
                            style="margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">HOMEPAS<span
                                class=" float-right">{{$jumlah_homepass}}</span></li>
                        <li class="list-group-item"
                            style="margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">READY TO SELL
                            <span class=" float-right">{{$ready_to_sell}}</span></li>
                        <li class="list-group-item"
                            style="border-bottom-left-radius:0px; margin-bottom:-1px;margin-right:-1px; padding:2px; padding-left:10px; padding-right:10px;">
                            REJECT<span class=" float-right">{{$reject}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection