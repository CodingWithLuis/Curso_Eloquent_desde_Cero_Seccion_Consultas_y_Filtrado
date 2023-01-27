<?php

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'price',
        'is_active',
    ];

    public function scopeFilter($query)
    {
        return $query->when(request('search'), function ($query) {
            $query->where('code', 'LIKE', '%' . request('search') . '%')
                ->orWhere('name', 'LIKE', '%' . request('search') . '%')
                ->orWhere('price', 'LIKE', '%' . request('search') . '%');
        });
    }

    // protected static function booted()
    // {
    //     static::addGlobalScope(new ActiveScope);
    // }

    // public function scopeActive($query, $active)
    // {
    //     return $query->where('is_active', $active);
    // }
}
