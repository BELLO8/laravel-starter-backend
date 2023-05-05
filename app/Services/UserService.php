<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

trait UserService
{
    public function userIdByRole($id, $role)
    {
        try {
            $id =  DB::table('users')->join('roles_users', 'users.id', '=', 'roles_users.user_id')
                ->join('roles', 'roles.id', '=', 'roles_users.role_id')
                ->select('users.id')->where('roles.role', $role)
                ->where('users.id', $id)
                ->get();
            return $id;
        } catch (\Throwable $th) {
            return static::sendError(('INTERNAL_SERVER_ERROR'), [], 500);
        }
    }
}
