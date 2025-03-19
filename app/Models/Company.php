<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl-companies';

    protected $fillable = [
        'user_id',
        'city_id',
        'name',
        'address',
        'telephone',
        'company_icon',
        'company_logo',
        'archived',
        'create_id',
        'update_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id');
    }
}