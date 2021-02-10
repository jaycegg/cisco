<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Salle;
use App\Models\Materiel;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Carbon\Carbon;
use DB;

class TicketController extends Controller
{  
    
    public function demande(){
        $tickets = Ticket::all();
        return view('gestion.demande', compact('tickets'));
    }

    // Gestion des tickets
    public function gestionTickets(){
        $tickets = Ticket::all();
        return view('gestion.ticket', compact('tickets'));
    }
    
    // Accepter la réservation de materiel
    // Etat -> 0 = Accepté, 1 = En cours, 2 = Refus
    public function accepterMateriel(Request $request){
        // Création d'event lors de la validation du ticket
        $event = new Event;
        $event->title = 'Réservation Materiel';
        // Concatener les input pour créer un dateTime
        $dateD = $request->input('start');
        $heureD = $request->input('startTime');
        $dateTimeD = new Carbon($dateD.' '.$heureD);
        $event->start = $dateTimeD;

        $dateF = $request->input('end');
        $heureF = $request->input('endTime');
        $dateTimeF = new Carbon($dateF.' '.$heureF);
        $event->end = $dateTimeF;    

        $event->salles_id = $request->input('idSa');
        
        $event->save();

        // Modifier la table Tickets pour retrouver l'Event
        Materiel::where('id', '=', $request->input('idMa'))
        ->update(['etat' => 0]);

        Ticket::where('id', '=', $request->input('idTi'))
        ->update(['etat' => 0, 'events_id' => $event->id]);

        return back();
    }

    // Accepter par l'administrateur
    public function accepterSalle(Request $request){
        // Création d'event lors de la validation du ticket
        $event = new Event;
        $event->title = 'Réservation Salle';
        // Concatener les input pour créer un dateTime
        $dateD = $request->input('start');
        $heureD = $request->input('startTime');
        $dateTimeD = new Carbon($dateD.' '.$heureD);
        $event->start = $dateTimeD;
        
        $dateF = $request->input('end');
        $heureF = $request->input('endTime');
        $dateTimeF = new Carbon($dateF.' '.$heureF);
        $event->end = $dateTimeF;    
        
        $event->salles_id = $request->input('idSa');

        $event->save();
        
        // Modifier la table Tickets pour retrouver l'Event
        Salle::where('id', '=', $request->input('idSa'))
        ->update(['etat' => 0]);

        Ticket::where('id', '=', $request->input('idTi'))
        ->update(['etat' => 0, 'events_id' => $event->id]);

        return back();
    }

    // Décliner la réservation
    public function decliner(Request $request){
        Ticket::where('id', '=', $request->input('idTi'))
        ->update(['etat' => 2]);
        return back();
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $tickets = Ticket::all();
       return view('dash.tickets.index', compact('tickets'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('dash.tickets.create');
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
           'type' => 'required',
           'created_at' => 'required',
           'dateEcheance' => 'required',
           'description' => 'required',
           'etat' => 'required',
           'materiel_id' => 'required',
           'salles_id' => 'required',
           'user_id' => 'required',
       ]);

       Ticket::create($request->all());

       return redirect()->route('tickets.index')
           ->with('success', 'Ticket créé');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $ticket = Ticket::find($id);
       return view('dash.tickets.show', compact('ticket'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $ticket = Ticket::find($id);
       return view('dash.tickets.edit', compact('ticket'));
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
        'type' => 'required',
        'created_at' => 'required',
        'dateEcheance' => 'required',
        'description' => 'required',
        'etat' => 'required',
        'materiel_id' => 'required',
        'salles_id' => 'required',
        'user_id' => 'required',
       ]);

       Ticket::find($id)->update($request->all());

       return redirect()->route('tickets.index')
           ->with('success', 'Ticket modifié');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Ticket::where('id', $id)->delete();

       return redirect()->route('tickets.index')
           ->with('success', 'Ticket supprimé');
   }
}