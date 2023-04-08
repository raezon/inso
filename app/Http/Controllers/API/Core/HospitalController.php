<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Interfaces\Repositories\HospitalRepositoryInterface;
use App\Models\hospital;
use Illuminate\Support\Facades\Storage;
use Validator;

class HospitalController extends BaseController
{
    public function __construct(HospitalRepositoryInterface $hospitalRepositoryInterface)
    {
        $this->hospitalRepository = $hospitalRepositoryInterface;
    }

 

    public function store(Request $request)
    {

        $request->validate( [
            'name' => 'required',
            'image' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'speciality_id' => 'required',
        ]);

        $dto = $request->all([]);
        $image = Storage::disk('public')->put('hospitals', $request->image);
        //kind of factory think on refactoring it
        $hospital=new hospital($dto);
        $hospital->addCordinates();
        $hospital->addImage($image);
       
        $result = $this->hospitalRepository->create($hospital);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->hospitalRepository->getById($id);
        dd($result->specialities[0]->name);

        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record= $request->only([
            'id' => 'required',
            'name' => 'required',
            'image' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'speciality_id' => 'required',
        ]);
  
        if ($request->input('image')) {
            $image = Storage::disk('public')->put('hospitals', $request->image);
            
        }
      
        //need factory
        $hospital = $this->hospitalRepository->getById($id);
        $hospital::factoryUpdate($hospital,$request,$image);
        $data =  $this->hospitalRepository->update($hospital);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->hospitalRepository->deleteById($id);
        return response()->json($result);
    }
}
