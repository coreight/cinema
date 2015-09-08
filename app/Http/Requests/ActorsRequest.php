<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ActorsRequest
 * @package App\Http\Requests
 */
class ActorsRequest extends FormRequest
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
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:3',
            'dob' => 'required|date_format:Y/m/d|before:now',
            'image' => 'image'
        ];
    }


    public function messages()
    {
        return [
            'required' => 'Ce champ est obligatoire',
            'min' => 'Ce champ doit faire plus de :min caractères',
        ];
    }

}
