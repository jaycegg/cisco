@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tail.datetime@0.4.13/css/tail.datetime-default-green.min.css">

    <!--Ici interface de réservation de Salle-->
    <div class="alignement fondjaune">
    

    @foreach ($salles_id as $salle)
        @if ($salle->etat === 1)
            @if ($salle->campuses_id === Auth::user()->campuses_id)
            <div class="row justify-content-center">
            <div class="col-sm-4">
                <table class="table">
                        <tr><h5>Quelle salle voulez-vous réserver sur votre Campus ?</h5><br /><br /><br /></tr>
                        <tr><td>{{$salle->nom}}</td><td><a href="{{route('salleResa', $salle->id)}}" class="btn btn-dark">Créer un ticket</a></td></tr>
                        
            </div>
            </div>

            @endif
        @endif
    @endforeach

    @foreach ($salles_id as $salle)
        @if ($salle->etat === 0)
            @if ($salle->campuses_id === Auth::user()->campuses_id)
                <div>
                    <tr><td class='text-danger'>{{ $salle->nom }} - {{App\Models\Campus::find($salle->campuses_id)->ville}}</td><td><button class="btn btn-danger" disabled>Indisponible</button></td></tr>
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