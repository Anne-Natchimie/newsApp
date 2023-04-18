<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsStandardController extends Controller
{
    //

    public function index()
    {
        $actus = News::orderBy('created_at', 'desc')->paginate(10) ; 
        return view('news.standard', compact('actus')) ; 
    }

    public function detail(News $actu)
    {
        return view('news.detail', compact('actu')) ; 
    }


}
