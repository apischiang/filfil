<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PurchaseOrderTrading;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class PurchaseOrderTradingPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PurchaseOrderTrading');
    }

    public function view(AuthUser $authUser, PurchaseOrderTrading $purchaseOrderTrading): bool
    {
        return $authUser->can('View:PurchaseOrderTrading');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PurchaseOrderTrading');
    }

    public function update(AuthUser $authUser, PurchaseOrderTrading $purchaseOrderTrading): bool
    {
        return $authUser->can('Update:PurchaseOrderTrading');
    }

    public function delete(AuthUser $authUser, PurchaseOrderTrading $purchaseOrderTrading): bool
    {
        return $authUser->can('Delete:PurchaseOrderTrading');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:PurchaseOrderTrading');
    }

    public function restore(AuthUser $authUser, PurchaseOrderTrading $purchaseOrderTrading): bool
    {
        return $authUser->can('Restore:PurchaseOrderTrading');
    }

    public function forceDelete(AuthUser $authUser, PurchaseOrderTrading $purchaseOrderTrading): bool
    {
        return $authUser->can('ForceDelete:PurchaseOrderTrading');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PurchaseOrderTrading');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PurchaseOrderTrading');
    }

    public function replicate(AuthUser $authUser, PurchaseOrderTrading $purchaseOrderTrading): bool
    {
        return $authUser->can('Replicate:PurchaseOrderTrading');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PurchaseOrderTrading');
    }
}
