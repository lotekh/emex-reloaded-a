<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

// Route::get('/', function () {
//     return view('header');
// });

Route::get('/mainbody', function () {
    return view('mainbody');
});

Route::get('/mainbody2', function () {
    return view('mainbody2');
});

Route::get('/sidebar', function () {
    return view('sidebar');
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
