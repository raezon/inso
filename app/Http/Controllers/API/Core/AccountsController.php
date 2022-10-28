<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use Validator;

class AccountsController extends BaseController
{
    public function __construct(AccountsRepositoryInterface $accountsRepositoryInterface)
    {
        $this->accountsRepository = $accountsRepositoryInterface;
    }

    public function index()
    {
        $results = $this->accountsRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {
   
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required',
            'addresse' => 'required',
            'type' => 'required',
            'card_id' => 'required',
        ]);

        $dto = $request->all([]);
        $result = $this->accountsRepository->create($dto);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->accountsRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required',
            'addresse' => 'required',
            'type' => 'required',
            'card_id' => 'required',
        ]);

        $data =  $this->accountsRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->accountsRepository->deleteById($id);
        return response()->json($result);
    }
}
