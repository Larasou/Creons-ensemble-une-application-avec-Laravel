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
            'name.required' => "Ton nom d'utilisateur est requis",
            'name.between' => "Ton nom d'utilisateur doit être compris entre 3 et 30 caractères",
            'name.alpha_dash' => "Ton nom d'utilisateur doit être en format alpha-numérique (Ex: jean_Du45)",
            'name.unique' => "Ce nom d'utilisateur est déjà utilisé par un autre membre",
            'email.required' => "Ton adresse email est requise",
            'email.email' => "Ton adresse email n'est pas reconnue comme une adresse email valide",
            'email.confirmed' => "Les adresses emails saisies ne sont pas identiques",
            'email.unique' => "Cette adresse email est déjà utilisée par un autre membre",
            'password.required' => "Vous devez saisir un mot de passe",
            'password.confirmed' => "Les mots de passe saisis ne sont pas identiques",
            'password.min' => "Ton mot de passe doit faire au minimum 6 caracères",
        ];
    }
}
