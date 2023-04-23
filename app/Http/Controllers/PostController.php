<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->whereNotNull('published')->paginate(10);
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try {
            $request->merge(['slug' => Str::slug($request['title'], '-')]);
            Post::create($request->all());
            return redirect()
                ->route('blog.mypost')
                ->with('message', [
                    'type' => 'success',
                    'title' => 'Éxito !',
                    'message' => 'El post a sido guardado correctamente.',
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
    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $response = Gate::inspect('edit', $post);

        if ($response->allowed()) {
            $categories = Category::all();
            return view('blog.edit', compact(['post', 'categories']));
        } else {
            return redirect()->route('blog.mypost')->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $response->message(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        try {

            $response = Gate::inspect('update', $post);

            if ($response->allowed()) {
                $request->merge(['slug' => Str::slug($request['title'], '-')]);
                $post->update($request->all());
                return redirect()
                    ->route('blog.mypost')
                    ->with('message', [
                        'type' => 'info',
                        'title' => 'Éxito !',
                        'message' =>
                            'El post a sido actualizado correctamente.',
                    ]);
            } else {
                return redirect()
                    ->route('blog.mypost')
                    ->with('message', [
                        'type' => 'danger',
                        'title' => 'Error !',
                        'message' => $response->message(),
                    ]);
            }
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
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect()
                ->route('blog.mypost')
                ->with('message', [
                    'type' => 'warning',
                    'title' => 'Éxito !',
                    'message' => 'El post a sido eliminado correctamente.',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
    public function showmypost()
    {
        $headName = [
            '#',
            'Title',
            'Slug',
            'Body',
            'Category',
            'Author',
            'Published',
            'Date',
            'Options',
        ];
        switch (auth()->user()->roles()->first()->slug) {
            case 'admin':
            case 'manager':
            case 'editor':
                $posts = Post::orderBy('id', 'desc')->paginate(10);
                break;
                default:
                $posts = Post::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->paginate(10);
                break;
        }
        return view('blog.mypost', compact('posts', 'headName'));
    }
}
