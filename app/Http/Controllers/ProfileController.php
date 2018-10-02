<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getuser(User $user){
        return view('user.profile')
            ->withUser($user)
            ->with('gettotalofcompledlessons',$user->gettotalofcompledlessons())
            ->with('seriesbeingwatched',$user->seriesbeingwatched());
    }
}
