@extends('layouts.app')
@section('content')

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nom de la salle">
    
    <ul id="myUL"> 
    <p>Tickets en cours :</p>
        @foreach ($tickets as $ticket)
        @if ($ticket->etat === 1)  
            <li><a>{{App\Models\Salle::find($ticket->salles_id)->nom}} / {{App\Models\Campus::find(App\Models\Salle::find($ticket->salles_id)->campuses_id)->ville}}</a> - créé le : {{$ticket->created_at}}                
                <p>
                Concerne : 
                    @if ($ticket->materiels_id == Null)
                        Salle <br>
                    @elseif ($ticket->materiels_id != Null)
                        Matériel <br>
                    @endif
                Etat : En cours <br>
                Type : {{$ticket->type}} <br>
                Auteur : {{App\Models\User::find($ticket->users_id)->name}} {{App\Models\User::find($ticket->users_id)->prenom}} - {{App\Models\Role::find(App\Models\User::find($ticket->users_id)->roles_id)->nom}}
                </p>
                <a href="{{route('tickets.show', $ticket->id)}}" class="btn btn-info">Examiner</a>
                <a href="" class="btn btn-success">Accepter</a>
                <a href="" class="btn btn-danger">Décliner</a>
            </li>
        @endif
    @endforeach
    
    <p>Tickets traités :</p> 
    @foreach ($tickets as $ticket)
        @if ($ticket->etat === 0)
            <li><a>{{App\Models\Salle::find($ticket->salles_id)->nom}} / {{App\Models\Campus::find(App\Models\Salle::find($ticket->salles_id)->campuses_id)->ville}}</a> - créé le : {{$ticket->created_at}} (par {{App\Models\User::find($ticket->users_id)->name}} {{App\Models\User::find($ticket->users_id)->prenom}} - {{App\Models\Role::find(App\Models\User::find($ticket->users_id)->roles_id)->nom}})
                <p>
                Concerne : 
                    @if ($ticket->materiels_id == Null)
                        Salle <br>
                    @elseif ($ticket->materiels_id != Null)
                        Matériel <br>
                    @endif
                Etat : Traité <br>
                Type : {{$ticket->type}} <br>
                Auteur : {{App\Models\User::find($ticket->users_id)->name}} {{App\Models\User::find($ticket->users_id)->prenom}} - {{App\Models\Role::find(App\Models\User::find($ticket->users_id)->roles_id)->nom}} <br>
                </p>
                <a href="{{route('tickets.show', $ticket->id)}}" class="btn btn-warning">Examiner</a>
            </li>
        @endif
    @endforeach
    </ul> 

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>

    <script>
        function myFunction() {
          // Declare variables
          var input, filter, ul, li, a, i, txtValue;
          input = document.getElementById('myInput');
          filter = input.value.toUpperCase();
          ul = document.getElementById("myUL");
          li = ul.getElementsByTagName('li');
        
          // Loop through all list items, and hide those who don't match the search query
          for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
            } else {
              li[i].style.display = "none";
            }
          }
        }
        </script>

@endsection
