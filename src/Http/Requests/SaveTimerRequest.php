<?php

namespace SimplyUnnamed\Seat\Timers\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTimerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'system_id' => 'required',
            'location' => 'required',
            'type'      => 'required',
            'notes'     => 'nullable',
            'datetime'  => 'nullable',
            'days'      => 'required_without:datetime',
            'hours'      => 'required_without:datetime',
            'minutes'      => 'required_without:datetime',
            'seconds'      => 'required_without:datetime',
        ];
    }
}
