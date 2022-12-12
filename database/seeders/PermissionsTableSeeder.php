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
                'title' => 'time_management_access',
            ],
            [
                'id'    => 45,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 46,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 47,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 48,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 49,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 50,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 51,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 52,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 53,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 54,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 55,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 56,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 57,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 58,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 59,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 60,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 61,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 62,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 63,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 64,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 65,
                'title' => 'client_management_setting_access',
            ],
            [
                'id'    => 66,
                'title' => 'currency_create',
            ],
            [
                'id'    => 67,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 68,
                'title' => 'currency_show',
            ],
            [
                'id'    => 69,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 70,
                'title' => 'currency_access',
            ],
            [
                'id'    => 71,
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => 72,
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => 73,
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => 74,
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => 75,
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => 76,
                'title' => 'income_source_create',
            ],
            [
                'id'    => 77,
                'title' => 'income_source_edit',
            ],
            [
                'id'    => 78,
                'title' => 'income_source_show',
            ],
            [
                'id'    => 79,
                'title' => 'income_source_delete',
            ],
            [
                'id'    => 80,
                'title' => 'income_source_access',
            ],
            [
                'id'    => 81,
                'title' => 'client_status_create',
            ],
            [
                'id'    => 82,
                'title' => 'client_status_edit',
            ],
            [
                'id'    => 83,
                'title' => 'client_status_show',
            ],
            [
                'id'    => 84,
                'title' => 'client_status_delete',
            ],
            [
                'id'    => 85,
                'title' => 'client_status_access',
            ],
            [
                'id'    => 86,
                'title' => 'project_status_create',
            ],
            [
                'id'    => 87,
                'title' => 'project_status_edit',
            ],
            [
                'id'    => 88,
                'title' => 'project_status_show',
            ],
            [
                'id'    => 89,
                'title' => 'project_status_delete',
            ],
            [
                'id'    => 90,
                'title' => 'project_status_access',
            ],
            [
                'id'    => 91,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 92,
                'title' => 'client_create',
            ],
            [
                'id'    => 93,
                'title' => 'client_edit',
            ],
            [
                'id'    => 94,
                'title' => 'client_show',
            ],
            [
                'id'    => 95,
                'title' => 'client_delete',
            ],
            [
                'id'    => 96,
                'title' => 'client_access',
            ],
            [
                'id'    => 97,
                'title' => 'project_create',
            ],
            [
                'id'    => 98,
                'title' => 'project_edit',
            ],
            [
                'id'    => 99,
                'title' => 'project_show',
            ],
            [
                'id'    => 100,
                'title' => 'project_delete',
            ],
            [
                'id'    => 101,
                'title' => 'project_access',
            ],
            [
                'id'    => 102,
                'title' => 'note_create',
            ],
            [
                'id'    => 103,
                'title' => 'note_edit',
            ],
            [
                'id'    => 104,
                'title' => 'note_show',
            ],
            [
                'id'    => 105,
                'title' => 'note_delete',
            ],
            [
                'id'    => 106,
                'title' => 'note_access',
            ],
            [
                'id'    => 107,
                'title' => 'document_create',
            ],
            [
                'id'    => 108,
                'title' => 'document_edit',
            ],
            [
                'id'    => 109,
                'title' => 'document_show',
            ],
            [
                'id'    => 110,
                'title' => 'document_delete',
            ],
            [
                'id'    => 111,
                'title' => 'document_access',
            ],
            [
                'id'    => 112,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 113,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 114,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 115,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 116,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 117,
                'title' => 'client_report_create',
            ],
            [
                'id'    => 118,
                'title' => 'client_report_edit',
            ],
            [
                'id'    => 119,
                'title' => 'client_report_show',
            ],
            [
                'id'    => 120,
                'title' => 'client_report_delete',
            ],
            [
                'id'    => 121,
                'title' => 'client_report_access',
            ],
            [
                'id'    => 122,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
