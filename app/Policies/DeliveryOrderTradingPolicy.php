<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\DeliveryOrderTrading;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class DeliveryOrderTradingPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:DeliveryOrderTrading');
    }

    public function view(AuthUser $authUser, DeliveryOrderTrading $deliveryOrderTrading): bool
    {
        return $authUser->can('View:DeliveryOrderTrading');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:DeliveryOrderTrading');
    }

    public function update(AuthUser $authUser, DeliveryOrderTrading $deliveryOrderTrading): bool
    {
        return $authUser->can('Update:DeliveryOrderTrading');
    }

    public function delete(AuthUser $authUser, DeliveryOrderTrading $deliveryOrderTrading): bool
    {
        return $authUser->can('Delete:DeliveryOrderTrading');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:DeliveryOrderTrading');
    }

    public function restore(AuthUser $authUser, DeliveryOrderTrading $deliveryOrderTrading): bool
    {
        return $authUser->can('Restore:DeliveryOrderTrading');
    }

    public function forceDelete(AuthUser $authUser, DeliveryOrderTrading $deliveryOrderTrading): bool
    {
        return $authUser->can('ForceDelete:DeliveryOrderTrading');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:DeliveryOrderTrading');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:DeliveryOrderTrading');
    }

    public function replicate(AuthUser $authUser, DeliveryOrderTrading $deliveryOrderTrading): bool
    {
        return $authUser->can('Replicate:DeliveryOrderTrading');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:DeliveryOrderTrading');
    }
}
