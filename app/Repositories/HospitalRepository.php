<?php


namespace App\Repositories;

use App\Models\Hospital;
use App\Interfaces\Repositories\HospitalRepositoryInterface;


class HospitalRepository implements HospitalRepositoryInterface
{
    public function getAll()
    {
        return Hospital::all();
    }

    public function getById($id)
    {
        return Hospital::find($id);
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
        return Hospital::destroy($id);
    }
}
