<?php


namespace App\Repositories;

use App\Models\Accounts;
use Illuminate\Support\Str;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;

class AccountsRepository implements AccountsRepositoryInterface
{
    public function getAll()
    {
        return Accounts::all();
    }

    public function getById($id)
    {
        return Accounts::find($id);
    }


    public function create(array $data)
    {
        $data['uuid']= Str::uuid();
        return Accounts::create($data);
    }

    public function update($id, array $data)
    {
        return User::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Accounts::destroy($id);
    }
}
