<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'superadmin', 'guard_name' => 'admin', "id"=>1]);
        Role::create(['name' => 'user', 'guard_name' => 'admin', "id"=>11]);
    }
}
