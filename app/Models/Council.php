<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    protected $fillable = ['name', 'image', 'position', 'about'];
}
