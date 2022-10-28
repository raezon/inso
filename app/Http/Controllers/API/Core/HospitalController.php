<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Interfaces\Repositories\HospitalRepositoryInterface;
use Validator;

class HospitalController extends BaseController
{
    public function __construct(HospitalRepositoryInterface $hospitalRepositoryInterface)
    {
        $this->hospitalRepository = $hospitalRepositoryInterface;
    }

    public function index()
    {
        $results = $this->hospitalRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'speciality_id' => 'required',
        ]);

        $dto = $request->all([]);
        $result = $this->hospitalRepository->create($dto);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->hospitalRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'name' => 'required',
            'image' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'speciality_id' => 'required',
        ]);

        $data =  $this->hospitalRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->hospitalRepository->deleteById($id);
        return response()->json($result);
    }
}
