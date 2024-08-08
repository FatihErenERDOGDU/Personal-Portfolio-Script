<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPage extends Model
{
    protected $table = 'pages';

    protected $fillable = ['title'];
}
