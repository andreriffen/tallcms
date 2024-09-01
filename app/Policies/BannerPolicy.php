<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Banner;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
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
        return $user->can('view_any_banner');
    }

    /**
     * Determina se o usuário pode visualizar o modelo específico.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function view(User $user, Banner $banner): bool
    {
        return $user->can('view_banner');
    }

    /**
     * Determina se o usuário pode criar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_banner');
    }

    /**
     * Determina se o usuário pode atualizar o modelo específico.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function update(User $user, Banner $banner): bool
    {
        return $user->can('update_banner');
    }

    /**
     * Determina se o usuário pode deletar o modelo específico.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function delete(User $user, Banner $banner): bool
    {
        return $user->can('delete_banner');
    }

    /**
     * Determina se o usuário pode deletar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_banner');
    }

    /**
     * Determina se o usuário pode deletar permanentemente o modelo específico.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function forceDelete(User $user, Banner $banner): bool
    {
        return $user->can('force_delete_banner');
    }

    /**
     * Determina se o usuário pode deletar permanentemente múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_banner');
    }

    /**
     * Determina se o usuário pode restaurar o modelo específico.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function restore(User $user, Banner $banner): bool
    {
        return $user->can('restore_banner');
    }

    /**
     * Determina se o usuário pode restaurar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_banner');
    }

    /**
     * Determina se o usuário pode replicar o modelo específico.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function replicate(User $user, Banner $banner): bool
    {
        return $user->can('replicate_banner');
    }

    /**
     * Determina se o usuário pode reordenar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_banner');
    }
}
