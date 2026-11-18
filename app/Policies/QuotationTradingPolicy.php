<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\QuotationTrading;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class QuotationTradingPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:QuotationTrading');
    }

    public function view(AuthUser $authUser, QuotationTrading $quotationTrading): bool
    {
        return $authUser->can('View:QuotationTrading');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:QuotationTrading');
    }

    public function update(AuthUser $authUser, QuotationTrading $quotationTrading): bool
    {
        return $authUser->can('Update:QuotationTrading');
    }

    public function delete(AuthUser $authUser, QuotationTrading $quotationTrading): bool
    {
        return $authUser->can('Delete:QuotationTrading');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:QuotationTrading');
    }

    public function restore(AuthUser $authUser, QuotationTrading $quotationTrading): bool
    {
        return $authUser->can('Restore:QuotationTrading');
    }

    public function forceDelete(AuthUser $authUser, QuotationTrading $quotationTrading): bool
    {
        return $authUser->can('ForceDelete:QuotationTrading');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:QuotationTrading');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:QuotationTrading');
    }

    public function replicate(AuthUser $authUser, QuotationTrading $quotationTrading): bool
    {
        return $authUser->can('Replicate:QuotationTrading');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:QuotationTrading');
    }
}
