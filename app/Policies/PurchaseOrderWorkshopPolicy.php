<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PurchaseOrderWorkshop;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class PurchaseOrderWorkshopPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PurchaseOrderWorkshop');
    }

    public function view(AuthUser $authUser, PurchaseOrderWorkshop $purchaseOrderWorkshop): bool
    {
        return $authUser->can('View:PurchaseOrderWorkshop');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PurchaseOrderWorkshop');
    }

    public function update(AuthUser $authUser, PurchaseOrderWorkshop $purchaseOrderWorkshop): bool
    {
        return $authUser->can('Update:PurchaseOrderWorkshop');
    }

    public function delete(AuthUser $authUser, PurchaseOrderWorkshop $purchaseOrderWorkshop): bool
    {
        return $authUser->can('Delete:PurchaseOrderWorkshop');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:PurchaseOrderWorkshop');
    }

    public function restore(AuthUser $authUser, PurchaseOrderWorkshop $purchaseOrderWorkshop): bool
    {
        return $authUser->can('Restore:PurchaseOrderWorkshop');
    }

    public function forceDelete(AuthUser $authUser, PurchaseOrderWorkshop $purchaseOrderWorkshop): bool
    {
        return $authUser->can('ForceDelete:PurchaseOrderWorkshop');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PurchaseOrderWorkshop');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PurchaseOrderWorkshop');
    }

    public function replicate(AuthUser $authUser, PurchaseOrderWorkshop $purchaseOrderWorkshop): bool
    {
        return $authUser->can('Replicate:PurchaseOrderWorkshop');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PurchaseOrderWorkshop');
    }
}
