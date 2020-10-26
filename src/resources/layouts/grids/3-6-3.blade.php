@extends("web::layouts.app")

@section('content')

    <div class="row">

        <div class="col-md-3">
            @yield('left')
        </div>

        <div class="col-md-6">
            @yield('center')
        </div>

        <div class="col-md-3">
            @yield('right')
        </div>


    </div>

@stop