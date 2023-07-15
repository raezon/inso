<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Models\Accounts;
use App\Models\Ambulance;


class AmbulanceController extends BaseController
{
    public function create(Request $request)
    {

        $token = $request->header('Authorization');
        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

     
        // Extract the token from the "Bearer" authentication scheme
        $token = str_replace('Bearer ', '', $token);

 
        $user = Accounts::where('api_token', $token)->first();

    
        if (!$user) {
            return response()->json(['message' => 'Invalid UUID or phone number'], 401);
        }
        // Validate the incoming request data
        $request->validate([
            'account_id' => 'required|integer',
            'date_depart' => 'required|date',
            'date_arriver' => 'required|date',
            'num_cart' => 'required|string',
        ]);

        // Create a new instance of Ambulance model with the validated data
        $ambulance = Ambulance::create([
            'account_id' => $request->account_id,
            'date_depart' => $request->date_depart,
            'date_arriver' => $request->date_arriver,
            'num_cart' => $request->num_cart,
        ]);

        // Return a response indicating the success of the operation
        return response()->json([
            'success' => true,
            'data' => $ambulance,
            'message' => 'Ambulance created successfully',
        ]);
    }
}