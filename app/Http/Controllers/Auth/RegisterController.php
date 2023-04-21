<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $request)
    {
        try {

            $role = count(User::all()) > 0 ? 3 : 1;
            $roles = Role::find($role);

            $user = User::create($request->validated());

            $user->roles()->attach($role);

            foreach ($roles->permissions as $permission) {
                $user->permissions()->attach($permission);
            }

            event(new Registered($user));

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('cursos.index');

        } catch (\Throwable $th) {

            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' =>
                    'Ha ocurrido un error revise los datos y vuelva a intentarlo si no se soluciona contacte con su administrador.',
            ]);
        }
    }
}
