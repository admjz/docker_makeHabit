<?php

namespace App\Policies;

use App\Execution;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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
     * Determine whether the user can view the execution.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Execution  $execution
     * @return mixed
     */
    public function view(User $user, Execution $execution)
    {
        //
    }

    /**
     * Determine whether the user can create executions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
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
    public function update(User $user, Execution $execution)
    {
        //
    }

    /**
     * Determine whether the user can delete the execution.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Execution  $execution
     * @return mixed
     */
    public function delete(User $user, Execution $execution)
    {
        //
    }

    /**
     * Determine whether the user can restore the execution.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Execution  $execution
     * @return mixed
     */
    public function restore(User $user, Execution $execution)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the execution.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Execution  $execution
     * @return mixed
     */
    public function forceDelete(User $user, Execution $execution)
    {
        //
    }
}
