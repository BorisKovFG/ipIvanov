<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'norm_nitrogen' => 'required|numeric|between:0,99999999.99',
            'norm_phosphorus' => 'required|numeric|between:0,99999999.99',
            'norm_potassium' => 'required|numeric|between:0,99999999.99',
            'culture_group_id' => 'required|exists:culture_groups,id',
            'region' => 'required|string',
            'price' => 'required|numeric|between:0,99999999.99',
            'description' => 'required|string',
            'purpose' => 'required|string',
        ];
    }
}
