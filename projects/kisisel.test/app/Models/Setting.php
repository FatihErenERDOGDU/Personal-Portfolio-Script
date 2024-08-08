<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_url',
        'twitter_url',
        'linkedin_url',
        'facebook_url',
        'instagram_url',
    ];
}
