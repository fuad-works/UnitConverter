<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\ProductQuantity;

class Product extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function quantites()
    {
        return $this->hasMany(ProductQuantity::class);
    }
}
