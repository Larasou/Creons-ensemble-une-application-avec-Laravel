<?php

namespace App\Http\Controllers\Users;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('users.profile', [
            'user'=> $user,
        ]);
    }
}
