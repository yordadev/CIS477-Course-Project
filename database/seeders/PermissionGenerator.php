<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermissionGenerator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'permission_id' => uniqid(),
            'name' => 'Staff',
            'is_staff' => true,
        ]);

        DB::table('permissions')->insert([
            'permission_id' => uniqid(),
            'name' => 'Contract Manager',
            'is_contract_manager' => true,
        ]);

        DB::table('permissions')->insert([
            'permission_id' => uniqid(),
            'name' => 'Administrator',
            'is_admin' => true,
        ]);

        DB::table('permissions')->insert([
            'permission_id' => uniqid(),
            'name' => 'Client',
            'is_client' => true,
        ]);
    }
}
