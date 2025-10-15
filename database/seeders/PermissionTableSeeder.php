<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder

{

    /**
     * Run the database seeds.
     * @return void
     */

    public function run()
    {
        $permissions = [
            'Role' => ['role-create', 'role-read', 'role-update', 'role-delete'],
            'Permission' => ['permission-create', 'permission-read', 'permission-update', 'permission-delete'],
            'User' => ['user-create', 'user-read', 'user-update', 'user-delete'],
            'Biodata' => ['biodata-create', 'biodata-pending', 'biodata-approved', 'biodata-married', 'biodata-suspected', 'biodata-delete', 'biodata-incomplete'],
            'Dashboard' => ['dashboard-read'],
            'Packages' => ['packages-create', 'packages-read', 'package-update', 'packages-delete'],
            'Settings' => ['settings-create', 'settings-read', 'settings-update', 'settings-delete'],
            'Transactions' => ['transactions-read'],
            'Contact Form' => ['contact_form-read'],
            'Biodata Reports' => ['biodata_report-read'],
        ];
        foreach ($permissions as $key => $permissionList) {
            foreach ($permissionList as $permission) {
                Permission::firstOrCreate(
                    ['name' => $permission],
                    [
                        'name' => $permission,
                        'guard_name' => 'admin',
                        'group_name' => $key,
                        'deletable' => '0'
                    ]
                );
            }
        }
    }
}
