<?php

namespace App\Stripe;

class  StripeAPI
{
    public $key;
    public function __construct(string $key)
    {
        $this->key= $key;
    }
    public function charge($amount){
        dump('montant chargé :'. $amount);
    }
}