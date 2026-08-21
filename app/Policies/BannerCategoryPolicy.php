<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BannerCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerCategoryPolicy
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
        return $user->can('view_any_banner::category');
    }

    /**
     * Determina se o usuário pode visualizar o modelo específico.
     *
     * @param User $user
     * @param BannerCategory $bannerCategory
     * @return bool
     */
    public function view(User $user, BannerCategory $bannerCategory): bool
    {
        return $user->can('view_banner::category');
    }

    /**
     * Determina se o usuário pode criar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_banner::category');
    }

    /**
     * Determina se o usuário pode atualizar o modelo específico.
     *
     * @param User $user
     * @param BannerCategory $bannerCategory
     * @return bool
     */
    public function update(User $user, BannerCategory $bannerCategory): bool
    {
        return $user->can('update_banner::category');
    }

    /**
     * Determina se o usuário pode deletar o modelo específico.
     *
     * @param User $user
     * @param BannerCategory $bannerCategory
     * @return bool
     */
    public function delete(User $user, BannerCategory $bannerCategory): bool
    {
        return $user->can('delete_banner::category');
    }

    /**
     * Determina se o usuário pode deletar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_banner::category');
    }

    /**
     * Determina se o usuário pode deletar permanentemente o modelo específico.
     *
     * @param User $user
     * @param BannerCategory $bannerCategory
     * @return bool
     */
    public function forceDelete(User $user, BannerCategory $bannerCategory): bool
    {
        return $user->can('force_delete_banner::category');
    }

    /**
     * Determina se o usuário pode deletar permanentemente múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_banner::category');
    }

    /**
     * Determina se o usuário pode restaurar o modelo específico.
     *
     * @param User $user
     * @param BannerCategory $bannerCategory
     * @return bool
     */
    public function restore(User $user, BannerCategory $bannerCategory): bool
    {
        return $user->can('restore_banner::category');
    }

    /**
     * Determina se o usuário pode restaurar múltiplos modelos.
     *
     * @param User $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_banner::category');
    }

    /**
     * Determina se o usuário pode replicar o modelo específico.
     *
     * @param User $user
     * @param BannerCategory $bannerCategory
     * @return bool
     */
    public function replicate(User $user, BannerCategory $bannerCategory): bool
    {
        return $user->can('replicate_banner::category');
    }

    /**
     * Determina se o usuário pode reordenar modelos.
     *
     * @param User $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_banner::category');
    }
}
