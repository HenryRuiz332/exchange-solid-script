<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin' , 'guard_name' => 'api']);
        $role = Role::create(['name' => 'Common', 'guard_name' => 'api']);
        $role = Role::create(['name' => 'Medium', 'guard_name' => 'api']);
        $role = Role::create(['name' => 'Vip', 'guard_name' => 'api']);
        $role = Role::create(['name' => 'Guest', 'guard_name' => 'api']);
    }
}
