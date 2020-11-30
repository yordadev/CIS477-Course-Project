<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'permission_id',
        'name',
        'is_admin', // boolean
        'is_client', //
        'is_staff',
        'is_contract_manager'
    ];
}
