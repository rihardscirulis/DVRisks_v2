<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFactorGroupRequest extends FormRequest
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
            'name' => 'required|unique:factor_groups|max:30',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Jaunās faktora grupas aizpildes lauks ir obligāts!',
            'name.max' => 'Jaunais faktora grupas nosaukums ir pārāk garš!',
            'name.unique' => 'Jaunais faktora grupas nosaukums eksistē datubāzē!',
        ];
    }
}
