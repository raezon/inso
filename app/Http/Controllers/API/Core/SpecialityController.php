<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\SpecialityRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Validator;

class SpecialityController extends BaseController
{
    public function __construct(SpecialityRepositoryInterface $specialityRepositoryInterface)
    {
        $this->specialityRepository = $specialityRepositoryInterface;
    }

    public function index()
    {
        $results = $this->specialityRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $request->validate( [
            'name' => 'required',
            'image' => 'required',
        ]);

        $dto = $request->all([]);
        $image = Storage::disk('public')->put('speciality', $request->image);
        $dto['image'] = $image;
        $result = $this->specialityRepository->create($dto);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->specialityRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'name' => 'required',
            'image' => 'required',
        ]);

        if ($request->input('image')) {
            $image = Storage::disk('public')->put('speciality', $request->image);
            $dto['image'] = $image;
        }
        $data =  $this->specialityRepository->update($id, $record);


        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->specialityRepository->deleteById($id);
        return response()->json($result);
    }
}
