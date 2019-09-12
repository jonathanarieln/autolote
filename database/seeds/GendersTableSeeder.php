<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('genders')->insert([
          'gender_name' => 'masculino',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('genders')->insert([
          'gender_name' => 'femenino',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('genders')->insert([
          'gender_name' => 'indefinido',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
