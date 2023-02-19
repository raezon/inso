<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use App\Interfaces\Repositories\AppointementRepositoryInterface;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Validator;

class AppointementController extends BaseController
{
    public function __construct(AppointementRepositoryInterface $appointementRepositoryInterface)
    {
        $this->appointementRepository = $appointementRepositoryInterface;
    }



    public function store(Request $request)
    {

      /*  $request->validate([
            'priceReduced' => 'required',
            'price' => 'required',
            'couples' => 'required',
            'childrens' => 'required',
            'acount_id' => 'required',
            'doctor_id' => 'required',
        ]);*/

        $dto = $request->all([]);
        $result = $this->appointementRepository->create($dto);
        return response()->json($result);
    }

}
