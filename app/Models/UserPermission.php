<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'permission_id',
        'pivot_id'
    ];

    public static function generatePivotID()
    {
        $id = uniqid();

        if (UserPermission::where('pivot_id', $id)->first()) {
            return UserPermission::generatePivotID();
        }

        return $id;
    }

    public function accountType()
    {
        $permission = Permission::where([
            'permission_id' => $this->permission_id
        ])->first();

        if ($permission->is_client) {
            return 'candidate';
        } else if ($permission->is_staff) {
            return 'staff';
        } else if ($permission->is_admin) {
            return 'admin';
        } else if ($permission->is_contract_manager) {
            return "hiring manager";
        }

        return 'unknown';
    }
}
