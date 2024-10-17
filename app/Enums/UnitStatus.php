<?php

namespace App\Enums;

enum UnitStatus: string
{
    case Available = 'available';
    case Occupied = 'occupied';
    case UnderMaintenance = 'under_maintenance';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
