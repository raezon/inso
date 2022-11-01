<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Models\hospital;
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
        $nameSpeciality = $request->input('nameSpeciality') ? $request->input('nameSpeciality') : null;
        $nameHospital = $request->input('nameHospital') ? $request->input('nameHospital') : null;


        $result = hospital::whereHas('speciality', function ($q) use ($nameSpeciality) {
            $q->orWhere('name', '=', $nameSpeciality);
        })
            ->when($request->long and $request->lat, function ($query) use ($request) {
                $query->addSelect(DB::raw("name ,longitude,latitude,image,round(ST_Distance_Sphere(
                        POINT('$request->long', '$request->lat'), POINT(longitude, latitude)
                    )/ 1000, 0) as distance"))

                    ->orderBy('distance');
            })
            ->orWhere('name',$nameHospital)
            ->take(9)
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
