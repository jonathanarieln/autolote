<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cars')->insert([
          'plate' => 'BAF2421',
          'engine' => 'ZS162FMJ *5J151880*',
          'chassis' => 'LNMPCKL3CJ11010393',
          'year' => '2015',
          'available'=>true,
          'price' => 340800.00,
          'color_id' => 1,
          'brand_id' => 1,
          'modelo_id' => 1,
          'car_type_id' => 2,
          'location_id' => 1,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('cars')->insert([
          'plate' => 'BAF2422',
          'engine' => 'ZT142FMJ *5K551770*',
          'chassis' => 'LPMPCKL3CJ11015393',
          'year' => '2015',
          'available'=>true,
          'price' => 340800.00,
          'color_id' => 1,
          'brand_id' => 1,
          'modelo_id' => 1,
          'car_type_id' => 2,
          'location_id' => 2,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
