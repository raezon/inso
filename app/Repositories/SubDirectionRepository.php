<?php

namespace  App\Repositories;

use App\Interfaces\Repositories\SubDirectionRepositoryInterface;
use App\Models\SubDirection;
use Illuminate\Http\Request;

class SubDirectionRepository implements SubDirectionRepositoryInterface
{
    public function getAll()
    {
        return SubDirection::all();
    }

    public function getById($id)
    {
        return SubDirection::find($id);
    }


    public function create(array $data)
    {
    
        return SubDirection::create($data);
    }

    public function update($id, array $data)
    {
        return SubDirection::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return SubDirection::destroy($id);
    }
}