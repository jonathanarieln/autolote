<?php

use Illuminate\Database\Seeder;

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
      ]);
    }
}
