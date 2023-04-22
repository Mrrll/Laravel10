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
        $fields = [
            [
                'id' => 'title',
                'name' => 'title',
                'label' => 'Title :',
                'type' => 'text',
                'placeholder' => 'Programador web',
                'value' => old('title'),
            ],
            [
                'id' => 'biography',
                'name' => 'biography',
                'label' => 'Biography :',
                'type' => 'textarea',
                'placeholder' => 'Your Text',
                'value' => old('biography'),
                'textareacols' => '',
                'textarearow' => 3
            ],
            [
                'id' => 'website',
                'name' => 'website',
                'label' => 'Website :',
                'type' => 'text',
                'placeholder' => 'http://localhost:8000',
                'value' => old('website'),
            ],
            [
                'id' => 'user_id',
                'name' => 'user_id',
                'label' => '',
                'type' => 'hidden',
                'placeholder' => '',
                'value' => auth()->user()->id,
            ],
        ];
        return view('admin.profiles.create', compact('fields'));
    }
    public function store(ProfileRequest $request)
    {
        try {
            $profile = Profile::create($request->all());

            return redirect()->route('profile.edit', $profile)->with('message', [
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
    public function edit(Profile $profile)
    {
        $fields = [
            [
                'id' => 'title',
                'name' => 'title',
                'label' => 'Title :',
                'type' => 'text',
                'placeholder' => 'Programador web',
                'value' => old('title', $profile->title),
            ],
            [
                'id' => 'biography',
                'name' => 'biography',
                'label' => 'Biography :',
                'type' => 'textarea',
                'placeholder' => 'Your Text',
                'value' => old('biography', $profile->biography),
                'textareacols' => '',
                'textarearow' => 3
            ],
            [
                'id' => 'website',
                'name' => 'website',
                'label' => 'Website :',
                'type' => 'text',
                'placeholder' => 'http://localhost:8000',
                'value' => old('website', $profile->website),
            ],
            [
                'id' => 'user_id',
                'name' => 'user_id',
                'label' => '',
                'type' => 'hidden',
                'placeholder' => '',
                'value' => $profile->user_id,
            ],
        ];
        return view('admin.profiles.edit', compact('profile', 'fields'));
    }
    public function update(ProfileRequest $request, Profile $profile)
    {
        try {
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
