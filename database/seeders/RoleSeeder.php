<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() == 0) {
            $roles = config()->get('role.seeder.list');
            $permissions = config()->get('permission.seeder.role.user');

            if (empty($roles)) {
                throw new \Exception('Error: config/role.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
            }

            foreach ($roles as $role) {
                if (config()->has('permission.seeder.role.' . $role)) {
                    $permissions = config()->get('permission.seeder.role.' . $role);
                }

                Role::create([
                    'name' => $role
                ])->syncPermissions($permissions);
            }
        }
    }
}
