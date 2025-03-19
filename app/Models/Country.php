<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'tbl-countries';

    protected $fillable = [
        'name',
        'archived',
        'create_id',
        'update_id'
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}