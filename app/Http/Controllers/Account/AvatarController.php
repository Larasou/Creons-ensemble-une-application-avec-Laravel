<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\AvatarRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvatarController extends Controller
{
    public function show()
    {
        return view('account.avatar', [
            'user' => auth()->user(),
        ]);
    }

    public function store(User $user, AvatarRequest $request)
    {
        // Récuperer l'image
        $avatar = $request->file('avatar');

        // Lui donner un nom
        $name = $user->name . $avatar->getExtension();

        // Déplacer dans dossier puclic
        $avatar->move(public_path('uploads/avatars'), $name);

        // Sauvegarder dans la base de donnée
        $user->update(['avatar' => "/uploads/avatars/{$name}"]);

        // Retourner l'image!
        return back()->with('flash', "Avatar mise à jour avec succès!");
    }
}
