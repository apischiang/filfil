<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\CustomerWorkshop;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class CustomerWorkshopPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CustomerWorkshop');
    }

    public function view(AuthUser $authUser, CustomerWorkshop $customerWorkshop): bool
    {
        return $authUser->can('View:CustomerWorkshop');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CustomerWorkshop');
    }

    public function update(AuthUser $authUser, CustomerWorkshop $customerWorkshop): bool
    {
        return $authUser->can('Update:CustomerWorkshop');
    }

    public function delete(AuthUser $authUser, CustomerWorkshop $customerWorkshop): bool
    {
        return $authUser->can('Delete:CustomerWorkshop');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CustomerWorkshop');
    }

    public function restore(AuthUser $authUser, CustomerWorkshop $customerWorkshop): bool
    {
        return $authUser->can('Restore:CustomerWorkshop');
    }

    public function forceDelete(AuthUser $authUser, CustomerWorkshop $customerWorkshop): bool
    {
        return $authUser->can('ForceDelete:CustomerWorkshop');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CustomerWorkshop');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CustomerWorkshop');
    }

    public function replicate(AuthUser $authUser, CustomerWorkshop $customerWorkshop): bool
    {
        return $authUser->can('Replicate:CustomerWorkshop');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CustomerWorkshop');
    }
}
