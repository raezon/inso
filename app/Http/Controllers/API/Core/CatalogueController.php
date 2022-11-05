<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Models\Hospital ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;

class CatalogueController extends BaseController
{
    public function __construct(AccountsRepositoryInterface $accountsRepositoryInterface)
    {
        $this->accountsRepository = $accountsRepositoryInterface;
    }


    public function getHospitalBySpeciality(Request $request)
    {
        $name = $request->name ? $request->name : null;
        $country = $request->country ? $request->country : null;
        $wilaya = $request->wilaya ? $request->wilaya : null;
        $pageCount = $request->pageCount;

        $result = Hospital::whereHas('speciality', function ($q) use ($name,$country,$wilaya) {
            if ($name) {
                $q->where('hospital.name', 'LIKE', "%{$name}%")
                    ->orWhere('hospital.country', '=', "$country")
                    ->orWhere('hospital.wilaya', '=', "$wilaya")
                    ->orWhere('speciality.name', 'LIKE', "%{$name}%");
            }
        })
            ->when($request->long and $request->lat, function ($query) use ($request) {
                $query->addSelect(DB::raw("name,phone_number,address ,longitude,latitude,image,round(ST_Distance_Sphere(
                        POINT('$request->long', '$request->lat'), POINT(longitude, latitude)
                    )/ 1000, 0) as distance"))

                    ->orderBy('distance');
            })
            ->limit($pageCount)
            ->get();



        return response()->json($result);
    }

    public function getHospitalByName(Request $request)
    {
        $result = $this->accountsRepository->deleteById($id);
        return response()->json($result);
    }

    public function getHospitalByAssuranceNumber(Request $request)
    {
        $result = $this->accountsRepository->deleteById($id);
        return response()->json($result);
    }
}
