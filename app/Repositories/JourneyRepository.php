<?php


namespace App\Repositories;

use App\Interfaces\Repositories\JourneyRepositoryInterface;
use App\Models\Journey;

class JourneyRepository implements JourneyRepositoryInterface
{
    public function getAll()
    {
        return Journey::paginate(8);
    }

    public function getById($id)
    {
        return Journey::find($id);
    }


    public function create(object $journey)
    {
        return $journey->save();
    }

    public function update(object $journey)
    {
        return $journey->save();
    }

    public function deleteById($id)
    {
        return Journey::destroy($id);
    }
}
