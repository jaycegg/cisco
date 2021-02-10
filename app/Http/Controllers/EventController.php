<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
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
             die ('Erreur prepare');
            }
            $sth = $query->execute();
            if ($sth == false) {
             print_r($query->errorInfo());
             die ('Erreur execute');
            }else{
                die ('OK');
            }

        }

        return redirect()->view('calendar')
                   ->with('success', 'Event modifié');

    }

    public function editEventTitle(Request $request){
        $bdd = DB::getPdo();
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
        // Si modification de titre, couleur
        }elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
            $id = $_POST['id'];
            $request->validate([
                'title' => 'required',
                'color' => 'required',
               ]);

               User::find($id)->update($request->all());

               return redirect()->view('calendar')
                   ->with('success', 'Event modifié');
        }
    }
}
