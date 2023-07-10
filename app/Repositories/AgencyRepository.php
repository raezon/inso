<?php


namespace App\Repositories;

use App\Interfaces\Repositories\AgencyRepositoryInterface;
use App\Models\Assurance;


class AgencyRepository implements AgencyRepositoryInterface
{
    public function getAll()
    {
        return Agency::paginate(8);
    }

    public function getById($id)
    {
        return Agency::find($id);
    }


    public function create(object $agency)
    {
        return $agency->save();
    }

    public function update(object $agency)
    {
        return $agency->save();
    }

    public function deleteById($id)
    {
        return Agency::destroy($id);
    }
}
