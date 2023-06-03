<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use App\Models\Hospital;
use Illuminate\Support\Facades\DB;


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
        $pageCount = ($request->pageCount)? ($request->pageCount):1000;
        $result = Hospital::whereHas('specialities', function ($q) use ($name) {
            if ($name) {
                $q
                    ->where('hospital.name', 'LIKE', "%{$name}%")
                    ->orWhere('speciality.name', 'LIKE', "%{$name}%");
            }
        })
            ->when($request->long and $request->lat, function ($query) use ($request, $country, $wilaya) {
                if (!$country and !$wilaya) {
                    $query->addSelect(DB::raw("name,phone_number,address,country,wilaya ,longitude,latitude,image,round(ST_Distance_Sphere(
                        POINT('$request->long', '$request->lat'), POINT(longitude, latitude)
                    )/ 1000, 0) as distance"))

                        ->orderBy('distance');
                }
            })
            ->when($country, function ($query) use ($country) {

                $query->where('country', '=', $country);
            })
            ->when($wilaya, function ($query) use ($wilaya) {

                $query->where('wilaya', '=', $wilaya);
            })
            ->paginate($pageCount);



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
