<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class B extends Model
{
    protected $table = 'b';
    
    protected $fillable = [
        'email'
    ];
    
    public $timestamps = true;
}
