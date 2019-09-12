<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'user_name' => 'Jonathanarieln',
          'email' => 'jonathan.ariel.nunez@gmail.com',
          'password' => bcrypt('@dministrador'),
          'person_id' => 1,
          'users_type_id' => 1,
      ]);
    }
}
