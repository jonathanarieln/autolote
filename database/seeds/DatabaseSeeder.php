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
         ]);
    }
}
