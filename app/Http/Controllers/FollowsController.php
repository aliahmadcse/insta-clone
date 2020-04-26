<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $user = User::findOrFail($request->input('userId'));
        return auth()->user()->following()
            ->toggle($user->profile);
    }
}
