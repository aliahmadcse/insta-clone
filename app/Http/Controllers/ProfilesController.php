<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * finds a single user in User Model
     *
     * @param User $user
     * @return void
     */
    public function index(User $user)
    {
        // $user = User::find($user);
        return view('home', [
            'user' => $user,
        ]);
    }
}
