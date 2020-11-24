<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Salle;
use App\Http\Controllers\Admin;

class GestionController extends Controller
{
    /* Renvoie la vue de la gestion des salles*/
    public function gestionSalle(){

        $salles_id = Salle::all();

        if(Auth::user()->roles_id != 0){
            return view('gestion.salle')->with('salles_id', $salles_id);
        }else{
            return back();
        }
    }
}
