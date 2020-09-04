<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AD extends Model
{
    protected $table = 'ads';
    
    protected $fillable = [
        'uid', 'body', 'image'
    ];
    
    public $timestamps = true;
}
