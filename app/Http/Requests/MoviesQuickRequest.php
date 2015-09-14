<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MoviesQuickRequest
 * @package App\Http\Requests
 */
class MoviesQuickRequest extends FormRequest
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
            'title' => 'required|min:2',
            'synopsis' => 'required|min:10|max:200',
        ];
    }


    public function messages()
    {
        return [
            'required' => 'Ce champ est obligatoire',
            'min' => 'Ce champ doit faire plus de :min caractères',
            'max' => 'Ce champ doit faire moins de :max caractères',

        ];
    }

}
