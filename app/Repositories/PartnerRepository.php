<?php


namespace App\Repositories;

use App\Interfaces\Repositories\PartnerRepositoryInterface;
use App\Models\Partner;

class PartnerRepository implements PartnerRepositoryInterface
{
    public function getAll()
    {
        return Partner::paginate(8);
    }

    public function getById($id)
    {
        return Partner::find($id);
    }


    public function create(object $Partner)
    {
        return $Partner->save();
    }

    public function update(object $Partner)
    {
        return $Partner->save();
    }

    public function deleteById($id)
    {
        return Partner::destroy($id);
    }
}
