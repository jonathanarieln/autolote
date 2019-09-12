<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('people')->insert([
          'first_name' => 'Jonathan Ariel',
          'surname' => 'Nuñez',
          'birthdate' => date('Y-m-d', strtotime('1995-06-26')),
          'gender_id' => 1,
          'identification_number' => '0801-1996-10627',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('people')->insert([
          'first_name' => 'Karol Patricia',
          'surname' => 'Martinez Rubio',
          'birthdate' => date('Y-m-d', strtotime('1996-10-22')),
          'gender_id' => 2,
          'identification_number' => '0708-1997-00155',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

    }
}
