<?php

namespace App\Providers;

use App\Models\Execution;
use App\Models\Habit;
use App\Policies\ExecutionPolicy;
use App\Policies\HabitPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Habit::class     => HabitPolicy::class,
        Execution::class => ExecutionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
