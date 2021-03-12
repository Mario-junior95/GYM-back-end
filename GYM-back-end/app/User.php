<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
  use Notifiable;
  
  protected $table="user";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'firstname' , 'lastname' , 'email' , 'phone' , 'address' , 'date' , 'gender' , 'password' , 'membership_id'  ,'instructor_id' , 'time_id'
  ];

  //7oton bi fillable in case bedak terja3 testa3ml el many to many 'instructor_id' , 'time_id'

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

    public function membership(){
        return $this->hasMany(Membership::class , 'id' , 'membership_id');
    }

    public function payement(){
        return $this->hasMany(Payement::class);
    }

    public function WorkPlan(){
        return $this->hasOne(WorkPlan::class);
    }

   
    public function userInstructor(){
        return $this->belongsToMany(Instructor::class ,'user_instructor_time' , 'user_id' , 'instructor_id');
    }

    public function userTime(){
        return $this->belongsToMany(Time::class ,'user_instructor_time' , 'user_id' , 'time_id');
    }



  }