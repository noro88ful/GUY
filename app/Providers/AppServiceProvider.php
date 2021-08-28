<?php

namespace App\Providers;

use App\Models\Footer;
use App\Models\Info;
use App\Models\Social;
use App\Models\Audio;
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
      view()->composer('ui', function ($view) {
			$footers = Footer::all();
			$infos = Info::all();
			$socials = Social::all();
			$audios = Audio::all();
			$view->footers = $footers;
			$view->infos = $infos;
			$view->audios = $audios;
			$view->socials = $socials;
	   });
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
