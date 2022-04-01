<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function materials(): hasMany
    {
        return $this->hasMany(ProductMaterial::class)->select('material_id', 'quantity');
    }

    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code)->first();
    }
}
