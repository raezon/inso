<?php

namespace  App\Repositories;

use App\Interfaces\Repositories\DirectionRepositoryInterface;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionRepository implements DirectionRepositoryInterface
{
    public function getAll()
    {
        return Direction::all();
    }

    public function getById($id)
    {
        return Direction::find($id);
    }


    public function create(array $data)
    {
        return Direction::create($data);
    }

    public function update($id, array $data)
    {
       return Direction::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Direction::destroy($id);
    }
}