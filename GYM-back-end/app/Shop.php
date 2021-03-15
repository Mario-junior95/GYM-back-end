<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
protected $table = "shop";

protected $fillable = [
    'name' , 'image' , 'amount' , 'type'
];


// public function type(){
//     return $this->belongsTo(Type::class);
// }

}
