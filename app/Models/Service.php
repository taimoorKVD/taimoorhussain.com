<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 * @method static insert(array[] $array)
 * @method static select(string $string, string $string1, string $string2, string $string3, string $string4)
 * @method static count()
 */
class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'detail' => 'array'
    ];
}
