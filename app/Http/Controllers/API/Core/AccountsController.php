<?php

namespace App\Http\Controllers\API\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Models\Comercial;
use Illuminate\Support\Facades\Storage;
use Validator;

class AccountsController extends BaseController
{
    public function __construct(AccountsRepositoryInterface $accountsRepositoryInterface)
    {
        $this->accountsRepository = $accountsRepositoryInterface;
    }

    public function index()
    {
        $results = $this->accountsRepository->getAll();

        return response()->json($results);
    }

    public function store(Request $request)
    {
   
        $request->validate( [
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required',
            'addresse' => 'required',
            'couples' => 'required',
            'childrens' => 'required',
            'pourcent' => 'required',
            'age'=>'required',
            'gender'=> 'required',
            'type' => 'required',
            'card_id' => 'required',
            'bearerToken'=>'required'
        ]);

        $token = $request->input('bearerToken');

        // Retrieve the account based on the token
        $comercial = Comercial::where('api_token', $token)->first();
        
        $dto = $request->all([]);
        $image = Storage::disk('public')->put('accounts', $request->card_id);
        $dto['card_id'] = $image;

        if($comercial){
            $dto['comercial_id'] = $comercial->id;
            $result = $this->accountsRepository->create($dto);
            return response()->json($result);
        }

        return $this->sendError('Invalid token');
    }
    public function findOneByUuid($uuid)
    {
        $result = $this->accountsRepository->getByUuid($uuid);
        $result['couples']= (json_decode($result['couples'], true))?array_values(json_decode($result['couples'],true)):[];
        $result['childrens'] = (json_decode($result['childrens'], true)) ? array_values(json_decode($result['childrens'], true)) : [];
        return response()->json($result);
    }

    public function show($id)
    {
        $result = $this->accountsRepository->getById($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {

        $record = $request->only([
            'id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required',
            'addresse' => 'required',
            'type' => 'required',
            'card_id' => 'required',
        ]);
        if ($request->input('image')) {
            $image = Storage::disk('public')->put('accounts', $request->card_id);
            $dto['card_id'] = $image;
        }
        $data =  $this->accountsRepository->update($id, $record);

        if ($data)
            return response()->json("updated succefuly");
        return response()->json("not updated");
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->accountsRepository->deleteById($id);
        return response()->json($result);
    }
}
