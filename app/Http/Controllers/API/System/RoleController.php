<?php

namespace App\Http\Controllers\API\System;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController as BaseController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use PhpParser\Node\Stmt\Catch_;

class RoleController extends BaseController
{

    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $all_users_with_all_their_roles = User::with('roles')->get();

        $roles = Role::orderBy('id', 'DESC')->paginate(5);
      
        return response()->json($all_users_with_all_their_roles);
    }



    public function store(Request $request)
    {
      

        try {
            $request->validate( [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
        } catch (\Throwable $th) {
            return response()->json('Role already exist');
        }

        return $this->sendResponse('', 'Role created successfully');

    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return $this->sendResponse(compact('role', 'rolePermissions'), 'role');
    }


    public function update(Request $request, $id)
    {
        $request->validate( [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return $this->sendResponse(compact('role', 'permission', 'rolePermissions'), 'role updated');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();

        return response()->json('Role deleted successfully');
    }
}