<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headName = ['#','Name','Email','Roles','Verified','Date','Options'];
        $users = User::orderBy('id')->paginate(10);
        return view('admin.users.index', compact('users','headName'));
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
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        $campos = [
            [
                'name' => 'name',
                'label' => 'User name :',
                'type' => 'text',
                'placeholder' => 'User name',
                'value' => old('name', $user->name)
            ],
            [
                'name' => 'email',
                'label' => 'Email :',
                'type' => 'email',
                'placeholder' => 'test@example.com',
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
        $buttons = [
            [
                'title' => 'Editar Usuario',
                'color' => 'primary',
                'second_title'=> 'Volver',
                'second_color'=> 'danger'
            ]
        ];
        return view('admin.users.edit', compact('user','campos','buttons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
