<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
protected $table = "shop";

protected $fillable = [
    'name' , 'image' , 'amount' , 'type' , 'user_id'
];

function user(){
    return $this->belongsTo(User::class);
}

}
