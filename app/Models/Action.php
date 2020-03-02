<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'title',
        'date_start',
        'date_end',
    ];
}
