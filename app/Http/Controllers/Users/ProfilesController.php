<?php

namespace App\Http\Controllers\Users;

use App\Activity;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('users.profile', [
            'user' => $user,
            'activities' => Activity::with('subject')
                ->where('user_id', $user->id)
                ->latest()->take(25)
                ->get()
                ->groupBy(function ($activity) {
                    return $activity->created_at->formatLocalized('%B %G');
                })
        ]);
    }
}
