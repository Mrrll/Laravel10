<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Lang;

class PostPolicy
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
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }
    /**
     * Determine whether the user can edit models.
     */
    public function edit(User $user, Post $post): Response
    {
        $response = false;
        if ($post->user_id == $user->id) {
            // Si el usuario es el propietario del post
            $response = true;
        }
        return $response
                ? Response::allow()
                : Response::deny(Lang::get('You do not have permissions to :action this :model.',['action' => 'editar','model' => 'Post']));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): Response
    {
        $response = false;
        if ($user->roles->contains('slug', 'editor')) {
            // Si el usuario tiene el role editor
            $response = true;
        } elseif ($post->user_id == $user->id) {
            // Si el usuario es el propietario del post
            $response = true;
        }
        return $response
                ? Response::allow()
                : Response::deny(Lang::get('You do not have permissions to :action this :model.',['action' => 'actualizar','model' => 'Post']));

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): Response
    {
        $response = false;
        if ($post->user_id == $user->id) {
            // Si el usuario es el propietario del post
            $response = true;
        }
        return $response
                ? Response::allow()
                : Response::deny(Lang::get('You do not have permissions to :action this :model.',['action' => 'eliminar','model' => 'Post']));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        //
    }
}
