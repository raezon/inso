<?php

namespace  App\Repositories;

use App\Interfaces\Repositories\OrderMissionRepositoryInterface;
use App\Models\MissionOrder;
use Illuminate\Http\Request;

class OrderMissionRepository implements OrderMissionRepositoryInterface
{
    public function getAll()
    {
        return MissionOrder::all();
    }

    public function getById($id)
    {
        return MissionOrder::find($id);
    }


    public function create(array $data)
    {
        return MissionOrder::create($data);
    }

    public function update($id, array $data)
    {
        return MissionOrder::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return MissionOrder::destroy($id);
    }
}