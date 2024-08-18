<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string|null $ip)
 * @method static create(array $array)
 */
class Visitor extends Model
{
    use HasFactory;

    protected $guarded = [];
}
