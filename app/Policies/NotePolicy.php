<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NotePolicy
{
    public function canEdit(User $user, Note $note)
    {
        return $user->id === $note->user_id
            ? Response::allow()
            : Response::denyWithStatus(403);
    }
}
