<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Services\TicketServiceClassInterface;
use App\Services\TicketServiceClass;

class ServiceClassProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TicketServiceClassInterface::class, TicketServiceClass::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
