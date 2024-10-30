<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // Share categories with all views
        if(Schema::hasTable('categories')) {
            View::share('categories', Category::all());
        }

        Blade::directive('csrfWithoutAutocomplete', function () {
            return '<input type="text" style="display:none" name="_token" value="<?php echo csrf_token(); ?>">';
        });
    }
}
