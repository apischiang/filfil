<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\CustomerTrading;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class CustomerTradingPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CustomerTrading');
    }

    public function view(AuthUser $authUser, CustomerTrading $customerTrading): bool
    {
        return $authUser->can('View:CustomerTrading');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CustomerTrading');
    }

    public function update(AuthUser $authUser, CustomerTrading $customerTrading): bool
    {
        return $authUser->can('Update:CustomerTrading');
    }

    public function delete(AuthUser $authUser, CustomerTrading $customerTrading): bool
    {
        return $authUser->can('Delete:CustomerTrading');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CustomerTrading');
    }

    public function restore(AuthUser $authUser, CustomerTrading $customerTrading): bool
    {
        return $authUser->can('Restore:CustomerTrading');
    }

    public function forceDelete(AuthUser $authUser, CustomerTrading $customerTrading): bool
    {
        return $authUser->can('ForceDelete:CustomerTrading');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CustomerTrading');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CustomerTrading');
    }

    public function replicate(AuthUser $authUser, CustomerTrading $customerTrading): bool
    {
        return $authUser->can('Replicate:CustomerTrading');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CustomerTrading');
    }
}
