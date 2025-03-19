<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Job extends Model
{
    use HasFactory;

    protected $table = 'tbl-jobs';

    protected $fillable = [
        'name',
        'description',
        'type_id',
        'company_id',
        'city_id',
        'min_salary',
        'max_salary',
        'requirement',
        'archived',
        'create_id',
        'update_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'type_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'create_id');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'update_id');
    }

    // Format gaji sebelum disimpan ke database
    protected function minSalary(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => preg_replace('/[^0-9]/', '', $value),
        );
    }

    protected function maxSalary(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => preg_replace('/[^0-9]/', '', $value),
        );
    }

    // Helper method untuk format gaji
    public function getFormattedSalaryRangeAttribute()
    {
        $minSalary = number_format($this->min_salary, 0, ',', '.');
        $maxSalary = number_format($this->max_salary, 0, ',', '.');
        return "Rp {$minSalary} - Rp {$maxSalary}";
    }

    protected function formattedSalaryRange(): Attribute
    {
        return Attribute::make(
            get: function () {
                return 'Rp ' . number_format($this->min_salary, 0, ',', '.') . 
                       ' - Rp ' . number_format($this->max_salary, 0, ',', '.');
            }
        );
    }
}