<?php

namespace App\Policies;

use App\Models\Training;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TrainingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_training');
    }

    public function view(User $user, Training $training): bool
    {
        return $user->can('view_any_training');
    }

    public function create(User $user): bool
    {
        return $user->can('create_training');
    }

    public function update(User $user, Training $training): bool
    {
        return $user->can('update_training');
    }

    public function delete(User $user, Training $training): bool
    {
        return $user->can('delete_training');
    }

    public function restore(User $user, Training $training): bool
    {
        return $user->can('delete_training');
    }

    public function forceDelete(User $user, Training $training): bool
    {
        return $user->can('delete_training');
    }
}
