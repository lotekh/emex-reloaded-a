<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\BlogArticle;
use Illuminate\Http\Request;

class BlogArticleController extends Controller
{
    // Show the list of articles
    public function index(Request $request)
    {
        $query = BlogArticle::with(['tags', 'featuredImage'])
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc');

        $blogArticles = $query->paginate(10);

        $archive = null; 
        $tagFilter = null; 

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

    public function searchByArchive(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        if (!$year || !$month) {
            $recent = BlogArticle::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
                                ->orderBy('year', 'desc')
                                ->orderBy('month', 'desc')
                                ->first();
            if ($recent) {
                $year = $recent->year;
                $month = $recent->month;
            }
        }

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
