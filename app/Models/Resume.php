<?php

namespace App\Models;

use App\Models\ResumeAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resume extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id'    => 'integer',
        'resume_id'  => 'string',
        'name'       => 'string',
        'location'   => 'string',
        'highschool' => 'boolean',
        'hs_name'    => 'string',
        'undergrad'  => 'boolean',
        'ug_name'    => 'string',
        'graduate'   => 'boolean',
        'g_name'     => 'string',
        'phd'        => 'boolean',
        'phd_name'   => 'string'
    ];

    protected $fillable = [
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
        'phd',
        'phd_name'
    ];

    public static function generateResumeID()
    {
        $id = uniqid();

        if (Resume::where('resume_id', $id)->first()) {
            return Resume::generateResumeID();
        }

        return $id;
    }

    public function attributes()
    {
        return $this->hasMany(ResumeAttribute::class, 'resume_id', 'resume_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
