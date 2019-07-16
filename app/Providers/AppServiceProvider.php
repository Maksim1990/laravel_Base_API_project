<?php

namespace App\Providers;

use App\Services\Logging\LoggerService;
use App\Services\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //PAGINATOR SERVICE INITIALIZATION
        $this->app->bind(Paginator::class, function ($app) {
            return new Paginator($app->config['paginator.max_per_page'],$app->config['paginator.use_paginator']);
        });


        //LOGGER MICROSERVICE ADAPTER INITIALIZATION
        $this->app->bind(LoggerService::class, function ($app) {

            $arrLogger=[
                "host"=>$app->config['queue.rabbitmq.host']??"",
                "port"=>$app->config['queue.rabbitmq.port']??"",
                "login"=>$app->config['queue.rabbitmq.login']??"",
                "password"=>$app->config['queue.rabbitmq.password']??"",
                "type"=>$app->config['logger.type']??"",
            ];
            return new LoggerService($arrLogger);
        });

        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
