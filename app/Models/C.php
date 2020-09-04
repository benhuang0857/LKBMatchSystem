<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class C extends Model
{
    protected $table = 'c';
    
    protected $fillable = [
        'email'
    ];
    
    public $timestamps = true;
}
