<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeAttributes extends Model
{
    use HasFactory;

    protected $primaryKey = 'attribute_id';
    protected $foreignKey = 'resume_id';

    protected $fillable =[
        'resume_id',
        'attribute_id',
        'name'
    ];
}
