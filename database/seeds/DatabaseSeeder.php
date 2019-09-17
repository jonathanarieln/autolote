<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
           GendersTableSeeder::class,
           PeopleTableSeeder::class,
           UsersTableSeeder::class,
           PermissionsTableSeeder::class,
           LegalsTableSeeder::class,
           ClientsTableSeeder::class,
           ColorsTableSeeder::class,
           BrandsTableSeeder::class,
           ModelosTableSeeder::class,
           LocationsTableSeeder::class,
           CarTypesTableSeeder::class,
           CarsTableSeeder::class,
           MovementsTableSeeder::class,
           OrderTypesTableSeeder::class,
           OrdersTableSeeder::class,
           CarOrderTableSeeder::class,
         ]);
    }
}
