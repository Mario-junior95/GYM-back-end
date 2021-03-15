<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "type";

    protected $fillable = [
        'type'
    ];

    public function shop(){
        return $this->hasMany(Shop::class);
    }
}
