<?php

namespace App\Traits;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

trait HasRolesTrait
{

    public static  function getUsersWithRole($roleName)
    {
        // Obtener el rol por su nombre
        $role = Role::where('name', $roleName)->first();

        if (!$role) {
            return []; // El rol no existe, retornar un arreglo vacío
        }

        // Obtener los IDs de los usuarios que tienen el rol específico
        $userIds = DB::table('model_has_roles')
            ->where('role_id', $role->id)
            ->pluck('model_id');

        // Obtener los usuarios con los IDs obtenidos
        $usersWithRole = self::whereIn('id', $userIds)->get();

        return $usersWithRole;
    }
}
