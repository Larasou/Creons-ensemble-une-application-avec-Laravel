<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UsernameRequest extends FormRequest
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
            'name' => 'required|between:3,30|alpha_dash|unique:users,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Ton nom d'utilisateur est requis",
            'name.between' => "Ton nom d'utilisateur doit être compris entre 3 et 30 caractères",
            'name.alpha_dash' => "Ton nom d'utilisateur doit être en format alpha-numérique (Ex: jean_Du45)",
            'name.unique' => "Ce nom d'utilisateur est déjà utilisé par un autre membre",
        ];
    }
}
