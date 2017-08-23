<?php

namespace JohanCode\BackpackImageUploader;

use Illuminate\Support\ServiceProvider as LServiceProvider;

class ServiceProvider extends LServiceProvider
{

    public function boot()
    {
        $this->publishes([__DIR__ . '/../public/' => public_path() . "/"], 'assets');
        $this->publishes([__DIR__ . '/../database/' => base_path("database")], 'database');
        $this->publishes([__DIR__ . '/../views/' => base_path("resources/views")], 'views');

        \JohanCode\BackpackImageUploader\Models\TempImage::observe(\JohanCode\BackpackImageUploader\Models\Observers\TempImageObserver::class);
    }

    public function register()
    {
        // This will load routes file at vendor/[vendor]/[package]/src/Http/routes.php
        // and prepend it with Foo\Http\Controllers namespace

        $this
            ->app['router']
            ->group(
                [
                    'namespace' => 'JohanCode\BackpackImageUploader\Controllers',
                    'middleware' => 'web',
                    'prefix' => \Config::get('backpack.base.route_prefix'),
                ],
                function () {
                    require __DIR__ . '/routes.php';
                }
            );
    }
}