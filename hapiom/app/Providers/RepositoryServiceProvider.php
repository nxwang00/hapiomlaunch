<?php

namespace App\Providers;



use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'App\Repositories\Users\FriendRepositoryInterface' => 'App\Repositories\Users\FriendRepository',
        'App\Repositories\Notifications\NotificationsRepositoryInterface' => 'App\Repositories\Notifications\NotificationsRepository'
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->repositories as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }
}
