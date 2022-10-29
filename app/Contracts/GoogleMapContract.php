<?php

namespace App\Contracts;


interface GoogleMapContract
{
    public function calculateCordinates(string $addresse):array;
    public function calculateDistance(array $cordinates1,array $cordinates2):float;
}