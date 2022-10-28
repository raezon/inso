<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\CurrentClientsRepositoryInterface;
use Validator;

class CurrentClientsController extends BaseController
{
    public function __construct(CurrentClientsRepositoryInterface $currentClientsRepositoryInterface)
    {
        $this->currentClientsRepository = $currentClientsRepositoryInterface;
    }

    public function index()
    {
        $results = $this->currentClientsRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);

        $dto = $request->all([]);
        $result = $this->currentClientsRepository->create($dto);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->currentClientsRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'name' => 'required',
            'image' => 'required',
        ]);

        $data =  $this->currentClientsRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->currentClientsRepository->deleteById($id);
        return response()->json($result);
    }
}
