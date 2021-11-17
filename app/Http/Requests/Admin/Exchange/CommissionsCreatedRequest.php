<?php

namespace App\Http\Requests\Admin\Exchange;

use Illuminate\Foundation\Http\FormRequest;

class CommissionsCreatedRequest extends FormRequest
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
            'dolar' => 'numeric|min:0|max:100',
            'percentage' => 'numeric|min:0|max:100',
        ];
    }
}
