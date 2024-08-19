<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 * @method static create(array $array)
 * @method static select(string $string, string $string1, string $string2, string $string3, string $string4, string $string5, string $string6, string $string7)
 */
class About extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'skill' => 'array'
    ];
}
