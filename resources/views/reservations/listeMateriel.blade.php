@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tail.datetime@0.4.13/css/tail.datetime-default-green.min.css">

    <!--Ici interface de réservation de Salle-->
    <h5>Quel matériel voulez-vous réserver dans votre campus ?</h5>

    @foreach ($materiels_id as $materiel)
        @if ($materiel->etat === 1)
            @if ($materiel->campuses_id === Auth::user()->campuses_id)
                <p>{{$materiel->nom}} <br>
                    Catégorie : {{$materiel->categorie}} <br>
                    Salle : {{App\Models\Salle::find($materiel->salles_id)->nom}} <br>
                    <a href="{{route('materielResa', $materiel->id)}}" class="btn btn-success">Créer un ticket</a>
                </p>
            @endif
        @endif
    @endforeach

    <h5>Matériels déjà reservés</h5>
    @foreach ($materiels_id as $materiel)
        @if ($materiel->etat === 0)
            @if ($materiel->campuses_id === Auth::user()->campuses_id)
            <p>{{$materiel->nom}} <br>
                Catégorie : {{$materiel->categorie}} <br>
                Salle : {{App\Models\Salle::find($materiel->salles_id)->nom}} <br>
                <button class="btn btn-warning" disabled>
                    Indisponible
                </button>
                <br>
            </p>
            @endif
        @endif
    @endforeach

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>
    
@endsection