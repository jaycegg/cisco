<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Netacad;
use App\Models\Campus;
use App\Models\Role;
use Session;
use Illuminate\Support\Facades\Hash;

class NetacadController extends Controller
{
    // Vue pour importer les CSV
    public function index(){
        $campuses = Campus::all();
        $roles = Role::all();
        return view('netacad', compact('campuses', 'roles'));
    }
    
    // Méthode de chargement du fichier CSV
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
                    "password"=> Hash::make($request->newPassword),
                    "campuses_id"=>$request->campuses_id,
                    "roles_id"=>$request->roles_id);

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
}
