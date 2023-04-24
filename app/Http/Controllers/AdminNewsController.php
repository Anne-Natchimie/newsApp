<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{

    public function index() {

    // $actus = News::all() ; // Lister tout
    $actus = News::orderBy('created_at', 'desc')->paginate(10) ; //Lister en ordre décroissant par rapport à la date (created at) 
    return view('adminnews.liste', compact('actus')) ; 

    }

    public function formAdd() { // Affichage de mon formulaire

        $categories = Category::orderBy('name', 'asc')->get() ;
        return view('adminnews.edit', compact('categories')) ; 

    }

    public function add(Request $request) { // Ajout des informations

        $newsModel = new News ; // Création d'une instance de class pour enregistrer en base 

        $request->validate(['titre'=> 'required|min:5']) ; // Vérification des données, titre obligatoire
        //dd($request) ; //Entrer des données 
        //dd($request->titre) ; // Intercepter, recupérer des données
        //$news->titre = "Ma première news" ; 
        //$news->titre = $request->titre ; 
        //$news->save() ; // Enregistrement des données 

        // gestion de l'upload de l'image 
        if ($request->file()) {

        $fileName = $request->image->store('public/images') ;
        $newsModel->image = $fileName ; 

        }

        $newsModel->category_id = $request->category ; 
        $newsModel->description = $request->description ; 
        $newsModel->titre = $request->titre ; 
        $newsModel->save() ;
        return redirect(route('news.add')) ; 
    }

    public function formEdit($id = 0) { 
        $actu = News::findOrFail($id) ;
        $categories = Category::orderBy('name', 'asc')->get() ; // Classer les catégories par nom par ordre croissant 
        return view('adminnews.edit', compact('actu', 'categories')) ; 
    }

    public function edit(Request $request, $id = 0) {

        $actu = News::findOrFail($id) ; // Création d'une instance de class (model News à modifier à partir de l'id) pour enregistrer en base
        $request->validate(['titre'=> 'required|min:5']) ;

        if ($request->file()) {

            if ($actu->image != '') {
                Storage::delete($actu->image) ; 
            }

            $fileName = $request->image->store('public/images') ;
            $actu->image = $fileName ; 
    
            }

        $actu->category_id = $request->category ; 
        $actu->description = $request->description ; 
        $actu->titre = $request->titre ; 
        $actu->save() ; 
        return redirect(route('news.liste')) ; 

    }

    public function delete($id = 0) {

        $actu = News::findOrFail($id) ; // Récupération d'une actualité à partir de son identifiant

        if (Storage::get($actu->image)) { // Vérification que le fichier existe 
            Storage::delete($actu->image) ; // Supprimer l'image visible 
        }

        $actu->delete() ; // Supprimer l'item de la base de données 
        // dd($id) ; 
        // return 'delete' ; 
        return redirect(route('news.liste')) ;  

    }

/*
    public function delete(News $actu) {

        $actu->delete() ; 
        // dd($id) ; 
        return 'delete' ; 

    }
*/



}
