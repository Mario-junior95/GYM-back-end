<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Instructor_Time extends Model
{
    protected $table = "user_instructor_time";

    protected $fillable = [
        'user_id' , 'instructor_id' , 'time_id' , 'date' 
    ];

    public function user(){
        return $this->belongsToMany(User::class ,'user_instructor_time'  , 'instructor_id','time_id','user_id');
    }

    public function instructor(){
        return $this->belongsToMany(Instructor::class , 'user_instructor_time' ,'instructor_id' ,'time_id','user_id' );
    }

    public function time(){
        return $this->belongsToMany(Time::class ,'user_instructor_time' ,'instructor_id' ,'time_id','user_id' );
    }


}
