@extends('web::layouts.grids.4-8')

@section('title', trans('timers::timers.list'))
@section('page_header', trans('timers::timers.list'))

@push('javascript')
    <script src="{{asset('web/js/bootbox.min.js')}}"></script>
    <script src="{{asset('web/timers/js/deleterow.js')}}"></script>
    {{$dataTable->scripts()}}
@endpush

@section('left')
    @can('timertypes.store')
        @include('timers::includes.timertype-form')
    @endcan
@endsection



@section('right')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Timer Types</h3>
        </div>
        <div class="card-body">
            {{$dataTable->table()}}
        </div>
    </div>
@endsection