<?php

namespace Irfa\FileSafe;

use Illuminate\Support\ServiceProvider;

class FileSafeServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
        
		$this->publishes([
		__DIR__.'/../config/irfa/' => config_path('irfa')],'file-safe');
       
        
	}
}
