<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class UserPolicy
{
    use HandlesAuthorization;

    private const AUTHORIZED_USER_EMAIL = '123@123.com';

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->email === self::AUTHORIZED_USER_EMAIL;
    }

    public function view(AuthUser $authUser, User $user): bool
    {
        return $this->isAuthorizedUser($authUser);
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->email === self::AUTHORIZED_USER_EMAIL;
    }

    public function update(AuthUser $authUser, User $user): bool
    {
        return $this->canManageAnotherUser($authUser, $user);
    }

    public function delete(AuthUser $authUser, User $user): bool
    {
        return $this->canManageAnotherUser($authUser, $user);
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return false;
    }

    public function restore(AuthUser $authUser, User $user): bool
    {
        return false;
    }

    public function forceDelete(AuthUser $authUser): bool
    {
        return false;
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return false;
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return false;
    }

    public function replicate(AuthUser $authUser, User $user): bool
    {
        return false;
    }

    public function reorder(AuthUser $authUser): bool
    {
        return false;
    }

    private function isAuthorizedUser(AuthUser $authUser): bool
    {
        return $authUser->email === self::AUTHORIZED_USER_EMAIL;
    }

    private function canManageAnotherUser(AuthUser $authUser, User $user): bool
    {
        return $this->isAuthorizedUser($authUser) && ! $user->is($authUser);
    }
}
