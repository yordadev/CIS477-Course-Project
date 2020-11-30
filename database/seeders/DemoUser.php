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
        DB::table('users')->insert([
            'name' => 'Test Demo User',
            'email' => 'test@user.com',
            'password' => Hash::make('password'),
        ]);

        $permission = Permission::where('is_admin', true)->first();
        $user = User::where('email', 'test@user.com')->first();

        DB::table('user_permissions')->insert([
            'user_id' => $user->id,
            'permission_id' => $permission->permission_id,
            'pivot_id' => UserPermission::generatePivotID()
        ]);
    }
}
