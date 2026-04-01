<?php

namespace App\Policies;

use App\Models\Calendar;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalendarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Calendar $calendar)
    {
        return $user->id === $calendar->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Calendar $calendar)
    {
        return $user->id === $calendar->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Calendar $calendar)
    {
        return $user->id === $calendar->user_id;
    }
}
