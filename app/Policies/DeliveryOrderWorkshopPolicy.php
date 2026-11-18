<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\DeliveryOrderWorkshop;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class DeliveryOrderWorkshopPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:DeliveryOrderWorkshop');
    }

    public function view(AuthUser $authUser, DeliveryOrderWorkshop $deliveryOrderWorkshop): bool
    {
        return $authUser->can('View:DeliveryOrderWorkshop');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:DeliveryOrderWorkshop');
    }

    public function update(AuthUser $authUser, DeliveryOrderWorkshop $deliveryOrderWorkshop): bool
    {
        return $authUser->can('Update:DeliveryOrderWorkshop');
    }

    public function delete(AuthUser $authUser, DeliveryOrderWorkshop $deliveryOrderWorkshop): bool
    {
        return $authUser->can('Delete:DeliveryOrderWorkshop');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:DeliveryOrderWorkshop');
    }

    public function restore(AuthUser $authUser, DeliveryOrderWorkshop $deliveryOrderWorkshop): bool
    {
        return $authUser->can('Restore:DeliveryOrderWorkshop');
    }

    public function forceDelete(AuthUser $authUser, DeliveryOrderWorkshop $deliveryOrderWorkshop): bool
    {
        return $authUser->can('ForceDelete:DeliveryOrderWorkshop');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:DeliveryOrderWorkshop');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:DeliveryOrderWorkshop');
    }

    public function replicate(AuthUser $authUser, DeliveryOrderWorkshop $deliveryOrderWorkshop): bool
    {
        return $authUser->can('Replicate:DeliveryOrderWorkshop');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:DeliveryOrderWorkshop');
    }
}
