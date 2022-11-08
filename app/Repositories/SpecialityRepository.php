<?php


namespace App\Repositories;
use App\Interfaces\Repositories\SpecialityRepositoryInterface;
use App\Models\Speciality;

class SpecialityRepository implements SpecialityRepositoryInterface
{
    public function findByPaginate(){
        return Speciality::paginate(8);
    }

    public function getAll()
    {
        return Speciality::all();
    }

    public function getById($id)
    {
        return Speciality::find($id);
    }


    public function create(array $data)
    {
        return Speciality::create($data);
    }

    public function update($id, array $data)
    {
        return Speciality::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Speciality::destroy($id);
    }
}
