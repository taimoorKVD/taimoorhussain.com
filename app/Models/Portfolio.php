<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 * @method static latest()
 * @method static select(string $string, string $string1, string $string2, string $string3, string $string4, string $string5, string $string6, string $string7, string $string8)
 */
class Portfolio extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function stacks(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => explode(',', $value),
            set: static fn ($value) => implode(',', $value),
        );
    }
}
