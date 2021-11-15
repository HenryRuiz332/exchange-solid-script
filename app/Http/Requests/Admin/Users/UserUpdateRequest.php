<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'string|required|min:4|max:50',
            'username' => 'string|required|min:4|max:30',
            'email' => 'required|unique:users,email,' . $this->id,
            'document' => 'required|digits_between:8,9',
            'phone' => 'required|digits_between:1,10|numeric',
        ];
    }
}
