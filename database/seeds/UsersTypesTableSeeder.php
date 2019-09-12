<?php

use Illuminate\Database\Seeder;

class UsersTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users_types')->insert([
          'user_type_name' => 'administrador',
      ]);
      DB::table('users_types')->insert([
          'user_type_name' => 'vendedor',
      ]);
    }
}
