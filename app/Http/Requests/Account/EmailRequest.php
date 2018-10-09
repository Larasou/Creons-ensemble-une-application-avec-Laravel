<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
            'email' => 'required|email|confirmed|unique:users,email',
        ];
    }


    public function messages()
    {
        return [
            'email.required' => "Ton adresse email est requise",
            'email.email' => "Ton adresse email n'est pas reconnue comme une adresse email valide",
            'email.confirmed' => "Les adresses emails saisies ne sont pas identiques",
            'email.unique' => "Cette adresse email est déjà utilisée par un autre membre",
        ];
    }
}
