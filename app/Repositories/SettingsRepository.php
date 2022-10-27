<?php


namespace App\Repositories;
use App\Interfaces\Repositories\SettingsRepositoryInterface;
use App\Models\Settings;

class SettingsRepository implements SettingsRepositoryInterface
{
    public function getAll()
    {
        return Settings::all();
    }

    public function getById($id)
    {
        return Settings::find($id);
    }


    public function create(array $data)
    {
        return Settings::create($data);
    }

    public function update($id, array $data)
    {
        return Settings::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Settings::destroy($id);
    }
}
