<?php

namespace App\Http\Controllers\API\System;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Models\Accounts;
use App\Models\Comercial;
use App\Models\Ordonance;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Hashing\BcryptHasher;


class ComercialController extends BaseController
{

    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

      
        $credentials = $request->only('email', 'password');

        $comercial = Comercial::where('email', $credentials['email'])->first();
 
        if ($comercial && Hash::check($credentials['password'], $comercial->password)) {
            $token = $this->generateRandomToken();
            $comercial->api_token = $token;
            $comercial->save();

            // Authentication successful
            return response()->json([
                'message' => 'Sign in successful!',
                'token' => $token,
            ], 201);
     
        }

        // Invalid email or password
        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    /**
     * Generate a random token for API authentication.
     *
     * @return string
     */
    private function generateRandomToken()
    {
        $length = 60;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return $token;
    }

    public function signUp(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $comercial = new Comercial();
        $comercial->name = $request->input('name');
        $comercial->surname = $request->input('surname');
        $comercial->email = $request->input('email');
        $hasher = new BcryptHasher();
        $comercial->password = $hasher->make($request->input('password'));
        $comercial->status = true;
        $comercial->save();

        return response()->json($comercial, 201);
    }


    public function getAuthenticatedUser(Request $request)
    {
        $token = $request->input('bearerToken');

        // Retrieve the account based on the token
        $account = Comercial::where('api_token', $token)->first();

        
        if (!$account) {
            return $this->sendError('Invalid token');
        }


        return response($account);
    }

    public function update(Request $request, $id)
    {
  

        // Retrieve the account based on the token
        $comercial = Comercial::where('id', $id)->first();
        $comercial->name = $request->input('name');
        $comercial->surname = $request->input('surname');
        $comercial->email = $request->input('email');
        $hasher = new BcryptHasher();
        $comercial->password = $hasher->make($request->input('password'));
        $comercial->status = true;
        $comercial->save();

        if (!$comercial) {
            return $this->sendError('Invalid token');
        }


        return response($comercial);
    }


    


}
