<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\ModelRepositoryInterfaces\StudentInfoRepositoryInterface',
            'App\ModelRepositories\StudentInfoRepository'
        );
       $this->app->bind(
            'App\ModelRepositoryInterfaces\UserModelRepositoryInterface',
            'App\ModelRepositories\UserModelRepository'
        );
    }
}
