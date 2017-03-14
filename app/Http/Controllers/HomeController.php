<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArticleContent;

class HomeController extends Controller
{
    public function show()
    {
        $articles= ArticleContent::where('language_code', app()->getLocale())->get();
        return view('welcome', compact('articles'));
    }

    public function getArticleBySlug($slug)
    {
        $article=ArticleContent::where('language_code', app()->getLocale())->where('slug', $slug)->firstOrFail();
        return view('show', compact('article'));
    }
}
