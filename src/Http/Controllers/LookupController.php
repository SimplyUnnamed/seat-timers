<?php


namespace SimplyUnnamed\Seat\Timers\Http\Controllers;



use Illuminate\Http\Request;
use Seat\Eveapi\Models\Sde\SolarSystem;
use Seat\Web\Http\Controllers\Controller;

class LookupController extends Controller
{

    public function systems(Request $request){

        $systems = SolarSystem::where('name', 'like', "{$request->get('query')}%")->take(10)->get();

        $results = $systems->map(function($system){
            return [
                'value' => $system->name,
                'data' => $system->system_id
            ] ;
        });
        return response()->json(['suggestions'=>$results]);
    }
}