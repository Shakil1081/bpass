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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'team_create',
            ],
            [
                'id'    => 20,
                'title' => 'team_edit',
            ],
            [
                'id'    => 21,
                'title' => 'team_show',
            ],
            [
                'id'    => 22,
                'title' => 'team_delete',
            ],
            [
                'id'    => 23,
                'title' => 'team_access',
            ],
            [
                'id'    => 24,
                'title' => 'finance_bank_create',
            ],
            [
                'id'    => 25,
                'title' => 'finance_bank_edit',
            ],
            [
                'id'    => 26,
                'title' => 'finance_bank_show',
            ],
            [
                'id'    => 27,
                'title' => 'finance_bank_delete',
            ],
            [
                'id'    => 28,
                'title' => 'finance_bank_access',
            ],
            [
                'id'    => 29,
                'title' => 'organization_create',
            ],
            [
                'id'    => 30,
                'title' => 'organization_edit',
            ],
            [
                'id'    => 31,
                'title' => 'organization_show',
            ],
            [
                'id'    => 32,
                'title' => 'organization_delete',
            ],
            [
                'id'    => 33,
                'title' => 'organization_access',
            ],
            [
                'id'    => 34,
                'title' => 'party_group_create',
            ],
            [
                'id'    => 35,
                'title' => 'party_group_edit',
            ],
            [
                'id'    => 36,
                'title' => 'party_group_show',
            ],
            [
                'id'    => 37,
                'title' => 'party_group_delete',
            ],
            [
                'id'    => 38,
                'title' => 'party_group_access',
            ],
            [
                'id'    => 39,
                'title' => 'party_group_bd_create',
            ],
            [
                'id'    => 40,
                'title' => 'party_group_bd_edit',
            ],
            [
                'id'    => 41,
                'title' => 'party_group_bd_show',
            ],
            [
                'id'    => 42,
                'title' => 'party_group_bd_delete',
            ],
            [
                'id'    => 43,
                'title' => 'party_group_bd_access',
            ],
            [
                'id'    => 44,
                'title' => 'party_table_create',
            ],
            [
                'id'    => 45,
                'title' => 'party_table_edit',
            ],
            [
                'id'    => 46,
                'title' => 'party_table_show',
            ],
            [
                'id'    => 47,
                'title' => 'party_table_delete',
            ],
            [
                'id'    => 48,
                'title' => 'party_table_access',
            ],
            [
                'id'    => 49,
                'title' => 'department_create',
            ],
            [
                'id'    => 50,
                'title' => 'department_edit',
            ],
            [
                'id'    => 51,
                'title' => 'department_show',
            ],
            [
                'id'    => 52,
                'title' => 'department_delete',
            ],
            [
                'id'    => 53,
                'title' => 'department_access',
            ],
            [
                'id'    => 54,
                'title' => 'non_purchase_order_create',
            ],
            [
                'id'    => 55,
                'title' => 'non_purchase_order_edit',
            ],
            [
                'id'    => 56,
                'title' => 'non_purchase_order_show',
            ],
            [
                'id'    => 57,
                'title' => 'non_purchase_order_delete',
            ],
            [
                'id'    => 58,
                'title' => 'non_purchase_order_access',
            ],
            [
                'id'    => 59,
                'title' => 'purchase_order_create',
            ],
            [
                'id'    => 60,
                'title' => 'purchase_order_edit',
            ],
            [
                'id'    => 61,
                'title' => 'purchase_order_show',
            ],
            [
                'id'    => 62,
                'title' => 'purchase_order_delete',
            ],
            [
                'id'    => 63,
                'title' => 'purchase_order_access',
            ],
            [
                'id'    => 64,
                'title' => 'requisition_create',
            ],
            [
                'id'    => 65,
                'title' => 'requisition_edit',
            ],
            [
                'id'    => 66,
                'title' => 'requisition_show',
            ],
            [
                'id'    => 67,
                'title' => 'requisition_delete',
            ],
            [
                'id'    => 68,
                'title' => 'requisition_access',
            ],
            [
                'id'    => 69,
                'title' => 'term_condition_create',
            ],
            [
                'id'    => 70,
                'title' => 'term_condition_edit',
            ],
            [
                'id'    => 71,
                'title' => 'term_condition_show',
            ],
            [
                'id'    => 72,
                'title' => 'term_condition_delete',
            ],
            [
                'id'    => 73,
                'title' => 'term_condition_access',
            ],
            [
                'id'    => 74,
                'title' => 'budget_create',
            ],
            [
                'id'    => 75,
                'title' => 'budget_edit',
            ],
            [
                'id'    => 76,
                'title' => 'budget_show',
            ],
            [
                'id'    => 77,
                'title' => 'budget_delete',
            ],
            [
                'id'    => 78,
                'title' => 'budget_access',
            ],
            [
                'id'    => 79,
                'title' => 'expense_type_create',
            ],
            [
                'id'    => 80,
                'title' => 'expense_type_edit',
            ],
            [
                'id'    => 81,
                'title' => 'expense_type_show',
            ],
            [
                'id'    => 82,
                'title' => 'expense_type_delete',
            ],
            [
                'id'    => 83,
                'title' => 'expense_type_access',
            ],
            [
                'id'    => 84,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 85,
                'title' => 'bank_account_show',
            ],
            [
                'id'    => 86,
                'title' => 'bank_account_edit',
            ],
            [
                'id'    => 87,
                'title' => 'bank_account_delete',
            ],
            [
                'id'    => 88,
                'title' => 'bank_account_create',
            ],
            [
                'id'    => 89,
                'title' => 'bank_account_access',
            ],
            [
                'id'    => 90,
                'title' => 'cheques_show',
            ],
            [
                'id'    => 91,
                'title' => 'cheques_edit',
            ],
            [
                'id'    => 92,
                'title' => 'cheques_delete',
            ],
            [
                'id'    => 93,
                'title' => 'cheques_create',
            ],
            [
                'id'    => 94,
                'title' => 'cheques_access',
            ],
            [
                'id'    => 95,
                'title' => 'products_access',
            ],
            [
                'id'    => 96,
                'title' => 'products_create',
            ],
            [
                'id'    => 97,
                'title' => 'products_delete',
            ],
            [
                'id'    => 98,
                'title' => 'products_edit',
            ],
            [
                'id'    => 99,
                'title' => 'products_show',
            ],
            [
                'id'    => 100,
                'title' => 'documents_access',
            ],
            [
                'id'    => 101,
                'title' => 'documents_create',
            ],
            [
                'id'    => 102,
                'title' => 'documents_delete',
            ],
            [
                'id'    => 103,
                'title' => 'documents_edit',
            ],
            [
                'id'    => 104,
                'title' => 'documents_show',
            ],
            [
                'id'    => 105,
                'title' => 'budget_details_access',
            ],
            [
                'id'    => 106,
                'title' => 'budget_details_create',
            ],
            [
                'id'    => 107,
                'title' => 'budget_details_delete',
            ],
            [
                'id'    => 108,
                'title' => 'budget_details_edit',
            ],
            [
                'id'    => 109,
                'title' => 'budget_details_show',
            ],
            [
                'id'    => 110,
                'title' => 'party_bills_access',
            ],
            [
                'id'    => 111,
                'title' => 'party_bills_create',
            ],
            [
                'id'    => 112,
                'title' => 'party_bills_delete',
            ],
            [
                'id'    => 113,
                'title' => 'party_bills_edit',
            ],
            [
                'id'    => 114,
                'title' => 'party_bills_show',
            ],
            [
                'id'    => 115,
                'title' => 'disbursements_access',
            ],
            [
                'id'    => 116,
                'title' => 'disbursements_create',
            ],
            [
                'id'    => 117,
                'title' => 'disbursements_delete',
            ],
            [
                'id'    => 118,
                'title' => 'disbursements_edit',
            ],
            [
                'id'    => 119,
                'title' => 'disbursements_show',
            ],
            [
                'id'    => 120,
                'title' => 'bar_codes_access',
            ],
            [
                'id'    => 121,
                'title' => 'bar_codes_create',
            ],
            [
                'id'    => 122,
                'title' => 'bar_codes_delete',
            ],
            [
                'id'    => 123,
                'title' => 'bar_codes_edit',
            ],
            [
                'id'    => 124,
                'title' => 'bar_codes_show',
            ],
        ];

        Permission::insert($permissions);
    }
}
