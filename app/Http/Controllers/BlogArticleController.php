<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\BlogArticle;
use Illuminate\Http\Request;

class BlogArticleController extends Controller
{
    // Afișare lista de articole
    public function index()
    {
        // Paginăm articolele
        $blogArticles = BlogArticle::with(['tags', 'featuredImage'])->orderBy('created_at', 'desc')->paginate(10);
    
        // Pentru arhivă și filtrul de tag-uri (exemplu dacă le folosești)
        $archive = null; // Sau logica ta pentru a popula arhiva
        $tagFilter = null; // Sau logica ta pentru filtrarea pe taguri
    
        return view('blog.index', compact('blogArticles', 'archive', 'tagFilter'));
    }

    // Afișare articol specific
    public function show($id)
    {
        $model = BlogArticle::with(['tags', 'featuredImage'])->findOrFail($id);

        // dd($model);
        // dd($model->tags->first->name);

        // $tags = $model->tags()->first();
        // dd($tags);

        // Articole recente și arhiva
        $recentArticles = BlogArticle::orderBy('created_at', 'desc')->take(5)->get();
        $archives = BlogArticle::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as articles_number')
                                ->groupBy('year', 'month')
                                ->orderBy('year', 'desc')
                                ->orderBy('month', 'desc')
                                ->get();

        $monthNames = ['ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie', 'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'];

        return view('blog.view', compact('model', 'recentArticles', 'archives', 'monthNames'));
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
