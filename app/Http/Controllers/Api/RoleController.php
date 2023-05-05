<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Services\HashIdService;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = RoleResource::collection(Role::all());
        return static::sendResponse($role, 'OK');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "role" => 'required|string|unique:roles'
        ]);

        if ($validator->fails()) {
            return static::sendError(('BAD_REQUEST'), $validator->errors()->toArray(), 200);
        }

        $data = $validator->validated();
        Role::create($data);
        return static::sendResponse([], 'CREATED', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find((new HashIdService())->decode($id));
        return $role ? static::sendResponse(new RoleResource($role), 'OK') : static::sendError(('NOT_FOUND'), [], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "role" => 'required|string|unique:roles,role|in:ROLE_CUSTOMER,ROLE_DRIVER,ROLE_ADMIN'
        ]);

        if ($validator->fails()) {
            return static::sendError(('BAD_REQUEST'), $validator->errors()->toArray(), 200);
        }

        $data = $validator->validated();
        $role = Role::find((new HashIdService())->decode($id));
        if ($role) {
            $role->update($data);
        }

        return $role ? static::sendResponse(new RoleResource($role), 'OK') : static::sendError(('NOT_FOUND'), [], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find((new HashIdService())->decode($id));
        if ($role) {
            $role->delete();
        }
        return $role ? static::sendResponse([], 'NO_CONTENT') : static::sendError(('NOT_FOUND'), [], 200);
    }
}
