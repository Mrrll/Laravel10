<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        try {
            $post = Post::find($request->validated()['post_id']);
            $post->comments()->create([
                'message' => $request->validated()['message'],
                'user_id' => $request->validated()['user_id']
            ]);
            return redirect()
                ->back()
                ->with('message', [
                    'type' => 'success',
                    'title' => 'Éxito !',
                    'message' => 'El Comentario a sido publicado correctamente.',
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
    public function destroy(Comment $comment)
    {
        $response = Gate::inspect('delete', $comment);

        if ($response->allowed()) {
            $comment->delete();
            return back()->with('message', [
                    'type' => 'warning',
                    'title' => 'Éxito !',
                    'message' => 'El Comentario a sido eliminado correctamente.',
                ]);
        } else {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $response->message(),
            ]);
        }
    }
}
