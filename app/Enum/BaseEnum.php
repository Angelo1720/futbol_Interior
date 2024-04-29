<?php 

namespace App\Enum;

trait BaseEnum {
    public static function forMigration(): array {
        return collect(self::cases())
            ->map(function ($enum) {
                if (property_exists($enum, "value")) return $enum->value;
                return $enum->name;
            })
            ->values()
            ->toArray();
    }
}