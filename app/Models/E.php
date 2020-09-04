<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class E extends Model
{
    protected $table = 'e';
    
    protected $fillable = [
        'email'
    ];
    
    public $timestamps = true;
}
