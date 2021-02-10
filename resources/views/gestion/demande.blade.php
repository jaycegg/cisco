@extends('layouts.app')
@section('content')
    
    <h3>Vos demandes</h3>

    <h4>Demandes en cours</h4>
    @foreach ($tickets as $ticket)
        @if ($ticket->etat === 1)
            @if ($ticket->users_id === Auth::user()->id)
                <p>Créé le : {{$ticket->created_at}} <br>
                    @if ($ticket->materiels_id != Null)
                        Concerne : Matériel <br>
                        Nom : {{App\Models\Materiel::find($ticket->materiels_id)->nom}} // Catégorie : {{App\Models\Materiel::find($ticket->materiels_id)->categorie}}<br> 
                    @else
                        Concerne : Salle <br>
                        Nom : {{App\Models\Salle::find($ticket->salles_id)->nom}} // Ville : {{App\Models\Campus::find(App\Models\Salle::find($ticket->salles_id)->campuses_id)->ville}} <br>
                    @endif
                    Descrption : {{$ticket->description}} <br>
                </p>
            @endif 
        @endif
    @endforeach

    <h4>Demandes traitées</h4>
    @foreach ($tickets as $ticket)
        @if ($ticket->etat === 0)
            @if ($ticket->users_id === Auth::user()->id)
            <p>Créé le : {{$ticket->created_at}} <br>
                @if ($ticket->materiels_id != Null)
                    Concerne : Matériel <br>
                    Nom : {{App\Models\Materiel::find($ticket->materiels_id)->nom}} // Catégorie : {{App\Models\Materiel::find($ticket->materiels_id)->categorie}}<br>
                @else
                    Concerne : Salle <br>
                    Nom : {{App\Models\Salle::find($ticket->salles_id)->nom}} // Ville : {{App\Models\Campus::find(App\Models\Salle::find($ticket->salles_id)->campuses_id)->ville}} <br>
                @endif
                Descrption : {{$ticket->description}} <br>
            </p>
            @endif 
        @endif
    @endforeach 

    <h4>Demandes refusées</h4>
    @foreach ($tickets as $ticket)
        @if ($ticket->etat === 2)
            @if ($ticket->users_id === Auth::user()->id)
            <p>Créé le : {{$ticket->created_at}} <br>
                @if ($ticket->materiels_id != Null)
                    Concerne : Matériel <br>
                    Nom : {{App\Models\Materiel::find($ticket->materiels_id)->nom}} // Catégorie : {{App\Models\Materiel::find($ticket->materiels_id)->categorie}}<br> 
                @else
                    Concerne : Salle <br>
                    Nom : {{App\Models\Salle::find($ticket->salles_id)->nom}} // Ville : {{App\Models\Campus::find(App\Models\Salle::find($ticket->salles_id)->campuses_id)->ville}} <br>
                @endif
                Descrption : {{$ticket->description}} <br>
            </p>
            @endif 
        @endif
    @endforeach 

@endsection