<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
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
            'avatar' => 'required|image|mimes:png,jpg,gif'
        ];
    }

    public function messages()
    {
        return [
            'avatar.requred' => 'Sans image on ne peut pas aller plus loin!',
            'avatar.image' => "Ceci n'est pas une image",
            'avatar.mimes' => "On n'accepte que les images de type PNG, JPG, GIF",
        ];
    }
}
