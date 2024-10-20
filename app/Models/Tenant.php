<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'id_number',
        'kra_pin',
        'emergency_contact',
    ];

      public function leases()
    {
        return $this->hasMany(Lease::class);
    }
}
