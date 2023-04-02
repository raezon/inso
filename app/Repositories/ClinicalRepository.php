<?php


namespace App\Repositories;

use App\Interfaces\Repositories\ClinicalRepositoryInterface;
use App\Models\Clinical;


class ClinicalRepository implements ClinicalRepositoryInterface
{
    public function getAll()
    {
        return Clinical::paginate(8);
    }

    public function getById($id)
    {
        return Clinical::find($id);
    }


    public function create(object $clinical)
    {
        return $clinical->save();
    }

    public function update(object $clinical)
    {
        return $clinical->save();
    }

    public function deleteById($id)
    {
        return Clinical::destroy($id);
    }
}
