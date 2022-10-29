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


    public function create(object $hospital)
    {
        return $hospital->save();
    }

    public function update(object $hospital)
    {
        return $hospital->save();
    }

    public function deleteById($id)
    {
        return hospital::destroy($id);
    }
}
