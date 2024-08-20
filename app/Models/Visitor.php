<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Location\Facades\Location;

/**
 * @method static where(string $string, string|null $ip)
 * @method static create(array $array)
 * @method static count()
 * @method static latest()
 * @property mixed $location
 * @property mixed $ip_address
 */
class Visitor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function updateLocation(): bool
    {
        $location = Location::get($this->ip_address);
        if(isset($location->cityName)) {
            $this->location = "{$location->cityName}  {$location->countryName}";
            $this->save();
            return true;
        }
        return false;
    }
}
