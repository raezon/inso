<?php

namespace App\Http\Controllers\API\System;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\Maintenance;

class MaintenanceController extends BaseController
{

    public function show($id)
    {
        $result = Maintenance::find($id);
        return response()->json($result);
    }
}
