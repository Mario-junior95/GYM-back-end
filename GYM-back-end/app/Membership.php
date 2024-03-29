<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';

    protected $fillable = [
        'name' , 'amount' , 'date' , 'benefits'
    ];

    public function user(){
        return $this->belongsTo(User::class , 'id');
    }
}
