<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = "time";

    protected $fillable = [
        'start' , 'end'
    ];

    public function instructor(){
        return $this->belongsToMany(Instructor::class ,'user_instructor_time' , 'instructor_id' , 'user_id' );
    }
}
