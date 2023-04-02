<?php


namespace App\Repositories;

use App\Interfaces\Repositories\UniversityRepositoryInterface;
use App\Models\University;

class UniversityRepository implements UniversityRepositoryInterface
{
    public function getAll()
    {
        return University::paginate(8);
    }

    public function getById($id)
    {
        return University::find($id);
    }


    public function create(object $university)
    {
        return $university->save();
    }

    public function update(object $university)
    {
        return $university->save();
    }

    public function deleteById($id)
    {
        return University::destroy($id);
    }
}
