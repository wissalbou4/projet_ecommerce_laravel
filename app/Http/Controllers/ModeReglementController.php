<?php

namespace App\Http\Controllers;

use App\Models\ModeReglement;
use Illuminate\Http\Request;

class ModeReglementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modeReglements = ModeReglement::all();
       
        return view("modereglements.index", compact("modeReglements"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("modereglements.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         ModeReglement::create($request->all());
         return redirect()->route("modereglements.index")->with("success","cette mode bien ajouter");
    }

    /**
     * Display the specified resource.
     */
    public function show(ModeReglement $modeReglement)
    {
        return view("modereglements.show", compact("modeReglement"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $modeReglement = ModeReglement::findOrFail($id);
    return view("modereglements.edit", compact("modeReglement"));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModeReglement $modeReglement)
    {
        
        $modeReglement->update($request->all());
        return redirect()->route('modereglements.index')->with('success', 'Le mode de règlement a bien été modifié.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModeReglement $modeReglement)
    {
        $modeReglement->delete();
        return redirect()->route("modereglements.index")->with("success","cette mode bien supprimer");
    }
}
