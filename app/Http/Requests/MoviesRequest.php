<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MoviesRequest
 * @package App\Http\Requests
 */
class MoviesRequest extends FormRequest
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
            'type' => 'required',
            'title' => 'required|min:2',
            'synopsis' => 'required|min:10|max:200',
            'description' => 'required|min:50',
            'image' => 'image',
            'trailer' => 'regex:/<iframe src="http:\/\//',
            'duree' => 'integer|max:5',
            'budget' => 'integer',
            'annee' => 'date_format:Y',
            'date_release' => 'date',
            'actors' => 'required|min:2'
        ];
    }


    public function messages()
    {
        return [
            'required' => 'Ce champ est obligatoire',
            'min' => 'Ce champ doit faire plus de :min caractères',
            'max' => 'Ce champ doit faire moins de :max caractères',
            'integer' => 'Ce champ doit être un chiffre',
            'regex' => 'Mauvais format, merci d\'enregistrer un :attributes valide',
            'date_format' => 'L\'année doit être au format YYYY',
        ];
    }

}
