<?php

namespace App\Http\Controllers\API\System;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Models\Accounts;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class AuthController extends BaseController
{
    /**
     * sigin for doctor
     */
    public function signin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;
            $success['id'] =  $authUser->id;

            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
    /**
     * signup for doctor
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;


        return $this->sendResponse($success, 'User created successfully.');
    }
    /**part assurant */
    public function signInAssurant(Request $request){
      
        $request->validate([
            'uuid' => 'required',
            'phone_number' => 'required',
        ]);

        $user = Accounts::where('uuid', $request->uuid)->where('phone_number', $request->phone_number)->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid UUID or phone number'], 401);
        }

        $token = $user->createToken('Token')->plainTextToken;
        $user->api_token = $token;
        $user->save();

        return response()->json([
            'success' => true,
            'data' => [
                'token' => $token,
                'name' => $user->name,
                'id' => $user->id,
            ],
            'message' => 'User signed in'
        ]);
    }
    public function getQrcode(Request $request)
    {
        $token = $request->input('bearerToken');

        // Retrieve the account based on the token
        $account = Accounts::where('api_token', $token)->first();

        if (!$account) {
            return $this->sendError('Invalid token');
        }
       

        $userDataString = json_encode($account);

        $options = new QROptions([
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_L,
            'scale' => 3,
            'imageBase64' => false,
        ]);

        $qrcode = new QRCode($options);
        $qrCodeImage = $qrcode->render($userDataString);

        return response($qrCodeImage)->header('Content-Type', 'image/png');
    }
}
