<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\PartnerRepositoryInterface;
use App\Models\Partner;

class PartnerController extends BaseController
{
    public function __construct(PartnerRepositoryInterface $PartnerRepositoryInterface)
    {
        $this->partnerRepositoryInterface = $PartnerRepositoryInterface;
    }

    public function store(Request $request)
    {
 
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'nullable',
            'address' => 'required',
            'phone_number' => 'required',
            'domaine' => 'required',
            'message' => 'nullable',
        ]);

        $dto = $request->all([]);
        $result = $this->partnerRepositoryInterface->create($dto);
        return response()->json($result);
    }

  
  
}
