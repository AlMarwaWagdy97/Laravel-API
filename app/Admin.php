<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    //
    use Notifiable;

    protected $table = 'admins';
    protected $fillable = ['name', 'email', 'password'];

      //////////////////////////////////// add two method ////////////////////////////////////
      public function getJWTIdentifier()
      {
          return $this->getKey();
      }
      public function getJWTCustomClaims()
      {
          return [];
      }
      ////////////////////////////////////////////////////////////////////////////////////////
}
