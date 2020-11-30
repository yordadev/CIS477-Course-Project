<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'resume_id',
        'name',
        'location',
        'highschool',
        'hs_name',
        'undergrad',
        'ug_name',
        'graduate',
        'g_name',
        'masters', 
        'm_name' 
    ];

    public function attributes(){
        return $this->hasMany(ResumeAttributes::class, 'resume_id', 'resume_id');
    }
}
