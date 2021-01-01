<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Campus;
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
        return view('reservations.salleResa', compact('salle_id'));
    }

    // Fonction de réservation de salle, change le booleen
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

        return redirect()->route('salles.index')
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
        $salle = Salle::find($id);
        return view('dash.salles.show', compact('salle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salle = Salle::find($id);
        return view('dash.salles.edit', compact('salle'));
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

        Salle::find($id)->update($request->all());

        return redirect()->route('salles.index')
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
        Salle::where('id', $id)->delete();

        return redirect()->route('salles.index')
            ->with('success', 'Salle supprimée');
    }
}
