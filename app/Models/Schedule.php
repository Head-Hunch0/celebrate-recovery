<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $table = 'schedule';

    protected $fillable = [
        'day',
        'theme',
        'time',
    ];
    
}
