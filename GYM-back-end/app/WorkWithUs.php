<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkWithUs extends Model
{
    protected $table = 'workwithus';

    protected $fillable = [
        'email' , 'description' , 'image'
    ];
}
