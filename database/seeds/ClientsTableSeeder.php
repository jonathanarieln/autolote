<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('clients')->insert([
          'is_legal' => true,
          'person_id' => null,
          'legal_id' => 1,
          'RTN'=>'0801-1996-565221',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('clients')->insert([
          'is_legal' => true,
          'person_id' => null,
          'legal_id' => 2,
          'RTN'=>'0801-1993-565221',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('clients')->insert([
          'is_legal' => true,
          'person_id' => null,
          'legal_id' => 3,
          'RTN'=>'0801-1990-565221',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('clients')->insert([
          'is_legal' => false,
          'person_id' => 3,
          'legal_id' => null,
          'RTN'=>'0801-1985-565221',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('clients')->insert([
          'is_legal' => false,
          'person_id' => 4,
          'legal_id' => null,
          'RTN'=>'0801-1998-563421',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      DB::table('clients')->insert([
          'is_legal' => false,
          'person_id' => 5,
          'legal_id' => null,
          'RTN'=>'0801-1992-122221',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
