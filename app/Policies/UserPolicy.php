<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determina se o usuário pode visualizar qualquer modelo.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_user');
    }

    /**
     * Determina se o usuário pode visualizar o modelo específico.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function view(User $user): bool
    {
        return $user->can('view_user');
    }

    /**
     * Determina se o usuário pode criar modelos.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_user');
    }

    /**
     * Determina se o usuário pode atualizar o modelo específico.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function update(User $user): bool
    {
        return $user->can('update_user');
    }

    /**
     * Determina se o usuário pode deletar o modelo específico.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function delete(User $user): bool
    {
        return $user->can('delete_user');
    }

    /**
     * Determina se o usuário pode deletar múltiplos modelos.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_user');
    }

    /**
     * Determina se o usuário pode deletar permanentemente o modelo específico.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDelete(User $user): bool
    {
        return $user->can('force_delete_user');
    }

    /**
     * Determina se o usuário pode deletar permanentemente múltiplos modelos.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_user');
    }

    /**
     * Determina se o usuário pode restaurar o modelo específico.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restore(User $user): bool
    {
        return $user->can('restore_user');
    }

    /**
     * Determina se o usuário pode restaurar múltiplos modelos.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_user');
    }

    /**
     * Determina se o usuário pode replicar o modelo específico.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function replicate(User $user): bool
    {
        return $user->can('replicate_user');
    }

    /**
     * Determina se o usuário pode reordenar modelos.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_user');
    }
}
