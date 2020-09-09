<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Habit;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class HabitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the item.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function view(User $user, Habit $habit)
    {
        return $user->id === $habit->user_id
                ? Response::allow()
                : Response::deny('This action is unauthorized.');
    }

    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function update(User $user, Habit $habit)
    {
        return $user->id === $habit->user_id
                ? Response::allow()
                : Response::deny('This action is unauthorized.');
    }
}
