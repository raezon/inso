<?php

namespace  App\Repositories;

use App\Interfaces\Repositories\VacationRepositoryInterface;
use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationRepository implements VacationRepositoryInterface
{
    public function getAll()
    {
        return Vacation::all();
    }

    public function getById($id)
    {
        return Vacation::find($id);
    }


    public function create(array $data)
    {
        return Vacation::create($data);
    }

    public function update($id, array $data)
    {
        return Vacation::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Vacation::destroy($id);
    }
}