<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headName = ['#','Name','Email','Roles','Permissions','Verified','Date','Options'];
        $users = User::orderBy('id')->paginate(10);
        return view('admin.users.index', compact('users','headName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $fields = [
            [
                'id' => 'username',
                'name' => 'name',
                'label' => 'Username :',
                'type' => 'text',
                'placeholder' => 'Username',
                'value' => old('name')
            ],
            [
                'id' => 'email',
                'name' => 'email',
                'label' => 'Email :',
                'type' => 'email',
                'placeholder' => 'email@example.com',
                'value' => old('email')
            ],
            [
                'id' => 'password',
                'name' => 'password',
                'label' => 'Password :',
                'type' => 'password',
            ],
            [
                'id' => 'repeat_password',
                'label' => 'Repeat password :',
                'type' => 'password',
            ]
        ];
        if ($request->ajax()) {
            $role = Role::where('id', $request->role_id)->first();
            $permissions = $role->permissions;
            return $permissions;
        }
        $roles = Role::all();
        return view('admin.users.create', compact('fields','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
    {
        try {

            $user = User::create($request->validated());

            if ($request->role != null) {
                $user->roles()->attach($request->validated()['role']);
            }

            if ($request->permissions != null) {
                foreach ($request->validated()['permissions'] as $permission) {
                    $user->permissions()->attach($permission);
                }
            }

            return redirect()->route('users.index')->with('message', [
                'type' => 'success',
                'title' => 'Éxito !',
                'message' => 'El Usuario a sido guardado correctamente.',
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
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        $fields = [
            [
                'id' => 'username',
                'name' => 'name',
                'label' => 'Username :',
                'type' => 'text',
                'placeholder' => 'Username',
                'value' => old('name', $user->name)
            ],
            [
                'id' => 'email',
                'name' => 'email',
                'label' => 'Email :',
                'type' => 'email',
                'placeholder' => 'email@example.com',
                'value' => old('email', $user->email)
            ],
            [
                'id' => 'password',
                'name' => 'password',
                'label' => 'Password :',
                'type' => 'password',
            ],
            [
                'id' => 'repeat_password',
                'label' => 'Repeat password :',
                'type' => 'password',
            ]
        ];
        $roles = Role::all();
        $roleuser = $user->roles->first();
        $permissionsuser = $user->permissions;
        return view('admin.users.edit', compact('user','fields','roles','roleuser','permissionsuser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        try {

            $user->update($request->validated());

            if ($request->permissions != null) {

                $user->permissions()->sync($request->validated()['permissions']);
            } else {
                $user->permissions()->detach();
            }

            if ($request->role != null) {
                $user->roles()->sync($request->validated()['role']);
            } else {
                $user->roles()->detach();
            }

            return redirect()->route('users.index')->with('message', [
                'type' => 'info',
                'title' => 'Éxito !',
                'message' => 'El Usuario a sido actualizado correctamente.',
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
    public function destroy(User $user)
    {
       try {
            $user->permissions()->detach();
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('users.index')->with('message', [
                'type' => 'warning',
                'title' => 'Éxito !',
                'message' => 'El Usuario a sido eliminado correctamente.',
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
