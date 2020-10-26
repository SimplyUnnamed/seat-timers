<?php


namespace SimplyUnnamed\Seat\Timers\Http\DataTables;


use SimplyUnnamed\Seat\Timers\Models\TimerTypes;
use Yajra\DataTables\Services\DataTable;

class TimerTypesDatatable extends DataTable
{

    public function ajax(){
        return datatables()
            ->eloquent($this->applyScopes($this->query()))
            ->editColumn('actions', function($row){
                return view("timers::partials.delete", [
                    'id'=>$row->id,
                    'route'=>'timertypes.delete',
                    'label'=>$row->label
                ]);
            })
            ->make(true);
    }

    public function html(){
        return $this->builder()
            ->postAjax()
            ->columns($this->getColumns())
            ->orderBy(0, 'asc');
    }

    public function query(){
        return TimerTypes::select('timer_types.*');
    }

    public function getColumns(){
        return [
            ['data'=>'id', 'title'=>"ID"],
            ['data'=>'label', 'title'=>"Label"],
            ['data'=>'actions', 'title'=>"Actions"],
        ];
    }

}