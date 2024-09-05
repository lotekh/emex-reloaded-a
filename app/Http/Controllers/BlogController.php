<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($id)
    {
        $model = Blog::findOrFail($id);
        $tags = $model->tags;
        $recentArticles = Blog::orderBy('created_at', 'desc')->limit(5)->get();
        $archives = Blog::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as articles_number')
            ->groupBy('year', 'month')
            ->get();

        return view('blog.show', compact('model', 'tags', 'recentArticles', 'archives'));
    }

    public function index()
    {
        // Logică pentru afișarea articolelor de blog
    }
}
