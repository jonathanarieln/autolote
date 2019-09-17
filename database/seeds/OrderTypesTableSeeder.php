<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('order_types')->insert([
          'order_type_name' => 'Ingreso',
          'available' => true,
          'positive'=>false,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
