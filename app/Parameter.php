<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model{
    protected $guarded = ['id'];

    protected $fillable = [
         'parameter', 'description', 'value', 'insert_user_id', 'update_user_id'
    ];

    public function insert_user_id(){
      return $this->hasOne('App\User', 'id', 'insert_user_id');
    }//end if
    public function update_user_id(){
      return $this->hasOne('App\User', 'id', 'update_user_id');
    }//end if
}//end function
