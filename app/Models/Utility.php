<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;
    protected $fillable = ["unit_id", "type", "meter_number", "notes"];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
