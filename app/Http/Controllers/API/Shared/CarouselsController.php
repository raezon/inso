<?php

namespace App\Http\Controllers\API\Shared;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Stripe\StripeAPI;
use Illuminate\Support\Facades\Storage;
use Validator;

class CarouselsController extends BaseController
{
    public $stripeAPI;
    public function __construct(CarouselsRepositoryInterface $carouselsRepositoryInterface,StripeAPI $stripeAPI)
    {
        $this->carouselsRepository = $carouselsRepositoryInterface;
        $this->stripeAPI= $stripeAPI;
    }

    public function index()
    {
        $results = $this->carouselsRepository->getAll();
        $this->stripeAPI->charge(200);
        return response()->json($results);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'link' => 'required',
        ]);

        $dto = $request->all([]);
        $image = Storage::disk('public')->put('carousels', $request->image);
        
        $dto['image']=$image;

        $result = $this->carouselsRepository->create($dto);
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->carouselsRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);
        //logic
        if($request->input('image')){
            $image = Storage::disk('public')->put('carousels', $request->image);
            $dto['image'] = $image;
        }

        $data =  $this->carouselsRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->carouselsRepository->deleteById($id);
        return response()->json($result);
    }
}
