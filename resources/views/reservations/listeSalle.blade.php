@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tail.datetime@0.4.13/css/tail.datetime-default-green.min.css">

    <!--Ici interface de réservation de Salle-->
    <h5>Quelle salle voulez-vous réserver sur votre Campus ?</h5>

    @foreach ($salles_id as $salle)
        @if ($salle->etat === 1)
            @if ($salle->campuses_id === Auth::user()->campuses_id)
                <p>{{$salle->nom}}
                    <a href="{{route('salleResa', $salle->id)}}" class="btn btn-success">Créer un ticket</a>
                </p>
            @endif
        @endif
    @endforeach

    <h5>Salles déjà reservées sur votre Campus</h5>
    @foreach ($salles_id as $salle)
        @if ($salle->etat === 0)
            @if ($salle->campuses_id === Auth::user()->campuses_id)
                <label class='text-danger'>Salle : {{ $salle->nom }} - {{App\Models\Campus::find($salle->campuses_id)->ville}}
                <br>              
                </label>
                <button class="btn btn-warning" disabled>
                    Indisponible
                </button>
                <br>
            @endif
        @endif
    @endforeach

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>
    
@endsection