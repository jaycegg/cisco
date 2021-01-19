<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function dash(){
        $this->middleware('admin');
        return view('dash.dashboard');
    }

    // Créer un template de CSV Promotion
    public function exportCsv(Request $request){
        // Nom du CSV
        $fileName = 'promotion.csv';
        $users = User::all();
  
        $headers = array(
          // Paramètres du CSV
          "Content-type"        => "text/csv",
          "Content-Disposition" => "attachment; filename=$fileName",
          "Pragma"              => "no-cache",
          "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
          "Expires"             => "0"
        );
  
        //Différentes colonnes du CSV
        $columns = array('name', 'prenom', 'email');
  
        $callback = function() use($users, $columns) {
          // Passe le fichier CSV en mode écriture
          $file = fopen('php://output', 'w');
          fputcsv($file, $columns);
  
          // Donne accès à tous les utilisateurs dans la liste 
            foreach ($users as $user) {
              $row['name'] = $user->name;
              $row['prenom'] = $user->prenom;
              $row['email'] = $user->email;
  
              fputcsv($file, array($row['name'], $row['prenom'], $row['email']));
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
       $users = User::all();
       return view('dash.users.index', compact('users'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('dash.users.create');
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
        'name' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'campuses_id' => 'required',
        'roles_id' => 'required',
       ]);

       User::create($request->all());

       return redirect()->route('users.index')
           ->with('success', 'Utilisateur créé');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
        $user = User::find($id);
        return view('dash.users.show', compact('user'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $user = User::find($id);
       return view('dash.users.edit', compact('user'));
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
        'name' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'campuses_id' => 'required',
        'roles_id' => 'required',
       ]);

       User::find($id)->update($request->all());

       return redirect()->route('users.index')
           ->with('success', 'Utilisateur modifié');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
        User::where('id', $id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur supprimé');
   }
}