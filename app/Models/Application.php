<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'application';
    
    protected $fillable = [
        'name', 'phone', 'line', 'location', 'reason', 'amount', 'contact_time',
    ];
    
    public $timestamps = true;
}
