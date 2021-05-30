<?php

namespace WeFashion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            
            'name' => 'required',
            'description' => 'min:5|max:1048',
            'price' => 'required',
            'size' => 'required'
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Veuillez renseigner le nom du produit !',
            'description.min' => 'Veuillez entrer au minimum 5 caractères pour la description',
            'description.max' => 'La description ne peut dépasser 1048 caractères',
            'price.required' => 'Veuillez renseigner le prix !',
            'size.required' => 'Veuillez sélectionner au moins une taille !'
        ];
    }
}
