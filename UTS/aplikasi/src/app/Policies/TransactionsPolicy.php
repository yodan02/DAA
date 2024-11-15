<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Transactions;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_transactions');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Transactions $transactions): bool
    {
        return $user->can('view_transactions');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_transactions');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Transactions $transactions): bool
    {
        return $user->can('update_transactions');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Transactions $transactions): bool
    {
        return $user->can('delete_transactions');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_transactions');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Transactions $transactions): bool
    {
        return $user->can('{{ ForceDelete }}');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Transactions $transactions): bool
    {
        return $user->can('{{ Restore }}');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('{{ RestoreAny }}');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Transactions $transactions): bool
    {
        return $user->can('{{ Replicate }}');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('{{ Reorder }}');
    }
}
