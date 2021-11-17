<?php

namespace App\Http\Requests\Frontend\Users;

use Illuminate\Foundation\Http\FormRequest;

class BanksAccountsUpdateRequest extends FormRequest
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
            'name_user_account' => 'string|required|min:4|max:30',
            'document' => 'required|digits_between:7,9',
            'type' => 'required|string',
            'account_number' => 'numeric|required|unique:bank_accounts,account_number,' . $this->id,
        ];
    }
}
