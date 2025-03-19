<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'tbl-cities';

    protected $fillable = [
        'province_id',
        'name',
        'archived',
        'create_id',
        'update_id'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}