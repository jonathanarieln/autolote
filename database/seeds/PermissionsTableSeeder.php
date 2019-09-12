<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list
        Permission::create(['name' => 'admin']);
        Permission::create(['name' => 'vendedor']);

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo([
            'admin',
            'vendedor'
        ]);
        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());

        //Guest
        $guest = Role::create(['name' => 'Vendedor']);

        $guest->givePermissionTo([
            'vendedor'
        ]);

        //User Admin
        $user = User::find(1); //Jonathan Ariel Nuñez
        $user->assignRole('Admin');

        //User Vendedor
        $user = User::find(2); //Karol Patricia Martinez Rubio
        $user->assignRole('Vendedor');
    }
}
