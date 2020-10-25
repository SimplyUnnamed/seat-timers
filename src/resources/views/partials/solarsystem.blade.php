
@if(is_null($location) || is_null($location->name))
        Unknown
@else
        <a href="//evemaps.dotlan.net/system/{{$location->name}}" target="_blank">
                {{$location->name}}
        </a>

@endif

