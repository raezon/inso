<?php

namespace App\Http\Controllers\API\Shared;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Models\AlgeriaCities;
use App\Services\Stripe\OrderService;
//use App\Services\Stripe\OrderService;
use App\Services\Stripe\StripeService;
use Illuminate\Support\Facades\Storage;
use Validator;

class AlgeriaCitiesController extends BaseController
{


    public function getCommunes(Request $request)
    {
        $wilaya=$request->wilaya;
        $results = AlgeriaCities::where('wilaya_name_ascii', $wilaya)->get();
        return response()->json($results);
    }

   
}
