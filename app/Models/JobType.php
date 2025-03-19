<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    protected $table = 'tbl-job-types';

    protected $fillable = [
        'name',
        'archived',
        'create_id',
        'update_id'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'type_id');
    }
}