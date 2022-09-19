<?php

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAdminDashboard = Module::updateOrCreate(['name' => 'Admin Panel']);

        //Admin dashboard access.
        Permission::updateOrCreate([
           'module_id' =>  $moduleAdminDashboard->id,
            'name' => 'Access dashboard',
            'slug' => 'admin.dashboard'
        ]);


        $moduleRole = Module::updateOrCreate(['name' => 'Role Management']);

        //Role Management .
        Permission::updateOrCreate([
            'module_id' =>  $moduleRole->id,
            'name' => 'Access Role',
            'slug' => 'admin.roles.index'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleRole->id,
            'name' => 'Create Role',
            'slug' => 'admin.roles.create'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleRole->id,
            'name' => 'Edit Role',
            'slug' => 'admin.roles.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleRole->id,
            'name' => 'Delete Role',
            'slug' => 'admin.roles.destroy'
        ]);


        $moduleUser = Module::updateOrCreate(['name' => 'User Management']);

        //Role Management .
        Permission::updateOrCreate([
            'module_id' =>  $moduleUser->id,
            'name' => 'Access User',
            'slug' => 'admin.users.index'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleUser->id,
            'name' => 'Create User',
            'slug' => 'admin.users.create'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleUser->id,
            'name' => 'Edit User',
            'slug' => 'admin.users.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleUser->id,
            'name' => 'Delete User',
            'slug' => 'admin.users.destroy'
        ]);

    }
}
