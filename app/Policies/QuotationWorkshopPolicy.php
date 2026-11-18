<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\QuotationWorkshop;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class QuotationWorkshopPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:QuotationWorkshop');
    }

    public function view(AuthUser $authUser, QuotationWorkshop $quotationWorkshop): bool
    {
        return $authUser->can('View:QuotationWorkshop');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:QuotationWorkshop');
    }

    public function update(AuthUser $authUser, QuotationWorkshop $quotationWorkshop): bool
    {
        return $authUser->can('Update:QuotationWorkshop');
    }

    public function delete(AuthUser $authUser, QuotationWorkshop $quotationWorkshop): bool
    {
        return $authUser->can('Delete:QuotationWorkshop');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:QuotationWorkshop');
    }

    public function restore(AuthUser $authUser, QuotationWorkshop $quotationWorkshop): bool
    {
        return $authUser->can('Restore:QuotationWorkshop');
    }

    public function forceDelete(AuthUser $authUser, QuotationWorkshop $quotationWorkshop): bool
    {
        return $authUser->can('ForceDelete:QuotationWorkshop');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:QuotationWorkshop');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:QuotationWorkshop');
    }

    public function replicate(AuthUser $authUser, QuotationWorkshop $quotationWorkshop): bool
    {
        return $authUser->can('Replicate:QuotationWorkshop');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:QuotationWorkshop');
    }
}
