<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'caption', 'image'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
