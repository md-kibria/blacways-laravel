<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'title',
        'sub_title',
        'image',
        'image_helper',
        'url'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
