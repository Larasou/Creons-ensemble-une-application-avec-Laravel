<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => "Vous devez saisir un mot de passe",
            'password.confirmed' => "Les mots de passe saisis ne sont pas identiques",
            'password.min' => "Ton mot de passe doit faire au minimum 6 caracères",
        ];
    }
}
