@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tail.datetime@0.4.13/css/tail.datetime-default-green.min.css">

    <!--Ici interface de réservation de Salle-->
    <h3 class="alignement">Votre demande pour la salle : {{$salle->nom}}</h3><br /><br /><br />
        <form enctype="multipart/form-data" method="POST" action="{{route('resaSalle', $salle->id)}}" >
            @csrf
             
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">{!! Form::label('type', 'Type de ticket') !!}</div>

                <div class="col-md-6">
                    {!!Form::select('type', ['Salle' => 'Réserver une salle', 'Autre' => 'Autre motif'], 'Salle')!!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">{!! Form::label('start', 'Début') !!}</div>

                <div class="col-md-6">
                    <input id="start" name="start" type="date">
                    <input id="startT" name="startT" type="time">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">{!! Form::label('end', 'Fin') !!}</div>

                <div class="col-md-6">
                    <input id="end" name="end" type="date">
                    <input id="endT" name="endT" type="time">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">{!! Form::label('description', 'Description') !!}</div>

                <div class="col-md-6">
                    {!! Form::textarea('description', null, ['class'=>'col-sm-6']) !!}
                </div>
            </div>
            
            <input type="hidden" name="salles_id" value="{{$salle->id}}">
        </form>
        <div class="alignement">
        <button class="btn" style="background-color : #ffc853" type="submit">
                Créer un ticket
        </button>
        <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>
        </div>
    
@endsection