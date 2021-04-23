<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsusers extends Model
{
    public $table = 'gsusers';
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'user_code',
        'created_at',
        'updated_at',
         ];
}
