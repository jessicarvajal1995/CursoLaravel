<?php

namespace LaraDex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaraDex\Http\Requests\StoreTrainerRequest;

class StoreTrainerRequest extends FormRequest
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
        //Logica de validacion de formularios
        return [
            'name' => 'required|max: 10',
            'description' => 'required|max: 150',
            'avatar' => 'required|image'
        ];
    }
}
