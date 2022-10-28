<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\RequestUsersRepositoryInterface;
use Validator;

class RequestUsersController extends BaseController
{
    public function __construct(RequestUsersRepositoryInterface $requestUsersRepositoryInterface)
    {
        $this->requestUsersRepository = $requestUsersRepositoryInterface;
    }

    public function index()
    {
        $results = $this->requestUsersRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'card_id' => 'required',
        ]);

        $dto = $request->all([]);
        $result = $this->requestUsersRepository->create($dto);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->requestUsersRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'card_id' => 'required',
        ]);

        $data =  $this->requestUsersRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->requestUsersRepository->deleteById($id);
        return response()->json($result);
    }
}
