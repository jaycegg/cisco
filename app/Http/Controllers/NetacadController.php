<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Netacad;
use App\Models\Campus;
use App\Models\Role;
use App\Models\User;
use App\Models\Salle;
use App\Models\Materiel;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Hash;

class NetacadController extends Controller
{
    // Vue pour importer les CSV
    public function index(){
        $campuses = Campus::all();
        $roles = Role::all();
        $salles = Salle::all();
        $materiels = Materiel::all();
        return view('netacad', compact('campuses', 'roles', 'salles', 'materiels'));
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
      
        // Ferme le ficher après écriture
        fclose($file);
      };

      return response()->stream($callback, 200, $headers);
    }

    // Créer un template de CSV Salle
    public function exportCsvSalle(Request $request){
      // Nom du CSV
      $fileName = 'salle.csv';
      $salles = Salle::all();

      $headers = array(
        // Paramètres du CSV
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
      );

      //Différentes colonnes du CSV
      $columns = array('id','nom');

      $callback = function() use($salles, $columns) {
        // Passe le fichier CSV en mode écriture
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);       
      
        // Ferme le ficher après écriture
        fclose($file);
      };

      return response()->stream($callback, 200, $headers);
    }

    // Créer un template de CSV Materiel
    public function exportCsvMateriel(Request $request){
      // Nom du CSV
      $fileName = 'materiel.csv';
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
      $columns = array('id','nom', 'categorie', 'salle_id', 'campus_id');

      $callback = function() use($materiels, $columns) {
        // Passe le fichier CSV en mode écriture
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);       
      
        // Ferme le ficher après écriture
        fclose($file);
      };

      return response()->stream($callback, 200, $headers);
    }

    // Méthode de chargement du fichier CSV Utilisateurs
    public function upload(Request $request){
      if ($request->input('submit') != null ){
        $file = $request->file('file');
  
        // Details du fichier
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
  
        // Valider l'extension CSV
        $valid_extension = array("csv");
  
        // Taille maximum du fichier en Bytes, ici 10MB
        $maxFileSize = 10485760; 
  
        // Vérifier l'extension
        if(in_array(strtolower($extension),$valid_extension)){
  
          // Vérifier la taille du fichier
          if($fileSize <= $maxFileSize){
  
            // Emplacement du fichier
            $location = 'uploads';
  
            // Charger le fichier
            $file->move($location,$filename);
  
            // Chemin d'importation du CSV vers la BDD
            $filepath = public_path($location."/".$filename);
  
            // Lire le fichier
            $file = fopen($filepath,"r");
  
            $importData_arr = array();
            $i = 0;
  
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
              $num = count($filedata );
               
              // Supprimer la première ligne
              /*if($i == 0){
                  $i++;
                  continue; 
              }*/
               
              for ($c=0; $c < $num; $c++) {
                  $importData_arr[$i][] = $filedata [$c];
              }
              $i++;
            }
            // Fermer le fichier
            fclose($file);
  
            // Insertion dans la BDD
            foreach($importData_arr as $importData){
              // Colonnes liées à la BDD et au CSV
              
              $insertData = array(
                  "name"=>$importData[0],
                  "prenom"=>$importData[1],
                  "email"=>$importData[2],
                  // Campus et rôle à choisir dans la vue
                  "password"=>Hash::make($request->newPassword),
                  "campuses_id"=>$request->roles_id,
                  "created_at"=>Carbon::now()
                );

              Netacad::insertData($insertData);
            }
            Session::flash('messageP','Import réussi');
          }else{
            Session::flash('messageN','Fichier trop gros (Dépasse les 10Mb)');
          }
  
        }else{
           Session::flash('messageN','Extension du fichier invalide');
        }
  
      }
  
      // Redirection
      return redirect()->route('netacad');
    }

    // Méthode de chargement du fichier CSV Salle
    public function uploadSalle(Request $request){
      if ($request->input('submit') != null ){
        $file = $request->file('file');
  
        // Details du fichier
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
  
        // Valider l'extension CSV
        $valid_extension = array("csv");
  
        // Taille maximum du fichier en Bytes, ici 10MB
        $maxFileSize = 10485760; 
  
        // Vérifier l'extension
        if(in_array(strtolower($extension),$valid_extension)){
  
          // Vérifier la taille du fichier
          if($fileSize <= $maxFileSize){
  
            // Emplacement du fichier
            $location = 'uploads';
  
            // Charger le fichier
            $file->move($location,$filename);
  
            // Chemin d'importation du CSV vers la BDD
            $filepath = public_path($location."/".$filename);
  
            // Lire le fichier
            $file = fopen($filepath,"r");
  
            $importData_arr = array();
            $i = 0;
  
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
              $num = count($filedata );
               
              // Supprimer la première ligne
              /*if($i == 0){
                  $i++;
                  continue; 
              }*/
               
              for ($c=0; $c < $num; $c++) {
                  $importData_arr[$i][] = $filedata [$c];
              }
              $i++;
            }
            // Fermer le fichier
            fclose($file);
  
            // Insertion dans la BDD
            foreach($importData_arr as $importData){
              // Colonnes liées à la BDD et au CSV
              
              $insertData = array(
                  "id"=>(int)$importData[0],
                  "nom"=>$importData[1],
                  "etat"=>"1",
                  "campuses_id"=>$request->campuses_id,
                  "created_at"=>Carbon::now()
                );

              Netacad::insertDataSalle($insertData);
            }
            Session::flash('messageP','Import réussi');
          }else{
            Session::flash('messageN','Fichier trop gros (Dépasse les 10Mb)');
          }
  
        }else{
           Session::flash('messageN','Extension du fichier invalide');
        }
  
      }
  
      // Redirection
      return redirect()->route('netacad');
    }

        // Méthode de chargement du fichier CSV Materiel
        public function uploadMateriel(Request $request){
          if ($request->input('submit') != null ){
            $file = $request->file('file');
      
            // Details du fichier
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
      
            // Valider l'extension CSV
            $valid_extension = array("csv");
      
            // Taille maximum du fichier en Bytes, ici 10MB
            $maxFileSize = 10485760; 
      
            // Vérifier l'extension
            if(in_array(strtolower($extension),$valid_extension)){
      
              // Vérifier la taille du fichier
              if($fileSize <= $maxFileSize){
      
                // Emplacement du fichier
                $location = 'uploads';
      
                // Charger le fichier
                $file->move($location,$filename);
      
                // Chemin d'importation du CSV vers la BDD
                $filepath = public_path($location."/".$filename);
      
                // Lire le fichier
                $file = fopen($filepath,"r");
      
                $importData_arr = array();
                $i = 0;
      
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                  $num = count($filedata );
                   
                  // Supprimer la première ligne
                  if($i == 0){
                      $i++;
                      continue; 
                  }
                   
                  for ($c=0; $c < $num; $c++) {
                      $importData_arr[$i][] = $filedata [$c];
                  }
                  $i++;
                }
                // Fermer le fichier
                fclose($file);
      
                // Insertion dans la BDD
                foreach($importData_arr as $importData){
                  // Colonnes liées à la BDD et au CSV
                  
                  $insertData = array(
                      "id"=>(int)$importData[0],
                      "nom"=>$importData[1],
                      "categorie"=>$importData[2],
                      "etat"=>"1",
                      "salles_id"=>(int)$importData[3],
                      "campuses_id"=>(int)$importData[4],
                      "created_at"=>Carbon::now()
                    );
    
                  Netacad::insertDataMateriel($insertData);
                }
                Session::flash('messageP','Import réussi');
              }else{
                Session::flash('messageN','Fichier trop gros (Dépasse les 10Mb)');
              }
      
            }else{
               Session::flash('messageN','Extension du fichier invalide');
            }
      
          }
      
          // Redirection
          return redirect()->route('netacad');
        }
}
