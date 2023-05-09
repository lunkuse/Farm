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
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'stock_record_access',
            ],
            [
                'id'    => 21,
                'title' => 'gender_create',
            ],
            [
                'id'    => 22,
                'title' => 'gender_edit',
            ],
            [
                'id'    => 23,
                'title' => 'gender_show',
            ],
            [
                'id'    => 24,
                'title' => 'gender_delete',
            ],
            [
                'id'    => 25,
                'title' => 'gender_access',
            ],
            [
                'id'    => 26,
                'title' => 'breed_create',
            ],
            [
                'id'    => 27,
                'title' => 'breed_edit',
            ],
            [
                'id'    => 28,
                'title' => 'breed_show',
            ],
            [
                'id'    => 29,
                'title' => 'breed_delete',
            ],
            [
                'id'    => 30,
                'title' => 'breed_access',
            ],
            [
                'id'    => 31,
                'title' => 'color_create',
            ],
            [
                'id'    => 32,
                'title' => 'color_edit',
            ],
            [
                'id'    => 33,
                'title' => 'color_show',
            ],
            [
                'id'    => 34,
                'title' => 'color_delete',
            ],
            [
                'id'    => 35,
                'title' => 'color_access',
            ],
            [
                'id'    => 36,
                'title' => 'shelter_create',
            ],
            [
                'id'    => 37,
                'title' => 'shelter_edit',
            ],
            [
                'id'    => 38,
                'title' => 'shelter_show',
            ],
            [
                'id'    => 39,
                'title' => 'shelter_delete',
            ],
            [
                'id'    => 40,
                'title' => 'shelter_access',
            ],
            [
                'id'    => 41,
                'title' => 'source_create',
            ],
            [
                'id'    => 42,
                'title' => 'source_edit',
            ],
            [
                'id'    => 43,
                'title' => 'source_show',
            ],
            [
                'id'    => 44,
                'title' => 'source_delete',
            ],
            [
                'id'    => 45,
                'title' => 'source_access',
            ],
            [
                'id'    => 46,
                'title' => 'general_stock_record_create',
            ],
            [
                'id'    => 47,
                'title' => 'general_stock_record_edit',
            ],
            [
                'id'    => 48,
                'title' => 'general_stock_record_show',
            ],
            [
                'id'    => 49,
                'title' => 'general_stock_record_delete',
            ],
            [
                'id'    => 50,
                'title' => 'general_stock_record_access',
            ],
            [
                'id'    => 51,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 52,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 53,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 54,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 55,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 56,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 57,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 58,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 59,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 60,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 61,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 62,
                'title' => 'task_create',
            ],
            [
                'id'    => 63,
                'title' => 'task_edit',
            ],
            [
                'id'    => 64,
                'title' => 'task_show',
            ],
            [
                'id'    => 65,
                'title' => 'task_delete',
            ],
            [
                'id'    => 66,
                'title' => 'task_access',
            ],
            [
                'id'    => 67,
                'title' => 'task_calendar_access',
            ],
            [
                'id'    => 68,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 69,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 70,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 71,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 72,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 73,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 74,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 75,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 76,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 77,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 78,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 79,
                'title' => 'health_record_access',
            ],
            [
                'id'    => 80,
                'title' => 'clinical_history_create',
            ],
            [
                'id'    => 81,
                'title' => 'clinical_history_edit',
            ],
            [
                'id'    => 82,
                'title' => 'clinical_history_show',
            ],
            [
                'id'    => 83,
                'title' => 'clinical_history_delete',
            ],
            [
                'id'    => 84,
                'title' => 'clinical_history_access',
            ],
            [
                'id'    => 85,
                'title' => 'current_diagnosi_create',
            ],
            [
                'id'    => 86,
                'title' => 'current_diagnosi_edit',
            ],
            [
                'id'    => 87,
                'title' => 'current_diagnosi_show',
            ],
            [
                'id'    => 88,
                'title' => 'current_diagnosi_delete',
            ],
            [
                'id'    => 89,
                'title' => 'current_diagnosi_access',
            ],
            [
                'id'    => 90,
                'title' => 'treatment_administered_create',
            ],
            [
                'id'    => 91,
                'title' => 'treatment_administered_edit',
            ],
            [
                'id'    => 92,
                'title' => 'treatment_administered_show',
            ],
            [
                'id'    => 93,
                'title' => 'treatment_administered_delete',
            ],
            [
                'id'    => 94,
                'title' => 'treatment_administered_access',
            ],
            [
                'id'    => 95,
                'title' => 'manage_health_record_create',
            ],
            [
                'id'    => 96,
                'title' => 'manage_health_record_edit',
            ],
            [
                'id'    => 97,
                'title' => 'manage_health_record_show',
            ],
            [
                'id'    => 98,
                'title' => 'manage_health_record_delete',
            ],
            [
                'id'    => 99,
                'title' => 'manage_health_record_access',
            ],
            [
                'id'    => 100,
                'title' => 'ecto_parasite_mgt_record_access',
            ],
            [
                'id'    => 101,
                'title' => 'acaricide_used_create',
            ],
            [
                'id'    => 102,
                'title' => 'acaricide_used_edit',
            ],
            [
                'id'    => 103,
                'title' => 'acaricide_used_show',
            ],
            [
                'id'    => 104,
                'title' => 'acaricide_used_delete',
            ],
            [
                'id'    => 105,
                'title' => 'acaricide_used_access',
            ],
            [
                'id'    => 106,
                'title' => 'vaccination_record_access',
            ],
            [
                'id'    => 107,
                'title' => 'vaccine_against_create',
            ],
            [
                'id'    => 108,
                'title' => 'vaccine_against_edit',
            ],
            [
                'id'    => 109,
                'title' => 'vaccine_against_show',
            ],
            [
                'id'    => 110,
                'title' => 'vaccine_against_delete',
            ],
            [
                'id'    => 111,
                'title' => 'vaccine_against_access',
            ],
            [
                'id'    => 112,
                'title' => 'category_of_animals_vaccinated_create',
            ],
            [
                'id'    => 113,
                'title' => 'category_of_animals_vaccinated_edit',
            ],
            [
                'id'    => 114,
                'title' => 'category_of_animals_vaccinated_show',
            ],
            [
                'id'    => 115,
                'title' => 'category_of_animals_vaccinated_delete',
            ],
            [
                'id'    => 116,
                'title' => 'category_of_animals_vaccinated_access',
            ],
            [
                'id'    => 117,
                'title' => 'manage_vaccination_record_create',
            ],
            [
                'id'    => 118,
                'title' => 'manage_vaccination_record_edit',
            ],
            [
                'id'    => 119,
                'title' => 'manage_vaccination_record_show',
            ],
            [
                'id'    => 120,
                'title' => 'manage_vaccination_record_delete',
            ],
            [
                'id'    => 121,
                'title' => 'manage_vaccination_record_access',
            ],
            [
                'id'    => 122,
                'title' => 'manage_ecto_parasite_create',
            ],
            [
                'id'    => 123,
                'title' => 'manage_ecto_parasite_edit',
            ],
            [
                'id'    => 124,
                'title' => 'manage_ecto_parasite_show',
            ],
            [
                'id'    => 125,
                'title' => 'manage_ecto_parasite_delete',
            ],
            [
                'id'    => 126,
                'title' => 'manage_ecto_parasite_access',
            ],
            [
                'id'    => 127,
                'title' => 'breeding_record_access',
            ],
            [
                'id'    => 128,
                'title' => 'delivery_nature_create',
            ],
            [
                'id'    => 129,
                'title' => 'delivery_nature_edit',
            ],
            [
                'id'    => 130,
                'title' => 'delivery_nature_show',
            ],
            [
                'id'    => 131,
                'title' => 'delivery_nature_delete',
            ],
            [
                'id'    => 132,
                'title' => 'delivery_nature_access',
            ],
            [
                'id'    => 133,
                'title' => 'kid_number_create',
            ],
            [
                'id'    => 134,
                'title' => 'kid_number_edit',
            ],
            [
                'id'    => 135,
                'title' => 'kid_number_show',
            ],
            [
                'id'    => 136,
                'title' => 'kid_number_delete',
            ],
            [
                'id'    => 137,
                'title' => 'kid_number_access',
            ],
            [
                'id'    => 138,
                'title' => 'breeding_comment_create',
            ],
            [
                'id'    => 139,
                'title' => 'breeding_comment_edit',
            ],
            [
                'id'    => 140,
                'title' => 'breeding_comment_show',
            ],
            [
                'id'    => 141,
                'title' => 'breeding_comment_delete',
            ],
            [
                'id'    => 142,
                'title' => 'breeding_comment_access',
            ],
            [
                'id'    => 143,
                'title' => 'managebreeding_record_create',
            ],
            [
                'id'    => 144,
                'title' => 'managebreeding_record_edit',
            ],
            [
                'id'    => 145,
                'title' => 'managebreeding_record_show',
            ],
            [
                'id'    => 146,
                'title' => 'managebreeding_record_delete',
            ],
            [
                'id'    => 147,
                'title' => 'managebreeding_record_access',
            ],
            [
                'id'    => 148,
                'title' => 'staff_record_access',
            ],
            [
                'id'    => 149,
                'title' => 'staff_perfomance_create',
            ],
            [
                'id'    => 150,
                'title' => 'staff_perfomance_edit',
            ],
            [
                'id'    => 151,
                'title' => 'staff_perfomance_show',
            ],
            [
                'id'    => 152,
                'title' => 'staff_perfomance_delete',
            ],
            [
                'id'    => 153,
                'title' => 'staff_perfomance_access',
            ],
            [
                'id'    => 154,
                'title' => 'staff_recommendation_create',
            ],
            [
                'id'    => 155,
                'title' => 'staff_recommendation_edit',
            ],
            [
                'id'    => 156,
                'title' => 'staff_recommendation_show',
            ],
            [
                'id'    => 157,
                'title' => 'staff_recommendation_delete',
            ],
            [
                'id'    => 158,
                'title' => 'staff_recommendation_access',
            ],
            [
                'id'    => 159,
                'title' => 'staff_payment_record_create',
            ],
            [
                'id'    => 160,
                'title' => 'staff_payment_record_edit',
            ],
            [
                'id'    => 161,
                'title' => 'staff_payment_record_show',
            ],
            [
                'id'    => 162,
                'title' => 'staff_payment_record_delete',
            ],
            [
                'id'    => 163,
                'title' => 'staff_payment_record_access',
            ],
            [
                'id'    => 164,
                'title' => 'manage_staff_record_create',
            ],
            [
                'id'    => 165,
                'title' => 'manage_staff_record_edit',
            ],
            [
                'id'    => 166,
                'title' => 'manage_staff_record_show',
            ],
            [
                'id'    => 167,
                'title' => 'manage_staff_record_delete',
            ],
            [
                'id'    => 168,
                'title' => 'manage_staff_record_access',
            ],
            [
                'id'    => 169,
                'title' => 'sale_record_access',
            ],
            [
                'id'    => 170,
                'title' => 'sale_purpose_create',
            ],
            [
                'id'    => 171,
                'title' => 'sale_purpose_edit',
            ],
            [
                'id'    => 172,
                'title' => 'sale_purpose_show',
            ],
            [
                'id'    => 173,
                'title' => 'sale_purpose_delete',
            ],
            [
                'id'    => 174,
                'title' => 'sale_purpose_access',
            ],
            [
                'id'    => 175,
                'title' => 'manage_sale_record_create',
            ],
            [
                'id'    => 176,
                'title' => 'manage_sale_record_edit',
            ],
            [
                'id'    => 177,
                'title' => 'manage_sale_record_show',
            ],
            [
                'id'    => 178,
                'title' => 'manage_sale_record_delete',
            ],
            [
                'id'    => 179,
                'title' => 'manage_sale_record_access',
            ],
            [
                'id'    => 180,
                'title' => 'farm_expense_access',
            ],
            [
                'id'    => 181,
                'title' => 'expenditure_type_create',
            ],
            [
                'id'    => 182,
                'title' => 'expenditure_type_edit',
            ],
            [
                'id'    => 183,
                'title' => 'expenditure_type_show',
            ],
            [
                'id'    => 184,
                'title' => 'expenditure_type_delete',
            ],
            [
                'id'    => 185,
                'title' => 'expenditure_type_access',
            ],
            [
                'id'    => 186,
                'title' => 'manage_expense_create',
            ],
            [
                'id'    => 187,
                'title' => 'manage_expense_edit',
            ],
            [
                'id'    => 188,
                'title' => 'manage_expense_show',
            ],
            [
                'id'    => 189,
                'title' => 'manage_expense_delete',
            ],
            [
                'id'    => 190,
                'title' => 'manage_expense_access',
            ],
            [
                'id'    => 191,
                'title' => 'system_calendar_access',
            ],
            [
                'id'    => 192,
                'title' => 'stock_type_create',
            ],
            [
                'id'    => 193,
                'title' => 'stock_type_edit',
            ],
            [
                'id'    => 194,
                'title' => 'stock_type_show',
            ],
            [
                'id'    => 195,
                'title' => 'stock_type_delete',
            ],
            [
                'id'    => 196,
                'title' => 'stock_type_access',
            ],
            [
                'id'    => 197,
                'title' => 'health_condition_create',
            ],
            [
                'id'    => 198,
                'title' => 'health_condition_edit',
            ],
            [
                'id'    => 199,
                'title' => 'health_condition_show',
            ],
            [
                'id'    => 200,
                'title' => 'health_condition_delete',
            ],
            [
                'id'    => 201,
                'title' => 'health_condition_access',
            ],
            [
                'id'    => 202,
                'title' => 'spiritial_affiliation_create',
            ],
            [
                'id'    => 203,
                'title' => 'spiritial_affiliation_edit',
            ],
            [
                'id'    => 204,
                'title' => 'spiritial_affiliation_show',
            ],
            [
                'id'    => 205,
                'title' => 'spiritial_affiliation_delete',
            ],
            [
                'id'    => 206,
                'title' => 'spiritial_affiliation_access',
            ],
            [
                'id'    => 207,
                'title' => 'skill_create',
            ],
            [
                'id'    => 208,
                'title' => 'skill_edit',
            ],
            [
                'id'    => 209,
                'title' => 'skill_show',
            ],
            [
                'id'    => 210,
                'title' => 'skill_delete',
            ],
            [
                'id'    => 211,
                'title' => 'skill_access',
            ],
            [
                'id'    => 212,
                'title' => 'block_create',
            ],
            [
                'id'    => 213,
                'title' => 'block_edit',
            ],
            [
                'id'    => 214,
                'title' => 'block_show',
            ],
            [
                'id'    => 215,
                'title' => 'block_delete',
            ],
            [
                'id'    => 216,
                'title' => 'block_access',
            ],
            [
                'id'    => 217,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 218,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 219,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 220,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 221,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 222,
                'title' => 'orchard_fruit_access',
            ],
            [
                'id'    => 223,
                'title' => 'fruit_type_create',
            ],
            [
                'id'    => 224,
                'title' => 'fruit_type_edit',
            ],
            [
                'id'    => 225,
                'title' => 'fruit_type_show',
            ],
            [
                'id'    => 226,
                'title' => 'fruit_type_delete',
            ],
            [
                'id'    => 227,
                'title' => 'fruit_type_access',
            ],
            [
                'id'    => 228,
                'title' => 'harvestor_create',
            ],
            [
                'id'    => 229,
                'title' => 'harvestor_edit',
            ],
            [
                'id'    => 230,
                'title' => 'harvestor_show',
            ],
            [
                'id'    => 231,
                'title' => 'harvestor_delete',
            ],
            [
                'id'    => 232,
                'title' => 'harvestor_access',
            ],
            [
                'id'    => 233,
                'title' => 'orchard_record_create',
            ],
            [
                'id'    => 234,
                'title' => 'orchard_record_edit',
            ],
            [
                'id'    => 235,
                'title' => 'orchard_record_show',
            ],
            [
                'id'    => 236,
                'title' => 'orchard_record_delete',
            ],
            [
                'id'    => 237,
                'title' => 'orchard_record_access',
            ],
            [
                'id'    => 238,
                'title' => 'harvestcomment_create',
            ],
            [
                'id'    => 239,
                'title' => 'harvestcomment_edit',
            ],
            [
                'id'    => 240,
                'title' => 'harvestcomment_show',
            ],
            [
                'id'    => 241,
                'title' => 'harvestcomment_delete',
            ],
            [
                'id'    => 242,
                'title' => 'harvestcomment_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
