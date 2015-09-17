<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SessionsRequest
 * @package App\Http\Requests
 */
class SessionsRequest extends FormRequest
{



    public function authorize()
    {
        return true;
    }

    /**
     * Retourne un tableau de validation par champ
     * @return array
     */

    public function rules()
    {
        return [
            'date_session' => 'required',
            'time_session' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'required' => 'Ce champ est requis',
        ];
    }

}
