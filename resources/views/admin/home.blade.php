@extends('layouts.admin')

@section('content')
{{-- @include('admin.chart.home') --}}
{{-- <h1>asds</h1> --}}
<!--
|--------------------------------------------------------------------------|
| VIEW                                                         |
|--------------------------------------------------------------------------|
 -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
</div> --}}
{{-- @include('admin.update') --}}
{{-- @include('admin.sidebar') --}}
{{-- @include('admin.content') --}}
@endsection
@section('script')
@include('admin.javascript')
@endsection