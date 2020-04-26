<?php

namespace App\Http\Controllers;

use app\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(Request $request)
    {
        return $request->input('userId');
    }
}
