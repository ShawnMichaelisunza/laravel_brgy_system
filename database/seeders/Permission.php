<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\PermissionRegistrar;

class Permission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view clearance',
            'create clearance',
            'edit clearance',
            'delete clearance',

            'view user',
            'create user',
            'edit user',
            'delete user',

            'view announcement',
            'create announcement',
            'edit announcement',
            'delete announcement',

            'view role',
            'create role',
            'edit role',
            'delete role',
        ];

        foreach($permissions as $perm){

            ModelsPermission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }
    }
}
