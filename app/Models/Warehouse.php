<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    protected $fillable = ['material_id', 'remainder', 'price'];

    public function warehouses(): HasMany
    {
        return $this->hasMany(Warehouse::class);
    }
}
