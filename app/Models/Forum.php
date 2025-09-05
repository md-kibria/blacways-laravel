<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';

    protected $fillable = [
        'user_id',
        'title',
        'thumbnail',
        'content',
        'views',
        'status',
        'is_approved',
    ];

    public function comments()
    {
        return $this->hasMany(ForumComment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
