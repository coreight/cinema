<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DirectorsRequest
 * @package App\Http\Requests
 */
class DirectorsRequest extends FormRequest
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
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'dob' => 'required|date_format:Y/m/d|before:now',
            'image' => 'image',
            'biography' => 'min:10'
        ];
    }


    public function messages()
    {
        return [
            'required' => 'Ce champ est obligatoire',
            'min' => 'Ce champ doit faire plus de :min caractères',
            'url' => 'Merci de renseigner une adresse valide',
            'before' => 'La date doit être antérieure à aujourd\'hui',
            'date_format' => 'Merci de renseigner une date valide'
        ];
    }

}
