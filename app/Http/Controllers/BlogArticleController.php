<?php

namespace App\Http\Controllers;

use App\Models\BlogArticle;
use Illuminate\Http\Request;

class BlogArticleController extends Controller
{
    // Afișare lista de articole
    public function index()
    {
        // Obțin toate articolele din baza de date
        $articles = BlogArticle::with('tags')->orderBy('created_at', 'desc')->paginate(10); // Paginare cu 10 articole per pagină
        
        // Articole recente și arhiva
        $recentArticles = BlogArticle::orderBy('created_at', 'desc')->take(5)->get();
        $archives = BlogArticle::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as articles_number')
                                ->groupBy('year', 'month')
                                ->orderBy('year', 'desc')
                                ->orderBy('month', 'desc')
                                ->get();
        
        $monthNames = ['ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie', 'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'];

        return view('blog.index', compact('articles', 'recentArticles', 'archives', 'monthNames'));
    }

    // Afișare articol specific
    public function show($id)
    {
        $article = BlogArticle::with(['tags', 'featuredImage'])->findOrFail($id);

        // Articole recente și arhiva
        $recentArticles = BlogArticle::orderBy('created_at', 'desc')->take(5)->get();
        $archives = BlogArticle::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as articles_number')
                                ->groupBy('year', 'month')
                                ->orderBy('year', 'desc')
                                ->orderBy('month', 'desc')
                                ->get();

        $monthNames = ['ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie', 'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'];

        return view('blog.view', compact('article', 'recentArticles', 'archives', 'monthNames'));
    }

    // Căutare articole
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = BlogArticle::where('title', 'LIKE', '%' . $query . '%')
                                ->orWhere('body', 'LIKE', '%' . $query . '%')
                                ->get();

        return view('blog.search_results', compact('results', 'query'));
    }
}
