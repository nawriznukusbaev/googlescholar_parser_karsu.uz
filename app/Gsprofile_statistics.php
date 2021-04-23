<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsprofile_statistics extends Model
{
    public $table = 'gsprofile_statistics';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'fullname',
        'citations',
        'hIndex',
        'i10Index',
        'created_at',
        'updated_at',
         ];
}
