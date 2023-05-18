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


    public function create(array $data)
    {
        return Partner::create($data);
    }

    public function update($id, array $data)
    {
        return Partner::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Partner::destroy($id);
    }
}
