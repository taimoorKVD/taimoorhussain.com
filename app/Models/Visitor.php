<?php

namespace App\Models;

use GeoIp2\Database\Reader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string|null $ip)
 * @method static create(array $array)
 * @method static count()
 * @method static latest()
 * @method static whereNull(string $string)
 * @property mixed $location
 * @property mixed $ip_address
 */
class Visitor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function updateLocation(): array
    {
        try {
            $reader = new Reader(database_path('maxmind/GeoLite2-City.mmdb'));
            $record = $reader->city($this->ip_address);
            $this->location = "{$record->city->name} {$record->country->name}";
            $this->save();
            return ['status' => true];
        } catch (\Exception $exception) {
            return ['status' => false, 'message' => $exception->getMessage()];
        }
    }
}
