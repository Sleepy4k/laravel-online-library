<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Permission::count() == 0) {
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            $permissions = config()->get('permission.seeder.list');

            if (empty($permissions)) {
                throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
            }

            $permission = collect($permissions)->map(function ($name) {
                return [
                    'name' => $name,
                    'guard_name' => 'web'
                ];
            });

            Permission::insert($permission->toArray());
        }
    }
}
