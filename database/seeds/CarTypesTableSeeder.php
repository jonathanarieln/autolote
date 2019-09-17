<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('car_types')->insert([
          'car_type_name' => 'Trabajo',
          'base_price'=>1500.00,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('car_types')->insert([
          'car_type_name' => 'Turismo',
          'base_price'=>1000.00,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('car_types')->insert([
          'car_type_name' => 'Lujo',
          'base_price'=>2000.00,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
