<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use Validator;

class CarouselsController extends BaseController
{
    public function __construct(CarouselsRepositoryInterface $carouselsRepositoryInterface)
    {
        $this->carouselsRepository = $carouselsRepositoryInterface;
    }

    public function index()
    {
        $results = $this->carouselsRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'link' => 'required',
        ]);

        $dto = $request->all([]);
        $result = $this->carouselsRepository->create($dto);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->carouselsRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'link' => 'required',
        ]);

        $data =  $this->carouselsRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->carouselsRepository->deleteById($id);
        return response()->json($result);
    }
}
