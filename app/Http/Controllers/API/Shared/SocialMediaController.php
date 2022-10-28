<?php

namespace App\Http\Controllers\API\Shared;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\SocialMediaRepositoryInterface;
use Validator;

class SocialMediaController extends BaseController
{
    public function __construct(SocialMediaRepositoryInterface $socialMediaRepositoryInterface)
    {
        $this->socialMediaRepository = $socialMediaRepositoryInterface;
    }

    public function index()
    {
        $results = $this->socialMediaRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
        ]);

        $dto = $request->all([]);
        $result = $this->socialMediaRepository->create($dto);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->socialMediaRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'name' => 'required',
            'link' => 'required',
        ]);

        $data =  $this->socialMediaRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->socialMediaRepository->deleteById($id);
        return response()->json($result);
    }
}
