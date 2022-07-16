<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public function sub_units()
    {
        return $this->hasMany(Unit::class,'parent_unit');
    }

    public function parent_unit()
    {
        return $this->belongsTo(Unit::class,'parent_unit');
    }

}
