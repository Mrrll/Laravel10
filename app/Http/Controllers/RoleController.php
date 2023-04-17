<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {
        $headName = ['#', 'Name', 'Slug', 'Permissions', 'Date', 'Options'];
        $fields = [
            [
                'id' => 'name',
                'name' => 'name',
                'label' => 'Name :',
                'type' => 'text',
                'placeholder' => 'Name',
                'value' => old('name'),
            ],
            [
                'id' => 'slug',
                'name' => 'slug',
                'label' => 'Slug :',
                'type' => 'text',
                'placeholder' => 'Slug-example',
                'value' => old('slug'),
                'readyonly' => true,
                'disable' => true
            ],
            [
                'id' => 'permissions',
                'name' => 'permissions',
                'label' => 'Permissions :',
                'type' => 'text',
                'placeholder' => 'Permission-1, Permissions-2',
                'tags' => 'tagsinput',
                'value' => old('permissions'),
            ],
        ];
        $roles = Role::orderBy('id')->paginate(10);
        return view(
            'admin.roles.index',
            compact('roles', 'headName', 'fields')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        try {
            $listOfPermissions = explode(',', $request->permissions);
            $role = Role::create($request->only('name','slug'));
            foreach ($listOfPermissions as $permission) {
                $slug = Str::slug($request['name'].' '.$permission, '-');
                $newPermission = new Permission();
                $newPermission->name = $permission;
                $newPermission->slug = $slug;
                $newPermission->save();
                $role->permissions()->attach($newPermission);
            }
            return back()->with('message', [
                'type' => 'success',
                'title' => 'Éxito !',
                'message' => 'El Role a sido guardado correctamente.',
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {
            $listOfPermissions = explode(',', $request->permissions);
            // dump($role->permissions);
            $role->update($request->only(['name','slug']));
            foreach ($listOfPermissions as $permission) {
                $slug = Str::slug($request['name'].' '.$permission, '-');
                $newPermission = new Permission();
                $newPermission->name = $permission;
                $newPermission->slug = $slug;
                $newPermission->save();
                $role->permissions()->sync($newPermission);
            }
            return back()->with('message', [
                'type' => 'info',
                'title' => 'Éxito !',
                'message' => 'El Role a sido actualizado correctamente.',
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $role->permissions()->delete();
            $role->delete();
            return back()->with('message', [
                'type' => 'warning',
                'title' => 'Éxito !',
                'message' => 'El Role a sido eliminado correctamente.',
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
}
