<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LegalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('legals')->insert([
            'legal_name' => 'Banco de Desarrollo',
            'contact_name' => 'Abog. Zacarias Ferreira',
            'contact_phone_number' => '+504 3595-5625',
            'RTN' => '0801-1914-321591',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('legals')->insert([
            'legal_name' => 'Abarroteria de la Ciudad',
            'contact_name' => 'Oficina de Relaciones Exteriores Tegucigalpa',
            'contact_phone_number' => '+504 2222-5625',
            'RTN' => '0801-1920-454645',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('legals')->insert([
            'legal_name' => 'Licorera de la ciudad',
            'contact_name' => 'Jorge Zelaya',
            'contact_phone_number' => '+504 2246-5625',
            'RTN' => '0801-1955-465978',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
