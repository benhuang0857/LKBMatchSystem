<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'adpages';
    
    protected $fillable = [
        'id' ,'uid', 'route', 'title', 'body', 'cover_image', 'logo_image'
    ];
    
    public $timestamps = true;
}
