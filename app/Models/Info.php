<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'logo',
        'footer_logo',
        'favicon',
        'description',
        'email',
        'phone',
        'address',
        'ad',
        'ad_visibility',
        'nl_vid',
        'street_address',
        'suite',
        'city',
        'state',
        'zip',
        'country',
    ];
}
