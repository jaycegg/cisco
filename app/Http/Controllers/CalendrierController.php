<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Salle;
use Illuminate\Support\Facades\DB;
use PDO;


class CalendrierController extends Controller
{

    public function calendrier(Request $request)
    {
        $events = Event::all();
        $salles = Salle::all();
        return view('fullcalendar', compact('events', 'salles'));
    }

    public function addEvent(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'color' => 'required',
            'salles_id' => 'required'
        ]);

        Event::create($request->all());

        return redirect()->back()
            ->with('success', 'Ajout effectué');
    }

    public function editEventDate()
    {
        
        $bdd = new PDO('mysql:host=localhost;dbname=cisco;charset=utf8', 'root', '');
        if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
            $id = $_POST['Event'][0];
            $start = $_POST['Event'][1];
            $end = $_POST['Event'][2];

            $sql = "UPDATE events SET  start = '$start', end = '$end' WHERE id = $id ";
            $query = $bdd->prepare( $sql );

            if ($query == false) {
             print_r($bdd->errorInfo());
             die ('Erreur');
            }
            
            $sth = $query->execute();
            
            if ($sth == false) {
             print_r($query->errorInfo());
             die ('Erreur');
            }else{
                die ('OK');
            }
        
        }    
        return redirect()->route('calendar');
    }

    public function editEventTitle(Request $request){
        $bdd = new PDO('mysql:host=localhost;dbname=cisco;charset=utf8', 'root', '');
        // Si suppression
        if (isset($_POST['delete']) && isset($_POST['id'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM events WHERE id = $id";
            $query = $bdd->prepare( $sql );

            if ($query == false) {
             print_r($bdd->errorInfo());
             die ('Erreur prepare');
            }
  
            $res = $query->execute();
  
            if ($res == false) {
             print_r($query->errorInfo());
             die ('Erreur execute');
            }
  
            return redirect()->route('calendar');
  
            // Si modification de titre, couleur
        }elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
            $id = $_POST['id'];
            $request->validate([
                'title' => 'required',
                'color' => 'required',
               ]);

            Event::find($id)->update($request->all());

           return redirect()->route('calendar')->with('success', 'Event modifié');
        }
    }

  public function calendar(){
    $events = Event::all();
      return view ('calendar',compact('events'));
  }

}
