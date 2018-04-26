<?php

namespace App\Http\Requests;

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
            'name' => 'required|between:3,30|alpha_dash|unique:users,name',
            'email' => 'required|email|confirmed|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Tu dois renseigner ton nom d'utilisateur",
            'name.between' => "Le nom d'utilisateur doit faire entre 3 et 30 caractères",
            'name.alpha_dash' => "Le nom d'utilisateur doit entre des lettres et des chiifres",
            'name.unique' => "Ce nom d'utilisateur est déjà pris",
            'email.required' => "Tu dois renseigner ton email",
            'email.email' => "Ceci n'est pas une adresse mail",
            'email.confirmed' => "Les deux adresses mail ne se correspondent pas",
            'email.unique' => "Cette adresse mail est déjà prise",
            'password.required' => "Tu dois renseigner ton mot de passe",
            'password.min' => "Ton mot de passe doit faire au minimum 3 caractères",
            'password.confirmed' => "Les deux mot de passe ne se correspondent pas",
        ];
    }
}
