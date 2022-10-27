<?php


namespace App\Repositories;

use App\Models\hospital;
use App\Interfaces\Repositories\HospitalRepositoryInterface;


class HospitalRepository implements HospitalRepositoryInterface
{
    public function getAll()
    {
        return hospital::all();
    }

    public function getById($id)
    {
        return hospital::find($id);
    }


    public function create(array $data)
    {
        return hospital::create($data);
    }

    public function update($id, array $data)
    {
        return hospital::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return hospital::destroy($id);
    }
}
