<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;    
use Tymon\JWTAuth\Contracts\JWTSubject;

class Instructor extends Authenticatable implements JWTSubject
{
  use Notifiable;

  protected $table = 'instructor';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email' , 'phone' , 'address' , 'image' , 'description' , 'price' , 'username' , 'password'
];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];


  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];
/**
   * The attributes that should be JWT Identifier.
   *
   * @var array
   */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    /**
   * The attributes that should be getJWTCustomClaims.
   *
   * @var array
   */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    /**
   * The attributes that should be setPasswordAttribute.
   *
   * @var $password
   */
    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }    

    public function WorkoutPlan(){
        return $this->hasOne(WorkoutPlan::class);
    }

    public function instructorUser(){
        return $this->belongsToMany(User::class ,'user_instructor_time' , 'instructor_id' , 'user_id' );
    }

    public function time(){
        return $this->belongsToMany(Time::class ,'user_instructor_time' , 'instructor_id' , 'user_id' );
    }

    public function dates(){
        return $this->hasMany(User_Instructor_Time::class, 'instructor_id');
    }
    
  }



