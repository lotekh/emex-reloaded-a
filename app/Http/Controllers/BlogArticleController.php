<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\BlogArticle;
use Illuminate\Http\Request;

class BlogArticleController extends Controller
{
    // Show the list of articles
    public function index()
    {
        $blogArticles = BlogArticle::with(['tags', 'featuredImage'])->orderBy('created_at', 'desc')->paginate(10);
    
        // Pentru arhivă și filtrul de tag-uri (exemplu dacă le folosești)
        $archive = null; // Sau logica ta pentru a popula arhiva
        $tagFilter = null; // Sau logica ta pentru filtrarea pe taguri
    
        return view('blog.index', compact('blogArticles', 'archive', 'tagFilter'));
    }

    // Show a specific article
    public function show($slug)
    {
        $model = BlogArticle::where('slug', $slug)->with(['tags', 'featuredImage'])->firstOrFail();

        $recentArticles = BlogArticle::orderBy('created_at', 'desc')->take(5)->get();
        $archives = BlogArticle::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as articles_number')
                                ->groupBy('year', 'month')
                                ->orderBy('year', 'desc')
                                ->orderBy('month', 'desc')
                                ->get();

        $monthNames = ['ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie', 'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'];

        return view('blog.view', compact('model', 'recentArticles', 'archives', 'monthNames'));
    }

    public function searchByTag($tag)
    {
        $tagModel = Tag::where('name', $tag)->firstOrFail();
        $blogArticles = $tagModel->blogArticles()->with(['tags', 'featuredImage'])->orderBy('created_at', 'desc')->paginate(10);

        return view('blog.search_results_tags', compact('blogArticles', 'tagModel'));
    }

    public function searchByArchive(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');
        $blogArticles = BlogArticle::whereYear('created_at', $year)
                                    ->whereMonth('created_at', $month)
                                    ->with(['tags', 'featuredImage'])
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(10);

        $monthNames = ['ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie', 'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'];
        $monthName = $monthNames[$month - 1];

        return view('blog.search_results_archive', compact('blogArticles', 'year', 'monthName'));
    }

    
}
