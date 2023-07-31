<?php

namespace Backpack\Vercel;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/config/vercel.php';

    public function boot()
    {
      // Translations
      $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'parabellumkoval');

      $this->publishes([
          __DIR__.'/resources/lang' => resource_path('lang/vendor/parabellumkoval'),
      ], 'trans');
      
	    // Routes
    	$this->loadRoutesFrom(__DIR__.'/routes/backpack/routes.php');
  
      $this->publishes([
          __DIR__.'/routes/backpack/routes.php' => resource_path('/routes/backpack/vercel/backpack.php'),
      ], 'routes');

		  // Config
      $this->publishes([
        self::CONFIG_PATH => config_path('/parabellumkoval/vercel.php'),
      ], 'config');
      
      // Views
      $this->loadViewsFrom(__DIR__.'/resources/views/vendor/backpack', 'backpack-vercel');
      
      $this->publishes([
          __DIR__.'/resources/views' => resource_path('views'),
      ], 'views');

    }

    public function register()
    {
      // Apply package local config
      $this->mergeConfigFrom(__DIR__.'/config/vercel.php', 'parabellumkoval.vercel');
    }
}
