<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('users.profile');
    }
    public function store(ProfileRequest $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $profile = new Profile($request->all());
            $user->profile()->save($profile);
            return redirect()
                ->route('profile.edit')
                ->with('message', [
                    'type' => 'success',
                    'title' => 'Éxito !',
                    'message' => 'El perfil a sido guardado correctamente.',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
    public function edit()
    {
        $profile = auth()->user()->profile;
        return view('users.profile', compact('profile'));

    }
    public function update(ProfileRequest $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $profile = $user->profile;
            $profile->update($request->all());
            return back()->with('message', [
                'type' => 'success',
                'title' => 'Éxito !',
                'message' => 'El perfil a sido actualizado correctamente.',
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
