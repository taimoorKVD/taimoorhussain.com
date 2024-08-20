<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 * @method static latest()
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
