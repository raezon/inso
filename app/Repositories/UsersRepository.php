<?php


namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;

class UsersRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::find($id);
    }


    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        return User::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return User::destroy($id);
    }
}


