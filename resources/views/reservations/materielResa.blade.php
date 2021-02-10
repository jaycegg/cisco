@extends('layouts.app')
@section('content')
    
        <h3>Votre demande pour le matériel : {{$materiel->nom}}</h3>
        <form enctype="multipart/form-data" method="POST" action="{{route('resaMateriel', $materiel->id)}}" >
            @csrf
            {!! Form::label('type', 'Type de ticket') !!}  
            {!!Form::select('type', ['Materiel' => 'Réserver un matériel', 'Autre' => 'Autre motif', 'Casse' => 'Matériel défectueux'], 'Materiel')!!}

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
            
            <input type="hidden" name="materiels_id" value="{{$materiel->id}}">
            <input type="hidden" name="salles_id" value="{{$materiel->salles_id}}">

            <button class="btn btn-success" type="submit">
                Créer ticket
            </button>
        </form>

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>
    
@endsection