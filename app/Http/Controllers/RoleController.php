<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {
        $headName = ['#', 'Name', 'Slug', 'Date', 'Options'];
        $fields = [
            [
                'id' => 'name',
                'name' => 'name',
                'label' => 'Name :',
                'type' => 'text',
                'placeholder' => 'Name',
                'value' => old('name', $role->name),
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
            $request->merge(['slug' => Str::slug($request['name'], '-')]);
            Role::create($request->all());
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
            $request->merge(['slug' => Str::slug($request['name'], '-')]);
            $role->update($request->all());
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
