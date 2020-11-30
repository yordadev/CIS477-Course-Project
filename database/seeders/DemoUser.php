<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use App\Models\UserPermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DemoUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ADMIN DEMO USER
        DB::table('users')->insert([
            'name' => 'Admin Demo User',
            'email' => 'admin@user.com',
            'password' => Hash::make('password'),
        ]);

        $permission = Permission::where('is_admin', true)->first();
        $user = User::where('email', 'admin@user.com')->first();

        DB::table('user_permissions')->insert([
            'user_id' => $user->id,
            'permission_id' => $permission->permission_id,
            'pivot_id' => UserPermission::generatePivotID()
        ]);

        // STAFF DEMO USER
        DB::table('users')->insert([
            'name' => 'Staff Demo User',
            'email' => 'staff@user.com',
            'password' => Hash::make('password'),
        ]);

        $permission = Permission::where('is_staff', true)->first();
        $user = User::where('email', 'staff@user.com')->first();

        DB::table('user_permissions')->insert([
            'user_id' => $user->id,
            'permission_id' => $permission->permission_id,
            'pivot_id' => UserPermission::generatePivotID()
        ]);

        // HIRING MANAGER DEMO USER
        DB::table('users')->insert([
            'name' => 'Hiring Manager Demo User',
            'email' => 'hiringmanager@user.com',
            'password' => Hash::make('password'),
        ]);

        $permission = Permission::where('is_contract_manager', true)->first();
        $user = User::where('email', 'hiringmanager@user.com')->first();

        DB::table('user_permissions')->insert([
            'user_id' => $user->id,
            'permission_id' => $permission->permission_id,
            'pivot_id' => UserPermission::generatePivotID()
        ]);


        // CANDIDATE DEMO USER 1
        DB::table('users')->insert([
            'name' => 'Candidate Demo User 1',
            'email' => 'candidate1@user.com',
            'password' => Hash::make('password'),
        ]);

        $permission = Permission::where('is_client', true)->first();
        $user = User::where('email', 'candidate1@user.com')->first();

        DB::table('user_permissions')->insert([
            'user_id' => $user->id,
            'permission_id' => $permission->permission_id,
            'pivot_id' => UserPermission::generatePivotID()
        ]);

        // CANDIDATE DEMO USER 2
        DB::table('users')->insert([
            'name' => 'Candidate Demo User 2',
            'email' => 'candidate2@user.com',
            'password' => Hash::make('password'),
        ]);

        $permission = Permission::where('is_client', true)->first();
        $user = User::where('email', 'candidate2@user.com')->first();

        DB::table('user_permissions')->insert([
            'user_id' => $user->id,
            'permission_id' => $permission->permission_id,
            'pivot_id' => UserPermission::generatePivotID()
        ]);
    }
}
