<?php

namespace App\Http\Requests\Frontend\Users;

use Illuminate\Foundation\Http\FormRequest;

class BanksAccountsMovilCreatedRequest extends FormRequest
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
            'bank_id' => 'numeric|required',
            'phone' => 'required|numeric|digits_between:8,9',
            'document' => 'required|digits_between:7,9',
            'type' => 'required|string',
        ];
    }
}
