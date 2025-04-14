<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::all();
        return view("admin.articles.index",compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("admin.articles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->all(); // Utiliser toutes les données de la requête
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('articles', 'public');
        }
        
        Article::create($formFields);
        return redirect()->route("admin.articles.index")->with("success","cette article ajouter bien");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view("admin.articles.show",compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
       return view("admin.articles.edit",compact("article"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $formFields = $request->all(); // Utiliser toutes les données de la requête
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('articles', 'public');
        }
        $article->update($formFields);
    
       return redirect()->route("admin.articles.index")->with("success","cette articles bien modefier");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route("admin.articles.index")->with("success","cette article bien supprimer");
    }
    public function showAll(){
        $articles=Article::all();
        return view("client.showAll",compact("articles"));
    }
}
