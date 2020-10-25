<?php


namespace SimplyUnnamed\Seat\Timers\Models;


use Illuminate\Database\Eloquent\Model;
use Seat\Eveapi\Models\Sde\SolarSystem;
use Seat\Web\Models\User;

class Timer extends Model
{

    protected $table = 'timers';

    protected $fillable = [
        'datetime',
        'system_id',
        'location',
        'type',
        'notes',
    ];

    protected $casts = [
        'datetime' => 'datetime:d/m/Y H:i:s'
    ];

    protected static function booted(){
        //set the author based on who is logged in.
        /*static::creating(function($timer){
            dd("I am running");
            $timer->user_id = auth()->user()->getKey();
             //return model;
        });*/
    }

    /**
     * Relationship to the set solar system
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function SolarSystem(){
        return $this->belongsTo(SolarSystem::class, 'system_id');
    }

    /**
     * Relationship to the Author
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Author(){
        return $this->belongsTo(User::class, 'user_id');
    }

}