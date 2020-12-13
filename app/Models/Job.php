<?php

namespace App\Models;

use App\Models\User;
use App\Models\JobAttribute;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'posted_by',
        'job_id',
        'title',
        'location',
        'description'
    ];

    protected $casts = [
        'posted_by' => 'integer',
        'job_id' => 'string',
        'title'  => 'string',
        'location' => 'string',
        'description' => 'longtext'
    ];

    public static function generateJobID()
    {
        $id = uniqid();

        if (Job::where('job_id', $id)->first()) {
            return Job::generateResumeID();
        }

        return $id;
    }

    public function attributes()
    {
        return $this->hasMany(JobAttribute::class, 'job_id', 'job_id');
    }

    public function manager()
    {
        return $this->hasOne(User::class, 'id', 'posted_by');
    }
}
