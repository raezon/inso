<?php


namespace App\Repositories;
use App\Interfaces\Repositories\RequestUsersRepositoryInterface;
use App\Models\RequestUsers;

class RequestUsersRepository implements  RequestUsersRepositoryInterface
{
    public function getAll()
    {
        return RequestUsers::all();
    }

    public function getById($id)
    {
        return RequestUsers::find($id);
    }


    public function create(array $data)
    {
        return RequestUsers::create($data);
    }

    public function update($id, array $data)
    {
        return RequestUsers::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return RequestUsers::destroy($id);
    }
}
