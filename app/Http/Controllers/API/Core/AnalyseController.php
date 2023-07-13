<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Models\Accounts;
use App\Models\Assurance;
use Illuminate\Support\Facades\DB;


class AnalyseController extends BaseController
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


        $name = $request->name ? $request->name : null;
        $commune = $request->commune ? $request->commune : null;
        $wilaya = $request->wilaya ? $request->wilaya : null;
        //  $pageCount = $request->pageCount;
        $pageCount = 1000;
        $result = Assurance::when($request->long and $request->lat, function ($query) use ($request, $commune, $wilaya) {
            if (!$commune and !$wilaya) {
                $query->addSelect(DB::raw("name,phone_number,address,commune,wilaya ,longitude,latitude,image,round(ST_Distance_Sphere(
                        POINT('$request->long', '$request->lat'), POINT(longitude, latitude)
                    )/ 1000, 0) as distance"))

                    ->orderBy('distance');
            }
        })
            ->when($commune, function ($query) use ($commune) {

                $query->where('commune', '=', $commune);
            })
            ->when($wilaya, function ($query) use ($wilaya) {

                $query->where('wilaya', '=', $wilaya);
            })
            ->when($name, function ($query) use ($name) {

                $query->where('name', 'LIKE', "%{$name}%");
            })
            ->paginate($pageCount);



        return response()->json($result);
    }
}
