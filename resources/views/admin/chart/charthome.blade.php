@extends('layouts.admin')

@section('navbar_chart')

<ul class="nav nav-tabs" style="margin-bottom:-16px;" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress"
            aria-selected="true">Progress</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="ready-tab" data-toggle="tab" href="#ready" role="tab" aria-controls="ready"
            aria-selected="false">Ready To Sell</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="reject-tab" data-toggle="tab" href="#reject" role="tab" aria-controls="reject"
            aria-selected="false">Reject</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " id="property-tab" data-toggle="tab" href="#property" role="tab" aria-controls="property"
            aria-selected="true">Property</a>
    </li>


    <li class="nav-item">
        <a class="nav-link" id="homepas-tab" data-toggle="tab" href="#homepas" role="tab" aria-controls="reject"
            aria-selected="false">Homepas</a>
    </li>
</ul>
@endsection

@section('content')
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="progress" role="tabpanel" aria-labelledby="home-tab">
        @include('admin.chart.home')
    </div>
    <div class="tab-pane fade" id="property" role="tabpanel" aria-labelledby="profile-tab">
        @include('admin.chart.property')
    </div>
    <div class="tab-pane fade" id="ready" role="tabpanel" aria-labelledby="ready-tab">
        @include('admin.chart.ready')
    </div>
    <div class="tab-pane fade" id="reject" role="tabpanel" aria-labelledby="reject-tab">
        @include('admin.chart.reject')
    </div>
    <div class="tab-pane fade" id="homepas" role="tabpanel" aria-labelledby="reject-tab">
        @include('admin.chart.homepas')
    </div>

</div>
@endsection
@section('script')
@include('admin.javascript')
@endsection