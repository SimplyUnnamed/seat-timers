@extends('web::layouts.grids.12')

@section('title', "Add Timer")
@section('page_header', "Add Timer")

@push('head')
    <link rel="stylesheet" href="{{asset('web/vendors/timers/css/daterangepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('web/vendors/timers/css/jquery.autocomplete.css')}}" />
@endpush

@push('javascript')
    <script src="{{asset('web/vendors/timers/js/daterangepicker.js')}}"></script>
    <script src="{{asset('web/vendors/timers/js/jquery.autocomplete.js')}}"></script>

    <script src="{{asset('web/timers/js/timers.js')}}"></script>
@endpush

@section('full')
    <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6 ">
                @include('timers::includes.timer-form')
            </div>
        <div class="col-md-3"></div>
    </div>

@endsection