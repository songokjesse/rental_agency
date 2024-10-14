<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ["name", "address", "landlord_id", 'property_type', 'estate', 'town', 'county'];

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
