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
          'phone_number' => '+504 3237-3892',
          'gender_id' => 1,
          'identification_number' => '0801-1996-10627',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('people')->insert([
          'first_name' => 'Karol Patricia',
          'surname' => 'Martinez Rubio',
          'birthdate' => date('Y-m-d', strtotime('1996-10-22')),
          'phone_number' => '+504 9547-8823',
          'gender_id' => 2,
          'identification_number' => '0708-1997-00155',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('people')->insert([
          'first_name' => 'Kelvin Francisco',
          'surname' => 'Moncada Funes',
          'birthdate' => date('Y-m-d', strtotime('1992-06-30')),
          'phone_number' => '+504 8918-0678',
          'gender_id' => 1,
          'identification_number' => '0801-1994-45125',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('people')->insert([
          'first_name' => 'Cristobal',
          'surname' => 'Rodrigues Banegas',
          'birthdate' => date('Y-m-d', strtotime('1996-05-18')),
          'phone_number' => '+504 9698-4901',
          'gender_id' => 1,
          'identification_number' => '0708-1995-72845',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('people')->insert([
          'first_name' => 'Dennis Alexis',
          'surname' => 'Chavarria',
          'birthdate' => date('Y-m-d', strtotime('1994-08-12')),
          'phone_number' => '+504 8888-8823',
          'gender_id' => 1,
          'identification_number' => '0801-1997-00155',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

    }
}
