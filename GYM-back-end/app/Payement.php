<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    protected $table = 'payment';

    protected $fillable = [
        'date' , 'card_number' , 'amount' , 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
