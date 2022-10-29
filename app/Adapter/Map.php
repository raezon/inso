<?php
namespace App\Adapter;

use App\Contracts\GoogleMapContract;

class Map{
    public function __construct(private string $driver,private GoogleMapContract $api){}

    public static function make(string $driver):static{
        return new static (driver:$driver,api:app()->make($driver) );
    }
    public function calculateCordinates(string $addresse)
    {
        dd($this->api->calculateCordinates($addresse));
        return $this->api->calculateCordinates($addresse);
    }
}