<?php

namespace App\Services\Google;

use App\Contracts\GoogleMapContract;

class GoogleService implements GoogleMapContract
{
    public $addresse;
    public function __construct()
    {
        $this->addresse = app('geocoder');
    }
    public function calculateCordinates(string $addresse): array
    {
        return $this->addresse->geocode($addresse)->get()->toArray();
    }
    public function calculateDistance(array $cordinates1, array $cordinates2): float
    {
        return 1.0;
    }
}
