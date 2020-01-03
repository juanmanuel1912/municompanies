<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => '18',
                'title' => 'crm_status_create',
            ],
            [
                'id'    => '19',
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => '20',
                'title' => 'crm_status_show',
            ],
            [
                'id'    => '21',
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => '22',
                'title' => 'crm_status_access',
            ],
            [
                'id'    => '23',
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => '24',
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => '25',
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => '26',
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => '27',
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => '28',
                'title' => 'crm_note_create',
            ],
            [
                'id'    => '29',
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => '30',
                'title' => 'crm_note_show',
            ],
            [
                'id'    => '31',
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => '32',
                'title' => 'crm_note_access',
            ],
            [
                'id'    => '33',
                'title' => 'crm_document_create',
            ],
            [
                'id'    => '34',
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => '35',
                'title' => 'crm_document_show',
            ],
            [
                'id'    => '36',
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => '37',
                'title' => 'crm_document_access',
            ],
            [
                'id'    => '38',
                'title' => 'city_create',
            ],
            [
                'id'    => '39',
                'title' => 'city_edit',
            ],
            [
                'id'    => '40',
                'title' => 'city_show',
            ],
            [
                'id'    => '41',
                'title' => 'city_delete',
            ],
            [
                'id'    => '42',
                'title' => 'city_access',
            ],
            [
                'id'    => '43',
                'title' => 'categories_item_create',
            ],
            [
                'id'    => '44',
                'title' => 'categories_item_edit',
            ],
            [
                'id'    => '45',
                'title' => 'categories_item_show',
            ],
            [
                'id'    => '46',
                'title' => 'categories_item_delete',
            ],
            [
                'id'    => '47',
                'title' => 'categories_item_access',
            ],
            [
                'id'    => '48',
                'title' => 'categories_type_create',
            ],
            [
                'id'    => '49',
                'title' => 'categories_type_edit',
            ],
            [
                'id'    => '50',
                'title' => 'categories_type_show',
            ],
            [
                'id'    => '51',
                'title' => 'categories_type_delete',
            ],
            [
                'id'    => '52',
                'title' => 'categories_type_access',
            ],
            [
                'id'    => '53',
                'title' => 'territorio_veci_create',
            ],
            [
                'id'    => '54',
                'title' => 'territorio_veci_edit',
            ],
            [
                'id'    => '55',
                'title' => 'territorio_veci_show',
            ],
            [
                'id'    => '56',
                'title' => 'territorio_veci_delete',
            ],
            [
                'id'    => '57',
                'title' => 'territorio_veci_access',
            ],
            [
                'id'    => '58',
                'title' => 'company_create',
            ],
            [
                'id'    => '59',
                'title' => 'company_edit',
            ],
            [
                'id'    => '60',
                'title' => 'company_show',
            ],
            [
                'id'    => '61',
                'title' => 'company_delete',
            ],
            [
                'id'    => '62',
                'title' => 'company_access',
            ],
            [
                'id'    => '63',
                'title' => 'team_create',
            ],
            [
                'id'    => '64',
                'title' => 'team_edit',
            ],
            [
                'id'    => '65',
                'title' => 'team_show',
            ],
            [
                'id'    => '66',
                'title' => 'team_delete',
            ],
            [
                'id'    => '67',
                'title' => 'team_access',
            ],
            [
                'id'    => '68',
                'title' => 'centros_educativo_create',
            ],
            [
                'id'    => '69',
                'title' => 'centros_educativo_edit',
            ],
            [
                'id'    => '70',
                'title' => 'centros_educativo_show',
            ],
            [
                'id'    => '71',
                'title' => 'centros_educativo_delete',
            ],
            [
                'id'    => '72',
                'title' => 'centros_educativo_access',
            ],
        ];

        Permission::insert($permissions);
    }
}