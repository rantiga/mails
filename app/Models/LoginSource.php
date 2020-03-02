<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginSource extends Model
{
    protected $table = 'login_source';

    protected $fillable = [
        'user_id',
        'tms',
        'source',
    ];
}
