<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'salary',
        'is_active',
        'hire_date',
        'age',
    ];

    protected $casts = [
        'hire_date' => 'date',
        'is_active' => 'boolean'
    ];

    protected function hireDate(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d') : null,
            get: fn ($value) => $value ? Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y') : null
        );
    }
}
