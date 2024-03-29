<?php

namespace App\Http\Controllers\API\Shared;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\SettingsRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Validator;

class SettingsController extends BaseController
{
    public function __construct(SettingsRepositoryInterface $settingsRepositoryInterface)
    {
        $this->settingsRepository = $settingsRepositoryInterface;
    }

    public function index()
    {
        $results = $this->settingsRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $request->validate( [
            'about_us' => 'required',
            'logo' => 'required',
        ]);

        $dto = $request->all([]);
        $image = Storage::disk('public')->put('settings', $request->logo);
        $dto['logo'] = $image;

        $result = $this->settingsRepository->create($dto);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->settingsRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'about_us' => 'required',
            'logo' => 'required',
        ]);

        if ($request->input('image')) {
            $image = Storage::disk('public')->put('settings', $request->logo);
            $dto['logo'] = $image;
        }

        $data =  $this->settingsRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->settingsRepository->deleteById($id);
        return response()->json($result);
    }
}
