<?php

namespace App\Policies\Blog;

use App\Models\User;
use App\Models\Blog\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
        return $user->can('view_any_blog::category');
    }

    /**
     * Determina se o usuário pode visualizar o modelo específico.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function view(User $user, Category $category): bool
    {
        return $user->can('view_blog::category');
    }

    /**
     * Determina se o usuário pode criar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_blog::category');
    }

    /**
     * Determina se o usuário pode atualizar o modelo específico.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function update(User $user, Category $category): bool
    {
        return $user->can('update_blog::category');
    }

    /**
     * Determina se o usuário pode deletar o modelo específico.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->can('delete_blog::category');
    }

    /**
     * Determina se o usuário pode deletar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_blog::category');
    }

    /**
     * Determina se o usuário pode deletar permanentemente o modelo específico.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function forceDelete(User $user, Category $category): bool
    {
        return $user->can('force_delete_blog::category');
    }

    /**
     * Determina se o usuário pode deletar permanentemente múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_blog::category');
    }

    /**
     * Determina se o usuário pode restaurar o modelo específico.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function restore(User $user, Category $category): bool
    {
        return $user->can('restore_blog::category');
    }

    /**
     * Determina se o usuário pode restaurar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_blog::category');
    }

    /**
     * Determina se o usuário pode replicar o modelo específico.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function replicate(User $user, Category $category): bool
    {
        return $user->can('replicate_blog::category');
    }

    /**
     * Determina se o usuário pode reordenar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_blog::category');
    }
}
