<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ModelosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('modelos')->insert([
          'model_name' => 'Corolla',
          'brand_id' => '1',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('modelos')->insert([
          'model_name' => 'Hilux',
          'brand_id' => '1',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('modelos')->insert([
          'model_name' => 'CRV',
          'brand_id' => '2',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('modelos')->insert([
          'model_name' => 'Civic',
          'brand_id' => '2',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('modelos')->insert([
          'model_name' => 'Eclipse',
          'brand_id' => '3',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('modelos')->insert([
          'model_name' => 'Montero',
          'brand_id' => '3',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('modelos')->insert([
          'model_name' => 'Elantra',
          'brand_id' => '4',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
