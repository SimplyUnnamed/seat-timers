<?php


namespace SimplyUnnamed\Seat\Timers\Observers;


use Illuminate\Support\Facades\Auth;
use SimplyUnnamed\Seat\Timers\Models\Timer;

class TimerObserver
{

    public function creating(Timer $timer){
        $timer->user_id = Auth::id();
    }
}