<?php

namespace App\Http\Controllers\API\Shared;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\CurrentClientsRepositoryInterface;
use Illuminate\Support\Facades\Storage;
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
        $request->validate( [
            'name' => 'required',
            'image' => 'required',
        ]);

        $dto = $request->all([]);
        $image = Storage::disk('public')->put('current-clients', $request->image);
        $dto['image']=$image;
        
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
            'name' => 'required',
            'image' => 'required',
        ]);

        $data =  $this->currentClientsRepository->update($id, $record);

        if ($request->input('image')) {
            $image = Storage::disk('public')->put('current-clients', $request->image);
            $dto['image'] = $image;
        }

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
