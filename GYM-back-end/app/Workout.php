<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $table = 'workout';

    protected $fillable = [
        'name' , 'description'
    ];

    public function workPlan(){
        return $this->belongsTo(workoutPlan::class , 'id');
    }
}
