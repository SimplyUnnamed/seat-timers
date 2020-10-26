<?php


namespace SimplyUnnamed\Seat\Timers\Http\DataTables;


use Carbon\Carbon;
use SimplyUnnamed\Seat\Timers\Models\Timer;
use Yajra\DataTables\Services\DataTable;

class TimersDatatable extends DataTable
{
    public function ajax(){
        return datatables()
            ->eloquent($this->applyScopes($this->query()))
            ->editColumn('datetime', function($row){
                return view("timers::partials.datetime", ['row'=>$row]);
            })
            ->editColumn('author.name', function($row){
                return view('web::partials.character', ['character' => $row->Author->main_character]);//->render();
            })
            ->editColumn('solarSystem.name', function($row){
                return view('timers::partials.solarsystem', ['location'=>$row->SolarSystem]);//->render();
            })
            ->editColumn('countdown', function($row){
                $dt = Carbon::createFromFormat('Y-m-d H:i:s', $row->datetime);
                $now = Carbon::now('UTC');
                return view('timers::partials.countdown', ['row'=>$row, 'countdown'=>$now->shortAbsoluteDiffForHumans($dt, 6)]);
            })
            ->make(true);
    }

    public function html(){
        return $this->builder()
            ->postAjax()
            ->columns($this->getColmns())
            ->orderBy(0, 'asc')
            ->parameters([
                'drawCallback' => 'function() { runTimers(); }'
            ]);
    }

    public function query(){
        return Timer::with(['SolarSystem', 'Author.main_character'])
            ->where('datetime', '>', Carbon::now('UTC'))
            ->select('timers.*');
    }

    public function getColmns(){
        return [
            ['data'=>'datetime', 'title'=>"Date \ Time"],
            ['data'=>'countdown', 'title'=>"Time till"],
            ['data'=>'solarSystem.name', 'title'=>"Solar System"],
            ['data'=>'location', 'title'=>"Location"],
            ['data'=>'type', 'title'=>"Type"],
            ['data'=>'notes', 'title'=>"Notes"],
            ['data'=>'author.main_character.name', 'title'=>"Author"],
        ];
    }
}