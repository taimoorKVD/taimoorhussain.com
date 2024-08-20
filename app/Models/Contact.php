<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 * @method static create(array $validate)
 * @method static latest()
 */
class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];
}
