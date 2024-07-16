<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

// Route::get('/', function () {
//     return view('header');
// });

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/pagina1', function () {
    return view('pagina1');
});

Route::get('/homepage', function () {
    return view('homepage');
});


if (!function_exists('include_all_css')) {
    function include_all_css($directory)
    {
        $output = '';
        $cssFiles = glob(public_path($directory) . '/*.css');
        foreach ($cssFiles as $file) {
            $relativePath = str_replace(public_path(), '', $file);
            $output .= '<link rel="stylesheet" href="' . asset($relativePath) . '">' . "\n";
        }
        return $output;
    }
}

Route::get('/', function () {
    $cssLinks = include_all_css('css');
    return view('main-body', ['cssLinks' => $cssLinks]);
});
