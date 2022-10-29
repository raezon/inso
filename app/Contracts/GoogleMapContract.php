<?php

namespace App\Contracts;


interface GoogleMapContract
{
    public function calculateCordinates(string $addresse):object;
    public function calculateDistance(array $cordinates1,array $cordinates2):float;
}