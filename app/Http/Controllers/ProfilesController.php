<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        // $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image'
        ]);

        if (isset($data['image']) && $data['image']) {
            $imagePath = $data['image']->store('profile', 'public');

            $image = Image::make(public_path('storage/' . $imagePath))
                ->fit(1000, 1000);
            $image->save();
            $data = array_merge($data, ['image' => $imagePath]);
        }

        auth()->user()->profile->update($data);
        return redirect()->route('profile.show', auth()->user()->id);
    }
}
