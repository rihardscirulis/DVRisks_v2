<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFactorRequest extends FormRequest
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
            'factor_group_id' => 'required',
            'name' => 'required|unique:factors',
            'risk_causes' => 'max:50',
            'risk_procedure' => 'max:200',
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
            'factor_group_id.required' => 'Jaunās faktora aizpildes lauks ir obligāts!',
            'name.required' => 'Jaunais faktora aizpildes lauks ir obligāts!',
            'name.unique' => 'Jaunais faktora nosaukums jau eksistē datubāzē!',
            'risk_causes.max' => 'Jaunais riska cēlonis ir pārāk garš!',
            'risk_procedure.max' => 'Darba riska novērtēšanas kārtība ir pārāk gara!',
        ];
    }

}
