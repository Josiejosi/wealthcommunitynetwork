<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $dates = [ 'matures_at', 'expires_at', ] ;
	
    protected $fillable = [

        'status', //0 = not allocated, 1 = allocated, 2 = reserved for payment, 3 = payment received.
        'amount', 
        'user_id', 
        'sender_id', 
        'matures_at', 
        'expires_at',
        
    ];

    public function user() {

        return $this->belongsTo( User::class ) ;
        
    }
}
