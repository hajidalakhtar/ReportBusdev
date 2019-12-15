@extends('layouts.staff')
@include('staff.sidebar')

@section('content')

@include('staff.info')
@include('staff.content')

@endsection

@include('staff.javascript')