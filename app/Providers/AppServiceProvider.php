<?php

namespace App\Providers;

use App\Observers\ProgrammeObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\programme;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
