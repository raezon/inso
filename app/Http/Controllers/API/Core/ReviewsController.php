<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Models\Reviews;
use Illuminate\Support\Facades\Storage;
use Validator;

class ReviewsController extends BaseController
{
 


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required',
            'account_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        
        $review = Reviews::create($validatedData);

        // Optionally, you can perform additional actions after storing the review

        return response()->json([
                'success' => true,
                'data' => $review,
                'message' => 'Review stored successfully',
            ]);
        
    
    }





}
