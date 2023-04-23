<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasRolesAndPermissions
{
    /**
     * @return mixed
     */
    // Relación muchos a muchos
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    /**
     * @return mixed
     */
    // Relación muchos a muchos
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    // Asegurarse que el usuario tenga un rol para las rutas.
    public function hasRole($role)
    {
        // Chequeo si una lista de roles.
        if (strpos($role, ',') !== false) {
            $listOfRoles = explode(',', $role);

            foreach ($listOfRoles as $role) {
                if ($this->roles->contains('slug',$role)) {
                    return true;
                }
            }
        } elseif ($this->roles->contains('slug',$role)) {
            return true;
        }

       return false;
    }
    public function isAdmin()
    {
        if ($this->roles->contains('slug','admin')) {
            return true;
        }
    }
}
