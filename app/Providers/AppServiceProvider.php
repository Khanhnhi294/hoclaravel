<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;

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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
        Blade::directive('datetime', function ($expression) {
            return "<?php echo $expression ?>";
            Blade::if('env', function ($value) {
                //trar ve gia trij boolean
                if (config('app.env') === $value) {
                    return true;
                }
                return false;
            });
        });
    }
}
