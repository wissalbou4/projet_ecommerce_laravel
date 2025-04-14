<?php

namespace App\Http\Controllers;

use App\Models\Reglement;
use Illuminate\Http\Request;

class ReglementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reglements = Reglement::all();
        return view("admin.reglements.index", compact("reglements"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.reglements.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Reglement::create($request->all());
        return redirect()->route("admin.reglements.index")->with('success','cette reglement bien ajouter');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reglement $reglement)
    {
       return view('admin.reglements.show', compact('reglement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reglement $reglement)
    {
       return view('admin.reglements.edit', compact('reglement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reglement $reglement)
    {
        $reglement->update($request->all());
        return redirect()->route('admin.reglements.index')->with('success','cette regle bien modefier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reglement $reglement)
    {
       $reglement->delete();
       return redirect()->route('admin.reglements.index')->with('success','cette regle bien supprimer');
    }
}
