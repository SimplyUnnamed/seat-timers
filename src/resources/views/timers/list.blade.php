@extends('web::layouts.grids.12')

@section('title', trans('timers::timers.list'))
@section('page_header', trans('timers::timers.list'))



@push('javascript')


    {{$dataTable->scripts()}}

    @include("timers::includes.javascript.start-count-down")
@endpush



@section('full')
    @can('timers.store')
        <a class="btn btn-primary" href="{{route('timers.create')}}"/>Add Timer</a>
    @endcan
    <div class="mt-2 card card-default">
        <div class="card-header">
            <h3 class="card-title">Timers - Current Time: {{$currentTime}}</h3>
        </div>
        <div class="card-body">
            {{$dataTable->table()}}
        </div>
    </div>
@endsection