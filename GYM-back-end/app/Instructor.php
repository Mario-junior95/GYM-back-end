<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructor';

    protected $fillable = [
        'name', 'email' , 'phone' , 'address' , 'image'
    ];

    public function WorkoutPlan(){
        return $this->hasOne(WorkoutPlan::class);
    }
}
