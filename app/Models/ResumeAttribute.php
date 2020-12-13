<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeAttribute extends Model
{
    protected $cast = [
        'resume_id'    => 'string',
        'attribute_id' => 'string',
        'name'         => 'string'
    ];

    protected $fillable = [
        'resume_id',
        'attribute_id',
        'name'
    ];

    public static function generateAttributeID()
    {
        $id = uniqid();

        if (ResumeAttribute::where('attribute_id', $id)->first()) {
            return ResumeAttribute::generateAttributeID();
        }

        return $id;
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'resume_id');
    }
}
