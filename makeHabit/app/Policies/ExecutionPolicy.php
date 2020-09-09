<?php

namespace App\Policies;

use App\Models\Execution;
use App\Models\Habit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ExecutionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any executions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the execution.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Execution  $execution
     * @return mixed
     */
    public function update(User $user, Execution $execution, Habit $habit)
    {
        if ($habit->id === $execution->habit_id) {
            return $user->id === $habit->user_id
                ? Response::allow()
                : Response::deny('This action is unauthorized.');
        }
    }
}
