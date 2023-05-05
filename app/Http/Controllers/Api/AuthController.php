<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string|unique:users,phone_number',
            'role' => 'required|exists:roles,role',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return static::sendError('BAD_REQUEST', $validator->errors()->toArray(), 400);
        }

        $role = Role::where('role', $request->role)->get();
        $roleId = json_decode($role)[0];

        $data = $validator->validated();

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        if ($user) {
            $user->roles()->attach($roleId->id);
        }

        return static::sendResponse([], 'CREATED', 201);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $res['token'] =  $user->createToken('SanctumAPI')->plainTextToken;
            $res['utilisateur'] =  new UserResource(Auth::user());
            return static::sendResponse($res, 'OK', 201);
        } else {
            return static::sendError('UNAUTHORIZED', [], 401);
        }
    }

    public function logOut()
    {
        auth()->user()->tokens()->delete();
        return response()->json(["message" => "LogOut successful !!!"]);
    }

    public function profile()
    {
        return static::sendResponse(new UserResource(Auth::user()), 'OK');
    }
}
