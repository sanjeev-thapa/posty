<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:4|max:255',
            'username' => 'required|alpha_dash|unique:users,username|min:4|max:255',
            'email' => 'required|email|unique:users,email|min:5|max:255',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ];
    }
}
