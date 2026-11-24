<?php

namespace App\Policies;

use App\Enums\RegistrationStatus;
use App\Models\Registration;
use App\Models\User;

class RegistrationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->canReviewPsb() || $user->isApplicant();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Registration $registration): bool
    {
        if ($user->canReviewPsb()) {
            return true;
        }

        return $user->isApplicant() && $registration->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isApplicant() || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Registration $registration): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        if ($user->isApplicant() && $registration->user_id === $user->id) {
            return $registration->status->canApplicantEdit();
        }

        return false;
    }

    /**
     * Determine whether the user can submit the registration.
     */
    public function submit(User $user, Registration $registration): bool
    {
        return $user->isApplicant()
            && $registration->user_id === $user->id
            && $registration->status->canApplicantEdit();
    }

    /**
     * Determine whether the user can review and decide on the registration.
     */
    public function review(User $user, Registration $registration): bool
    {
        return $user->canReviewPsb();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Registration $registration): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        if ($user->isApplicant() && $registration->user_id === $user->id) {
            return $registration->status === RegistrationStatus::DRAFT;
        }

        return false;
    }
}
