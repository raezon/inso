<?php

namespace App\Http\Controllers\API\System;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Validator;

class UserController extends BaseController
{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepository = $userRepositoryInterface;
    }

    public function index()
    {
        $results = $this->userRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validated) {
            $dto = $request->all([]);
            $result = $this->userRepository->create($dto);
            return response()->json($result);
        }
        return redirect()->back()->withErrors($validated);
    }

    public function show($id)
    {
        $result = $this->userRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data =  $this->userRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->userRepository->deleteById($id);
        return response()->json($result);
    }
}
