<?php

namespace App\Policies;

use App\Models\RegistrationDocument;
use App\Models\User;

class RegistrationDocumentPolicy
{
    public function view(User $user, RegistrationDocument $document): bool
    {
        if ($user->canReviewPsb()) {
            return true;
        }

        return $user->isApplicant() && $document->registration?->user_id === $user->id;
    }

    public function download(User $user, RegistrationDocument $document): bool
    {
        return $this->view($user, $document);
    }

    public function delete(User $user, RegistrationDocument $document): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        if ($user->isApplicant() && $document->registration?->user_id === $user->id) {
            return $document->registration->status->canApplicantEdit();
        }

        return false;
    }
}
