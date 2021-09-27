<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $Super_admin = Role::create(['name' => 'super admin']);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $dosen = Role::create(['name' => 'dosen']);

        $Super_admin->givePermissionTo('add','edit','delete','view');
        $admin->givePermissionTo('add','edit','delete','view');
        $user->givePermissionTo('view');
        $dosen->givePermissionTo('add','edit','delete','view');
        
    }
}
