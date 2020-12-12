<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materiel;

class MaterielController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $materiels = Materiel::all();
       return view('dash.materiels.index', compact('materiels'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('dash.materiels.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $request->validate([
           'nom' => 'required',
           'categorie' => 'required',
           'etat' => 'required',
           'campuses_id' => 'required',
       ]);

       Materiel::create($request->all());

       return redirect()->route('materiels.index')
           ->with('success', 'Matériel créé');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $materiel = Materiel::find($id);
       return view('dash.materiels.show', compact('materiel'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
        $materiel = Materiel::find($id);
        return view('dash.materiels.edit', compact('materiel'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       $request->validate([
        'nom' => 'required',
        'categorie' => 'required',
        'etat' => 'required',
        'campuses_id' => 'required',
       ]);

       Materiel::find($id)->update($request->all());

       return redirect()->route('materiels.index')
           ->with('success', 'Matériel modifié');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
        Log::where('id', $id)->delete();

        return redirect()->route('materiels.index')
            ->with('success', 'Matériel supprimé');
   }
}