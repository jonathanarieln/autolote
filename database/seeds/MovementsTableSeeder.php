<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MovementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('movements')->insert([
          'movement_name' => 'Ingreso',
          'car_id' => '1',
          'available' => true,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('movements')->insert([
          'movement_name' => 'Ingreso',
          'car_id' => '2',
          'available' => true,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
