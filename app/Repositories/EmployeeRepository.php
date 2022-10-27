<?php

namespace  App\Repositories;

use App\Interfaces\Repositories\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAll()
    {
        return Employee::all();
    }

    public function getById($id)
    {
        return Employee::find($id);
    }


    public function create(array $data)
    {
        return Employee::create($data);
    }

    public function update($id, array $data)
    {
        return  Employee::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Employee::destroy($id);
    }
}