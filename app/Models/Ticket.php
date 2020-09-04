<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';
    
    protected $fillable = [
        'email' ,'location', 'buy_month', 'price', 'expiry', 'checkin', 'uid'
    ];
    
    public $timestamps = true;
}
