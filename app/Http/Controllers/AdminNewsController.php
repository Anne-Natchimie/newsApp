<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function formAdd() { // Affichage de mon formulaire

        return view('adminnews.add') ; 

    }

    public function add(Request $request) { // Ajout des informations

        $newsModel = new News ; // Creéation d'une instance de class pour enregistrer en base 

        $request->validate(['titre'=> 'required|min:5']) ; // Vérification des données, titre obligatoire
        //dd($request) ; //Entrer des données 
        //dd($request->titre) ; // Intercepter, recupérer des données
        //$news->titre = "Ma première news" ; 
        //$news->titre = $request->titre ; 
        //$news->save() ; // Enregistrement des données 

        // gestion de l'upload de l'image 

        if ($request->file()) {

        $fileName = $request->image->store('images') ;
        $newsModel->image = "image" ; 

        }

        $newsModel->description = $request->description ; 

        $newsModel->titre = $request->titre ; 
        $newsModel->save() ;
        return redirect(route('news.add')) ; 
    }



}
