<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
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
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $user->roles()->attach($role);

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
