<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'computer_access',
            ],
            [
                'id'    => 18,
                'title' => 'real_pc_create',
            ],
            [
                'id'    => 19,
                'title' => 'real_pc_edit',
            ],
            [
                'id'    => 20,
                'title' => 'real_pc_show',
            ],
            [
                'id'    => 21,
                'title' => 'real_pc_delete',
            ],
            [
                'id'    => 22,
                'title' => 'real_pc_access',
            ],
            [
                'id'    => 23,
                'title' => 'remote_pc_create',
            ],
            [
                'id'    => 24,
                'title' => 'remote_pc_edit',
            ],
            [
                'id'    => 25,
                'title' => 'remote_pc_show',
            ],
            [
                'id'    => 26,
                'title' => 'remote_pc_delete',
            ],
            [
                'id'    => 27,
                'title' => 'remote_pc_access',
            ],
            [
                'id'    => 28,
                'title' => 'communication_access',
            ],
            [
                'id'    => 29,
                'title' => 'email_create',
            ],
            [
                'id'    => 30,
                'title' => 'email_edit',
            ],
            [
                'id'    => 31,
                'title' => 'email_show',
            ],
            [
                'id'    => 32,
                'title' => 'email_delete',
            ],
            [
                'id'    => 33,
                'title' => 'email_access',
            ],
            [
                'id'    => 34,
                'title' => 'skype_create',
            ],
            [
                'id'    => 35,
                'title' => 'skype_edit',
            ],
            [
                'id'    => 36,
                'title' => 'skype_show',
            ],
            [
                'id'    => 37,
                'title' => 'skype_delete',
            ],
            [
                'id'    => 38,
                'title' => 'skype_access',
            ],
            [
                'id'    => 39,
                'title' => 'discord_create',
            ],
            [
                'id'    => 40,
                'title' => 'discord_edit',
            ],
            [
                'id'    => 41,
                'title' => 'discord_show',
            ],
            [
                'id'    => 42,
                'title' => 'discord_delete',
            ],
            [
                'id'    => 43,
                'title' => 'discord_access',
            ],
            [
                'id'    => 44,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
