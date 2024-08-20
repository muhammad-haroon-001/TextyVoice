<?php

namespace App\Providers\Emd;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

class languagesServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
      $languagesJson = file_get_contents(base_path('./resources/languages/languages.json'));
      $languagesData = json_decode($languagesJson, true);
      \View::share('languagesData', $languagesData); // Share globally with all views
  }
}
