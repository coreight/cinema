<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CategoriesRequest
 * @package App\Http\Requests
 */
class CategoriesRequest extends FormRequest
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
            'title' => 'required|min:5',
            'image' => 'image'
        ];
    }


    public function messages()
    {
        return [
            'required' => 'Ce champ est obligatoire',
            'min' => 'Ce champ doit faire plus de :min caractères',
            'image' => 'Ce champ doit être une image valide'
        ];
    }

}
