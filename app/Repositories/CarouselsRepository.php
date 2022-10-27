<?php


namespace App\Repositories;

use App\Models\Carousels;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use Illuminate\Http\Request;


class CarouselsRepository implements CarouselsRepositoryInterface
{
    public function getAll()
    {
        return Carousels::all();
    }

    public function getById($id)
    {
        return Carousels::find($id);
    }


    public function create(array $data)
    {
        return Carousels::create($data);
    }

    public function update($id, array $data)
    {
        return Carousels::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Carousels::destroy($id);
    }
}
