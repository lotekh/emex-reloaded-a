<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use App\Models\Popup;

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

        // Get the slug of the current Url
        $currentSlug = Request::segment(1); 
        // Verify if there is a popup that is active and that has the same slug as the current URL
        if(Schema::hasTable('popups')) {
            $popup = Popup::where('slug', $currentSlug)->where('is_active', 1)->first();
            View::share('popup', $popup);
        }
    }
}
