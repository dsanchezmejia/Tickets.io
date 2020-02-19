<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;



    protected $fillable = [
        'name','lastname','username', 'email', 'password', 'api_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function parameter_insert_user_id(){
          return $this->hasMany('App\Parameter', 'insert_user_id', 'id');
        }//end if
        public function parameter_update_user_id(){
          return $this->hasMany('App\Parameter', 'update_user_id', 'id');
        }//end if

}//end class
