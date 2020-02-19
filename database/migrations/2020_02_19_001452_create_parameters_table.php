<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration{

  public function up(){
    Schema::create('parameters', function (Blueprint $table) {
      $table->increments('id');
      $table->string('parameter', 16)->nullable(false)->unique();
      $table->string('description', 64)->nullable();
      $table->string('value', 16)->nullable(false);
      $table->integer('insert_user_id')->nullable()->unsigned();
      $table->foreign('insert_user_id')->references('id')->on('users');
      $table->integer('update_user_id')->nullable()->unsigned();
      $table->foreign('update_user_id')->references('id')->on('users');
      $table->timestamps();
    });
  }//end function

  public function down(){
    Schema::dropIfExists('parameters');
  }//end function
}//end class
