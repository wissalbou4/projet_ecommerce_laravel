<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $familles = Famille::all();
       return view("admin.familles.index", compact("familles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.familles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->all(); // Utiliser toutes les données de la requête
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('familles', 'public');
        }
        
        Famille::create($formFields);
        return redirect()->route("admin.familles.index")->with("success","cette famille bien ajouter");
    }

    /**
     * Display the specified resource.
     */
    public function show(Famille $famille)
    {
        return view("admin.familles.show", compact("famille"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Famille $famille)
    {
       return view("admin.familles.edit", compact("famille"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Famille $famille)
    {
        $formFields = $request->all(); // Utiliser toutes les données de la requête
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('familles', 'public');
        }
        $famille->update($formFields);
       
       return redirect()->route("admin.familles.index")->with("success","cette famille bien modefier");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Famille $famille)
    {
        
        $famille->delete();
        return redirect()->route("admin.familles.index")->wth("success","cette famille bien supprimer");
    }
}
