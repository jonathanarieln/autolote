<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('users_types')->insert([
          'user_type_name' => 'vendedor',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
