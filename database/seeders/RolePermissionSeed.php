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

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],

            [
                'group_name' => 'Blog',
                'permissions' => [
                    // Blog Permission

                    'blog.index',
                    'blog.create',
                    'blog.show',
                    'blog.edit',
                    'blog.update',
                    'blog.delete',
                ]
            ],

            [
                'group_name' => 'admin',
                'permissions' => [
                    // Admin Permission

                    'admin.index',
                    'admin.create',
                    'admin.show',
                    'admin.edit',
                    'admin.update',
                    'admin.delete',
                ]
            ],


            [
                'group_name' => 'role',
                'permissions' => [
                    // Role Permission

                    'role.index',
                    'role.create',
                    'role.show',
                    'role.edit',
                    'role.update',
                    'role.delete',
                ]
            ],


            [
                'group_name' => 'profile',
                'permissions' => [
                    // Profile Permission

                    'profile.index',
                    'profile.create'
                ]
            ],



        ];

        // Create and Assign permission

        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
