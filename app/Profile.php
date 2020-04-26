<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

    public function profileImage()
    {
        return "/storage/" . (($this->image) ? $this->image : 'profile/TCtt1VdJSzQakxmGfbFIYSYhVQbYqXQBPfG6i5cP.png');
    }

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'profile_user',
            'profile_id',
            'user_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
