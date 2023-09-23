<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = [33, 34, 35, 36, 38, 39, 40, 41, 43, 46, 48, 49, 50, 51, 53, 54, 59, 63, 66, 70, 71, 86, 89, 100, 101, 102, 104, 105, 108, 110, 111, 112];
        // $admin_permissions->filter(function ($permission) {
        //     return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        // });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
