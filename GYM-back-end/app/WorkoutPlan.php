<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    protected $table = 'workplan';

    protected $fillable = [
        'date' , 'time' , 'user_id' , 'workout_id' , 'instructor_id'
    ];
    
    public function Workout(){
        return $this->hasMany(Workout::class ,'id' );
    }
    
    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function Instructor(){
        return $this->belongsTo(Instructor::class , 'instructor_id');
    }
}
