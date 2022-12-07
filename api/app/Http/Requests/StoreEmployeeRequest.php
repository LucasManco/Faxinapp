<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'transport_value'=> 'numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'categorie_diarista' => '',
            'categorie_piscina' => '',
            'categorie_passadeira' => '',
            'categorie_lavadeira' => '',
            'categorie_cozinheira' => '',
            'description' => 'string'

        ];
    }
}
