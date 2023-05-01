<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\PartnerRepositoryInterface;


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
            'phone_number' => 'required',
            'type' => 'required',
            'card_id' => 'required',
        ]);

        $dto = $request->all([]);
        $result = $this->partnerRepositoryInterface->create($dto);
        return response()->json($result);
    }

  
  
}
