<?php


namespace App\Repositories;

use App\Models\CurrentClients;
use App\Interfaces\Repositories\CurrentClientsRepositoryInterface;
use Illuminate\Http\Request;


class CurrentClientsRepository implements CurrentClientsRepositoryInterface
{
    public function getAll()
    {
        return CurrentClients::all();
    }

    public function getById($id)
    {
        return CurrentClients::find($id);
    }


    public function create(array $data)
    {
        return CurrentClients::create($data);
    }

    public function update($id, array $data)
    {
        return CurrentClients::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return CurrentClients::destroy($id);
    }
}
