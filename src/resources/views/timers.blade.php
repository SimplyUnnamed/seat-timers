@extends('web::layouts.grids.4-8')

@section('title', trans('timers::timers.list'))
@section('page_header', trans('timers::timers.list'))

@push('head')
    <link rel="stylesheet" href="{{asset('web/vendors/timers/css/daterangepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('web/vendors/timers/css/jquery.autocomplete.css')}}" />
@endpush

@push('javascript')
    <script src="{{asset('web/vendors/timers/js/daterangepicker.js')}}"></script>
    <script src="{{asset('web/vendors/timers/js/jquery.autocomplete.js')}}"></script>

    <script src="{{asset('web/timers/js/timers.js')}}"></script>

    {{$dataTable->scripts()}}

    @include("timers::includes.javascript.start-count-down")
@endpush

@section('left')
    <div class="card card-default" id="Add-Timer">
        <form id="add-timer" enctype="multipart/form-data" method="post" action="{{route('timers.saveTimer')}}">
        <div class="card-header">
            <h3 class="card-title">
                Add Timer
            </h3>
        </div>

        <div class="card-body">

                {{csrf_field()}}

                {{method_field('PUT')}}

                <div class="form-group row">
                    <label for="event-system" class="col-form-label col-md-4" >System</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="event-system-lookup"/>
                    </div>
                </div>

                <input type="hidden" name="system_id">

                <div class="form-group row">
                    <label for="event-location" class="col-form-label col-md-4" >Location</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="location" id="event-location"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="event-type" class="col-form-label col-md-4" >Type</label>
                    <div class="col-md-8">
                        <select class="form-control" name="type" id="event-type">
                            <option></option>
                            @foreach($types as $type)
                                <option value="{{$type->label}}">{{$type->label}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row datepicker">
                    <label for="event-datetime" class="col-form-label col-md-4" >Date / Time (UTC)</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="event" id="event-datetime" value=""/>
                    </div>
                </div>

                <div class="form-group row countdown">

                    <div class="col-md-3">
                        <label for="day-timer" class="col-form-label" >Days</label>
                        <input type="number" min="0" class="form-control" name="days" id="day-timer" value="0"/>
                    </div>

                    <div class="col-md-3">
                        <label for="hour-timer" class="col-form-label" >Hours</label>
                        <input type="number" max="23" min="0" class="form-control" name="hours" id="hour-timer" value="0"/>
                    </div>

                    <div class="col-md-3">
                        <label for="minute-timer" class="col-form-label" >Minutes</label>
                        <input type="number" max="60" min="0" class="form-control" name="minutes" id="minute-timer" value="0"/>
                    </div>

                    <div class="col-md-3">
                        <label for="second-timer" class="col-form-label" >Seconds</label>
                        <input type="number" max="60" min="0" class="form-control" name="seconds" id="second-timer" value="0"/>
                    </div>
                </div>



        </div>
        <div class="card-footer">
            <div class="btn-group float-right">
                <button type="submit" class="btn btn-primary">Add Timer</button>
            </div>
        </div>
        </form>
    </div>

@endsection



@section('right')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Timers</h3>
        </div>
        <div class="card-body">
            {{$dataTable->table()}}
        </div>
    </div>
@endsection