<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Lang;

class CommentPolicy
{
    /**
    * Perform pre-authorization checks.
    */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $comment): response
    {
        $response = false;
        if ($user->roles->contains('slug', 'manager')) {
            // Si el usuario tiene el role editor
            $response = true;
        } elseif ($comment->user_id == $user->id) {
            // Si el usuario es el propietario del post
            $response = true;
        }
        return $response
            ? Response::allow()
            : Response::deny(
                Lang::get(
                    'You do not have permissions to :action this :model.',
                    ['action' => 'eliminar', 'model' => 'Comentario']
                )
            );
    }
}
