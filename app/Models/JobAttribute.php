<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAttribute extends Model
{
    protected $casts = [
        'job_id'       => 'string',
        'attribute_id' => 'string',
        'name'         => 'string'
    ];

    protected $fillable = [
        'job_id',
        'attribute_id',
        'name'
    ];

    public static function generateAttributeID()
    {
        $id = uniqid();

        if (JobAttribute::where('attribute_id', $id)->first()) {
            return JobAttribute::generateAttributeID();
        }

        return $id;
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }
}
