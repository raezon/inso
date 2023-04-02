<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Models\Clinical;
use Illuminate\Support\Facades\DB;


class UniversityController extends BaseController
{

    public function getUniversity(Request $request)
    {
        $name = $request->name ? $request->name : null;
        $commune = $request->commune ? $request->commune : null;
        $wilaya = $request->wilaya ? $request->wilaya : null;
        //  $pageCount = $request->pageCount;
        $pageCount = 100;
        $result =
        Clinicalwhen($request->long and $request->lat, function ($query) use ($request, $commune, $wilaya) {
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
            ->paginate($pageCount);




        return response()->json($result);
    }
}
