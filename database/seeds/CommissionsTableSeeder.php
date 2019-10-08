<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('commissions')->insert([
          'value' => 0,
          'commission' => 5,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('commissions')->insert([
          'value' => 10000,
          'commission' => 10,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('commissions')->insert([
          'value' => 20000,
          'commission' => 15,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('commissions')->insert([
          'value' => 30000,
          'commission' => 20,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
