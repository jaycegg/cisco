<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materiel;
use App\Models\Salle;
use App\Models\Campus;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use DB;
use DateTime;

class MaterielController extends Controller
{
    // GET
    public function listeMateriel()
    {
        $materiels_id = Materiel::all();
        return view('reservations.listeMateriel', compact('materiels_id'));
    }

    // Utilisateur crée un ticket de réservation
    // POST
    public function reserverM(Request $request, $id){
        $ticket = new Ticket;
        $ticket->type = $request->input('type');
        $ticket->description = $request->input('description');
        $ticket->etat = 1;
        $ticket->start = $request->input('start');
        $ticket->end = $request->input('end');
        $ticket->startT = $request->input('startT');
        $ticket->endT = $request->input('endT');
        $ticket->materiels_id = $request->input('materiels_id');
        $ticket->salles_id = $request->input('salles_id');
        $ticket->users_id = Auth::id();
        $ticket->save();

        return back();
    }

    //GET selon id
    public function resaIdM($id){
        $materiel = Materiel::find($id);
        return view('reservations.materielResa', compact('materiel'));
    }

    // Fonction de réservation de salle, change le booleen
    public function dispoM(Request $request)
    {
        Materiel::where('id', '=', $request->input('idMat'))
        ->update(['etat' => 1]);

        return back();

    }

    // Créer un template de CSV Materiels
    public function exportCsv(Request $request){
        // Nom du CSV
        $fileName = 'materiels.csv';
        $materiels = Materiel::all();
  
        $headers = array(
          // Paramètres du CSV
          "Content-type"        => "text/csv",
          "Content-Disposition" => "attachment; filename=$fileName",
          "Pragma"              => "no-cache",
          "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
          "Expires"             => "0"
        );
  
        //Différentes colonnes du CSV
        $columns = array('nom', 'categorie', 'etat', 'date', 'salle', 'campus');
  
        $callback = function() use($materiels, $columns) {
          // Passe le fichier CSV en mode écriture
          $file = fopen('php://output', 'w');
          fputcsv($file, $columns);       
        
          // Donne accès à toutes les salles dans la liste 
            foreach ($materiels as $materiel) {
                $row['nom'] = $materiel->nom;
                $row['categorie'] = $materiel->categorie;

                if($materiel->etat == 1){
                    $row['etat'] = "Disponible";
                }else{
                    $row['etat'] = "Indisponible";
                }

                $row['date'] = $materiel->updated_at;

                
                $nomSalle = $materiel->salles_id;
                $nomCampus = Salle::find($nomSalle)->campuses_id;
                $row['campus'] = Campus::find($nomCampus)->ville;
                $row['salle'] = Salle::find($nomSalle)->nom;
            
                fputcsv($file, array($row['nom'], $row['categorie'], $row['etat'], $row['date'], $row['campus'], $row['salle']));
            }  

          // Ferme le ficher après écriture
          fclose($file);
        };
  
        return response()->stream($callback, 200, $headers);
      }

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
           'salles_id' => 'required',
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
        'salles_id' => 'required',
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