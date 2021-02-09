<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create role

        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        // Permission list as array

        $permissions = [

            // Dashboard Permission

            'dashboard.view',

            // Blog Permission

            'blog.index',
            'blog.create',
            'blog.show',
            'blog.edit',
            'blog.update',
            'blog.delete',

            // Admin Permission

            'admin.index',
            'admin.create',
            'admin.show',
            'admin.edit',
            'admin.update',
            'admin.delete',

            // Role Permission

            'role.index',
            'role.create',
            'role.show',
            'role.edit',
            'role.update',
            'role.delete',

            // Profile Permission

            'profile.index',
            'profile.create'

        ];

        // Create and Assign permission

        for ($i = 0; $i < count($permissions); $i++) {
            // Create permission
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
}
