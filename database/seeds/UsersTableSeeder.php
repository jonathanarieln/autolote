<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('users')->insert([
          'user_name' => 'Karolpatriciamartinez',
          'email' => 'karol.martinez.rubio@gmail.com',
          'password' => bcrypt('@endedor'),
          'person_id' => 2,
          'users_type_id' => 2,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
