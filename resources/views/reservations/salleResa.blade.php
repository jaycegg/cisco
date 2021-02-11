@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tail.datetime@0.4.13/css/tail.datetime-default-green.min.css">

    <!--Ici interface de réservation de Salle-->
    <h3>Votre demande pour la salle : {{$salle->nom}}</h3>
        <form enctype="multipart/form-data" method="POST" action="{{route('resaSalle', $salle->id)}}" >
            @csrf
            {!! Form::label('type', 'Type de ticket') !!}  
            {!!Form::select('type', ['Salle' => 'Réserver une salle', 'Autre' => 'Autre motif'], 'Salle')!!}

            {!! Form::label('start', 'Début') !!}  
            <input id="start" name="start" type="date">
            <input id="startT" name="startT" type="time">         
                    
            {!! Form::label('end', 'Fin') !!}        
            <input id="end" name="end" type="date">
            <input id="endT" name="endT" type="time">
            <br>
            {!! Form::label('description', 'Description') !!}
            <br>
            {!! Form::textarea('description', null, ['class'=>'col-sm-6']) !!}
            <br>
            
            <input type="hidden" name="salles_id" value="{{$salle->id}}">

            <button class="btn btn-success" type="submit">
                Créer ticket
            </button>
        </form>

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>
    
@endsection