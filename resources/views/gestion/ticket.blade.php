@extends('layouts.app')
@section('content')

    <label>Rechercher</label>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Salle ou Ville">
    
    <ul id="myUL"> 
    <h3>Tickets en cours :</h3>
        @foreach ($tickets as $ticket)
        @if ($ticket->etat === 1)  
            <li><a>Salle : {{App\Models\Salle::find($ticket->salles_id)->nom}} / {{App\Models\Campus::find(App\Models\Salle::find($ticket->salles_id)->campuses_id)->ville}}</a> - créé le : {{$ticket->created_at}}                
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
                
                <!--If materiel présent dans le ticket-->
                @if ($ticket->materiels_id != Null)
                    <form enctype="multipart/form-data" method="POST" action="{{url('/gestion/tickets/materiel/valider')}}">
                        @csrf
                        <!--Changer l'etat du ticket-->
                        <input type="hidden" name="idTi" value="{{$ticket->id}}" />
                        <!--Changer l'etat du materiel-->
                        <input type="hidden" name="idSa" value="{{$ticket->salles_id}}" />
                        
                        <label for="start">Début</label>         
                        <input id="start" name="start" type="date" value="{{$ticket->start}}">
                        <input id="startT" name="startT" type="time" value="{{$ticket->startT}}">         

                        <label for="end">Fin</label>         
                        <input id="end" name="end" type="date" value="{{$ticket->end}}">
                        <input id="endT" name="endT" type="time" value="{{$ticket->endT}}">

                        <button class="btn btn-success" type="submit">
                            Accepter
                        </button>
                    </form>
                <!--Sinon Salle-->
                @else
                <form enctype="multipart/form-data" method="POST" action="{{url('/gestion/tickets/salle/valider')}}">
                    @csrf
                    <!--Changer l'etat du ticket-->
                    <input type="hidden" name="idTi" value="{{$ticket->id}}" />
                    <!--Changer l'etat de la salle-->
                    <input type="hidden" name="idSa" value="{{$ticket->salles_id}}" />

                    <label for="start">Début</label>         
                    <input id="start" name="start" type="date" value="{{$ticket->start}}">
                    <input id="startT" name="startT" type="time" value="{{$ticket->startT}}">         

                    <label for="end">Fin</label>         
                    <input id="end" name="end" type="date" value="{{$ticket->end}}">
                    <input id="endT" name="endT" type="time" value="{{$ticket->endT}}">

                    <button class="btn btn-success" type="submit">
                        Accepter
                    </button>
                </form>
                @endif

                <form enctype="multipart/form-data" method="POST" action="{{url('/gestion/tickets/decliner')}}">
                    @csrf
                    <!--Changer l'etat du ticket-->
                    <input type="hidden" name="idTi" value="{{$ticket->id}}" />
                    <button class="btn btn-danger" type="submit">
                        Décliner
                    </button>
                </form>
            </li>
        @endif
    @endforeach
    
    <h3>Tickets traités :</h3> 
    @foreach ($tickets as $ticket)
        @if ($ticket->etat === 0)
            <li><a>Salle : {{App\Models\Salle::find($ticket->salles_id)->nom}} / {{App\Models\Campus::find(App\Models\Salle::find($ticket->salles_id)->campuses_id)->ville}}</a> - créé le : {{$ticket->created_at}}
                <p>
                Concerne : 
                    @if ($ticket->materiels_id === Null)
                        Salle <br>
                    @elseif ($ticket->materiels_id != Null)
                        Matériel <br>
                    @endif
                Etat : Traité <br>
                Type : {{$ticket->type}} <br>
                Auteur : {{App\Models\User::find($ticket->users_id)->name}} {{App\Models\User::find($ticket->users_id)->prenom}} - {{App\Models\Role::find(App\Models\User::find($ticket->users_id)->roles_id)->nom}} <br>
                </p>
                <a href="{{route('tickets.show', $ticket->id)}}" class="btn btn-warning">Examiner</a>
                
                @if ($ticket->materiels_id === Null)
                    <form enctype="multipart/form-data" method="POST" action="{{route('dispoSal')}}" >
                        @csrf
        
                        <input type="hidden" name="idSa" value="{{App\Models\Salle::find($ticket->salles_id)->id }}" />

                        <label>Rendre la salle disponible</label>
                        <button class="btn btn-danger" type="submit">Disponible</button>
                    </form>
                @endif
            </li>
        @endif
    @endforeach

    <h3>Tickets refusés :</h3> 
    @foreach ($tickets as $ticket)
        @if ($ticket->etat === 2)
            <li><a>{{App\Models\Salle::find($ticket->salles_id)->nom}} / {{App\Models\Campus::find(App\Models\Salle::find($ticket->salles_id)->campuses_id)->ville}}</a> - créé le : {{$ticket->created_at}}
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
                <a href="{{route('tickets.show', $ticket->id)}}" class="btn btn-danger">Examiner</a>
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
