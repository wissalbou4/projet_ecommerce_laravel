<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marques = Marque::all();
        return view("marques.index", compact("marques"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("marques.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->all(); // Utiliser toutes les données de la requête
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('marques', 'public');
        }
        
       Marque::create($formFields);
       return redirect()->route('marques.index')->with('success','cette marque bien ajouter');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marque $marque)
    {
        return view('marques.show', compact('marque'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marque $marque)
    {
        return view('marques.edit', compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marque $marque)
    {
        $formFields = $request->all(); // Utiliser toutes les données de la requête
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('marques', 'public');
        }
        $marque->update($formFields);
       
        return redirect()->route('marques.index')->with('success','cette marque bien modefier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marque $marque)
    {
       $marque->delete();
       return redirect()->route('marques.index')->with('success','cette marque bien supprimer');
    }
}
