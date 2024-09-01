<?php

namespace App\Policies\Blog;

use App\Models\User;
use App\Models\Blog\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determina se o usuário pode visualizar qualquer modelo.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_blog::post');
    }

    /**
     * Determina se o usuário pode visualizar o modelo específico.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function view(User $user, Post $post): bool
    {
        return $user->can('view_blog::post');
    }

    /**
     * Determina se o usuário pode criar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_blog::post');
    }

    /**
     * Determina se o usuário pode atualizar o modelo específico.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function update(User $user, Post $post): bool
    {
        return $user->can('update_blog::post');
    }

    /**
     * Determina se o usuário pode deletar o modelo específico.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->can('delete_blog::post');
    }

    /**
     * Determina se o usuário pode deletar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_blog::post');
    }

    /**
     * Determina se o usuário pode deletar permanentemente o modelo específico.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return $user->can('force_delete_blog::post');
    }

    /**
     * Determina se o usuário pode deletar permanentemente múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_blog::post');
    }

    /**
     * Determina se o usuário pode restaurar o modelo específico.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function restore(User $user, Post $post): bool
    {
        return $user->can('restore_blog::post');
    }

    /**
     * Determina se o usuário pode restaurar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_blog::post');
    }

    /**
     * Determina se o usuário pode replicar o modelo específico.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function replicate(User $user, Post $post): bool
    {
        return $user->can('replicate_blog::post');
    }

    /**
     * Determina se o usuário pode reordenar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_blog::post');
    }
}
