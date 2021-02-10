@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tail.datetime@0.4.13/css/tail.datetime-default-green.min.css">

    <!--Ici interface de réservation de Salle-->
    <div class="alignement">

    @foreach ($materiels_id as $materiel)
        @if ($materiel->etat === 1)
            @if ($materiel->campuses_id === Auth::user()->campuses_id)

                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <table class="table">
                            <tr><h5>Quel matériel voulez-vous réserver dans votre campus ?</h5><br /><br /><br /></tr>
                            <tr><td>{{$materiel->categorie}}{{App\Models\Salle::find($materiel->salles_id)->nom}}</td><td><a href="{{route('materielResa', $materiel->id)}}" class="btn btn-dark">Créer un ticket</a></td></tr>
                        
                    </div>
                </div>

            @endif
        @endif
    @endforeach

    <h5>Matériels déjà reservés</h5>
    @foreach ($materiels_id as $materiel)
        @if ($materiel->etat === 0)
            @if ($materiel->campuses_id === Auth::user()->campuses_id)

            <div>
                <tr><td class='text-danger'>{{$materiel->nom}}{{$materiel->categorie}} - {{App\Models\Salle::find($materiel->salles_id)->nom}}</td><td><button class="btn btn-danger" disabled>Indisponible</button></td></tr>
            </div>
            </table>

            @endif
        @endif
    @endforeach

    <div class="btn">
        <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>
    </div>

    </div>
    
@endsection