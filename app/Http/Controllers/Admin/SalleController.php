<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use DB;

class SalleController extends Controller
{
     /**
     * Liste des salles réservées ou non
     *
     * @return \Illuminate\Http\Response
     */
    public function showEtat(){
        $salle_id = Salle::all();
        return view('gestion.salle', compact('salle_id'));
    }

    public function reserver(Request $request)
    {
        $salle_id = Salle::all();
        
        $all = $request->except('_token');
        $data = Salle::where('id', $request->id)->get();
        $update = Salle::where('id', $request->id)->update($all);

        return back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salles = Salle::all();
        return view('dash.salles.index', compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.salles.create');
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
            'etat' => 'required',
        ]);

        Salle::create($request->all());

        return redirect()->route('dash.salles.index')
            ->with('success', 'Salle créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dash.salles.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dash.salles.edit', compact('id'));
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
            'etat' => 'required',
        ]);

        $id->update($request->all());

        return redirect()->route('dash.salles.index')
            ->with('success', 'Salle modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id->delete();

        return redirect()->route('dash.salles.index')
            ->with('success', 'Salle supprimée');
    }
}
