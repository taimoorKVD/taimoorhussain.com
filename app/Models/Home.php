<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static first()
 * @method static select(string $string, string $string1, string $string2)
 * @method static create(string[] $array)
 * @method static truncate()
 */
class Home extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function socialLinks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HomeSocialLink::class, 'home_id');
    }
}
