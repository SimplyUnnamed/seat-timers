<?php


namespace SimplyUnnamed\Seat\Timers\Http\Controllers;


use Seat\Web\Http\Controllers\Controller;
use SimplyUnnamed\Seat\Timers\Http\DataTables\TimerTypesDatatable;
use SimplyUnnamed\Seat\Timers\Http\Requests\SaveTimerTypeRequest;
use SimplyUnnamed\Seat\Timers\Models\TimerTypes;

class TimerTypesController extends Controller
{

    public function index(TimerTypesDatatable $datatable){
        return $datatable->render("timers::timertypes.list");
    }


    public function store(SaveTimerTypeRequest $request){

        $type = new TimerTypes($request->all());
        $type->save();

        return response()->redirectToRoute('timertypes.view');
    }

    public function remove($id){
        $type = TimerTypes::findorFail($id);

        $type->delete();

        return response()->redirectToRoute('timertypes.view');
    }
}