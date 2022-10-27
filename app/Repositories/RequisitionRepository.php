<?php

namespace  App\Repositories;

use App\Interfaces\Repositories\RequisitionRepositoryInterface;
use App\Models\Requisition;
use Illuminate\Http\Request;

class RequisitionRepository implements RequisitionRepositoryInterface
{
    public function getAll()
    {
        return Requisition::all();
    }

    public function getById($id)
    {
        return Requisition::find($id);
    }


    public function create(array $data)
    {

        return Requisition::create($data);
    }

    public function update($id, array $data)
    {
        return Requisition::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Requisition::destroy($id);
    }
}