<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'name' => 'string',
            'norm_nitrogen' => 'array',
            'norm_phosphorus' => 'array',
            'norm_potassium' => 'array',
            'culture_group_id' => 'array',
            'region' => 'string',
            'price' => 'array',
            'description' => 'string',
            'purpose' => 'string',
            'status' => 'string',
            'sort' => 'string'
        ];
    }
}
