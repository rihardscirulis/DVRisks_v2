<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnvironmentRequest extends FormRequest
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
            'authority_id' => 'required',
            'name' => 'required',
            'workplaces' => 'required',
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
            'authority_id.required' => 'Lūdzu, izvēlieties no saraksta iestādi!',
            'name.required' => 'Lūdzu, ievadiet jaunu darba vidi!',
            'workplaces.required' => 'Lūdzu ievadiet jaunu darba vietu!',
        ];
    }
}
