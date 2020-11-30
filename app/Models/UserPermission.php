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

    public static function generatePivotID(){
        $id = uniqid();

        if(UserPermission::where('pivot_id', $id)->first()){
            return UserPermission::generatePivotID();
        }

        return $id;
    }

    
    
}
