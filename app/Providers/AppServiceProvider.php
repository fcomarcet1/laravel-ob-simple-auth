<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // For use in Blade templates (e.g. @datetime)
        Blade::directive('getDateTime', static function () {
            return '<?php echo date("Y-m-d h:i:sa"); ?>';
        });
        Blade::if('disk', function ($value) {
            return config('filesystems.default') === $value;
        });

        Blade::if('mailer', function ($input){
            $configuredMailer = config('mail.default');
            return $input === $configuredMailer;
        });

        // tranforma datos pasandole una clase
        /*Blade::stringable('money', static function (Money $money) {
            return new Money($value);
        });*/
    }
}
