<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Pour la réservation de salles et de matériel
    
    // Renvoie la liste des réservations
    public function index()
    {
        return view('event.list', ['events' => Event::orderBy('debut')->get()]);
    }

    // La vue pour la création de réservation
    public function create()
    {
        return view('event.create');
    }

    // Fonction pour agrémenter la BDD
    public function store(Request $request)
    {
        $time = explode(" - ", $request->input('time'));
  
        $event = new Event;
        $event->title = $request->input('titre');
        $event->start_time = $time[0];
        $event->end_time = $time[1];
        $event->save();
  
        $request->session()->flash('success', 'L\'évènement est sauvé');
        return redirect('events.create');
    }

    // Affichage d'une réservation
    public function show($id)
    {
        return view('event.view', ['event' => Event::findOrFail($id)]);
    }

    // Renvoie la vue pour éditer la réservation
    public function edit($id)
    {
        return view('event.edit', ['event' => Event::findOrFail($id)]);
    }

    // Fonction pour enregistrer la modification
    public function update(Request $request, $id)
    {
        $time = explode(" - ", $request->input('time'));
  
        $event = Event::findOrFail($id);
        $event->title = $request->input('titre');
        $event->start_time = $time[0];
        $event->end_time = $time[1];
        $event->save();
  
        return redirect('events');
    }

    // Fonction de suppression de réservation
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
  
        return redirect('events');
    }
}
