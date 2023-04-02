<?php


namespace App\Repositories;

use App\Interfaces\Repositories\CribRepositoryInterface;
use App\Models\Crib;

class CribRepository implements CribRepositoryInterface
{
    public function getAll()
    {
        return Crib::paginate(8);
    }

    public function getById($id)
    {
        return Crib::find($id);
    }


    public function create(object $crib)
    {
        return $crib->save();
    }

    public function update(object $crib)
    {
        return $crib->save();
    }

    public function deleteById($id)
    {
        return Crib::destroy($id);
    }
}
