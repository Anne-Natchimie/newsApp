<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsStandardController extends Controller
{
    //

    public function index($id = 0)
    {
        // Si l'id est different de 0
        if ($id != 0) { 
            // On affiche les news par la categorie id dans l'orde décroissant
            $actus = News::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(2) ; 
        } else {
            // Sinon on affiche tout par défaut 
            $actus = News::orderBy('created_at', 'desc')->paginate(2) ; 
        }
        
        
        
        $categories = Category::orderBy('name', 'asc')->get() ; 
        return view('news.standard', compact('actus', 'categories')) ; 
    }

    public function detail(News $actu)
    {
        return view('news.detail', compact('actu')) ; 
    }


}
