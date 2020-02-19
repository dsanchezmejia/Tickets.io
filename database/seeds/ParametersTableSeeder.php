<?php

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder{

  public function run(){
    DB::table('parameters')->insert([
      'parameter' => 'pagination_index',
      'description' => 'Number of rows per page in index view',
      'value' => '15',
      'insert_user_id' => 1,
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }//end function
}//end class
