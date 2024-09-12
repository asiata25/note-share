<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NotePolicy
{
    /**
     * Determine whether the user can update or delete the model.
     */
    public function edit(User $user, Note $note): bool
    {
        return $user->id === $note->user_id;
    }
}
