<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function showTags()
    {
        // Get the URL without query string
        $current_url = url()->current();
        $current_url = basename(parse_url($current_url, PHP_URL_PATH));

        // Read tags.csv from public/resources
        $tags = [];
        $path = public_path('resources/tags.csv');
        if (file_exists($path)) {
            if (($handle = fopen($path, 'r')) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $tags[$data[0]] = $data[1];
                }
                fclose($handle);
            }
        }

        // Obține tagul pentru URL-ul curent
        $tag = $tags[$current_url] ?? '';

        // Transmite tagul către view-ul Blade
        return view('categories.view', compact('tag'));
    }
}
