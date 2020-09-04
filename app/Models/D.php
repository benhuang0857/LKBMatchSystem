<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class D extends Model
{
    protected $table = 'd';
    
    protected $fillable = [
        'email'
    ];
    
    public $timestamps = true;
}
