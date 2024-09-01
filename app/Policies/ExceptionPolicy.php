<?php

namespace App\Policies;

use App\Models\User;
use BezhanSalleh\FilamentExceptions\Models\Exception;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExceptionPolicy
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
        return $user->can('view_any_exception');
    }

    /**
     * Determina se o usuário pode visualizar o modelo específico.
     *
     * @param User $user
     * @param Exception $exception
     * @return bool
     */
    public function view(User $user, Exception $exception): bool
    {
        return $user->can('view_exception');
    }

    /**
     * Determina se o usuário pode criar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_exception');
    }

    /**
     * Determina se o usuário pode atualizar o modelo específico.
     *
     * @param User $user
     * @param Exception $exception
     * @return bool
     */
    public function update(User $user, Exception $exception): bool
    {
        return $user->can('update_exception');
    }

    /**
     * Determina se o usuário pode deletar o modelo específico.
     *
     * @param User $user
     * @param Exception $exception
     * @return bool
     */
    public function delete(User $user, Exception $exception): bool
    {
        return $user->can('delete_exception');
    }

    /**
     * Determina se o usuário pode deletar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_exception');
    }

    /**
     * Determina se o usuário pode deletar permanentemente o modelo específico.
     *
     * @param User $user
     * @param Exception $exception
     * @return bool
     */
    public function forceDelete(User $user, Exception $exception): bool
    {
        return $user->can('force_delete_exception');
    }

    /**
     * Determina se o usuário pode deletar permanentemente múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_exception');
    }

    /**
     * Determina se o usuário pode restaurar o modelo específico.
     *
     * @param User $user
     * @param Exception $exception
     * @return bool
     */
    public function restore(User $user, Exception $exception): bool
    {
        return $user->can('restore_exception');
    }

    /**
     * Determina se o usuário pode restaurar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_exception');
    }

    /**
     * Determina se o usuário pode replicar o modelo específico.
     *
     * @param User $user
     * @param Exception $exception
     * @return bool
     */
    public function replicate(User $user, Exception $exception): bool
    {
        return $user->can('replicate_exception');
    }

    /**
     * Determina se o usuário pode reordenar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_exception');
    }
}
