<?php


namespace App\Repositories;

use App\Models\Accounts;
use Illuminate\Support\Str;
use App\Interfaces\Repositories\AppointementRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Appointement;

class AppointementRepository implements AppointementRepositoryInterface
{
    public function getAll()
    {
        return Appointement::all();
    }

    public function getById($id)
    {
        return Appointement::find($id);
    }

    public function create(array $data)
    {
        $data['childrens']=json_encode($data['childrens'],true);
        $data['couples'] = json_encode($data['couples'], true);
        $data['patient_identity'] = json_encode($data['patient_identity'], true);
        return Appointement::create($data);
    }

    public function update($id, array $data)
    {
        return Appointement::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Appointement::destroy($id);
    }
}
