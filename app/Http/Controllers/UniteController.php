<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use Illuminate\Http\Request;

class UniteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unites = Unite::all();
        return view("admin.unites.index", compact("unites"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.unites.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Unite::create($request->all());
       return redirect()->route("admin.unites.index")->with('success',"cette unite bien ajouter");
    }

    /**
     * Display the specified resource.
     */
    public function show(Unite $unite)
    {
       return view("admin.unites.show", compact("unite"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unite $unite)
    {
       return view("admin.unites.edit", compact("unite"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unite $unite)
    {
        $unite->update($request->all());
        return redirect()->route("admin.unites.index")->with("success","cette unites bien modefier");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unite $unite)
    {
        $unite->delete();
        return redirect()->route("admin.unites.index")->with("success","cette unites bien supprimer");
    }
}
