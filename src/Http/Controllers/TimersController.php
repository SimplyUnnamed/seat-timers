<?php


namespace SimplyUnnamed\Seat\Timers\Http\Controllers;



use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Illuminate\Support\Arr;
use Seat\Web\Http\Controllers\Controller;
use SimplyUnnamed\Seat\Timers\Http\DataTables\TimersDatatable;
use SimplyUnnamed\Seat\Timers\Http\Requests\SaveTimerRequest;
use SimplyUnnamed\Seat\Timers\Models\Timer;
use SimplyUnnamed\Seat\Timers\Models\TimerTypes;

class TimersController extends Controller
{

    /**
     * Show Datatable view
     * @param TimersDatatable $datatable
     * @return mixed
     */
    public function index(TimersDatatable $datatable){
        $currentTime = Carbon::now('utc');

        return $datatable->render("timers::timers.list", compact(['currentTime']));

    }

    /**
     * Show new timer form
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function create(){
        $types = TimerTypes::all();
        return view('timers::timers.add', compact('types'));
    }

    /**
     * Store a new Timer
     * @param SaveTimerRequest $request
     */
    public function store(SaveTimerRequest $request){

        $timer = $request->all();
        $datetime = Arr::get($timer, 'datetime', null);

        //If the datetime isn't set, we will use the timers set
        if(is_null($datetime)){
            $countdown = Arr::only($timer, ['days','hours','minutes','seconds']);
            $datetime = Carbon::now('UTC');
            $datetime->addDays(Arr::get($countdown, 'days', 0));
            $datetime->addHours(Arr::get($countdown, 'hours', 0));
            $datetime->addMinutes(Arr::get($countdown, 'minutes', 0));
            $datetime->addSeconds(Arr::get($countdown, 'seconds', 0));
        }

        $timer = new Timer(array_merge($timer, ['datetime'=>$datetime]));

        $timer->save();

        if($request->get('add_another', false)){
            return response()->redirectToRoute('timers.create');
        }

        return response()->redirectToRoute('timers.view');
    }
}