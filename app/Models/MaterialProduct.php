<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialProduct extends Model
{
    protected $table = 'material_product';
    protected $fillable = ['material_id', 'product_id', 'quantity'];
}
