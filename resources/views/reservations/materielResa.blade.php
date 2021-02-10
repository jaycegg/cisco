@extends('layouts.app')
@section('content')
    
        <h3 class="alignement">Votre demande pour le matériel : {{$materiel->nom}}</h3><br /><br /><br />
        <form enctype="multipart/form-data" method="POST" action="{{route('resaMateriel', $materiel->id)}}" >
            @csrf

            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">{!! Form::label('type', 'Type de ticket') !!}  </div>

                <div class="col-md-6">
                    {!!Form::select('type', ['Materiel' => 'Réserver un matériel', 'Autre' => 'Autre motif', 'Casse' => 'Matériel défectueux'], 'Materiel')!!}
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
                <div class="col-md-4 col-form-label text-md-right">{!! Form::label('end', 'Fin') !!}  </div>

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
            
            <input type="hidden" name="materiels_id" value="{{$materiel->id}}">
            <input type="hidden" name="salles_id" value="{{$materiel->salles_id}}">
            
        </form>
        <div class="alignement">
            <button class="btn" style="background-color : #ffc853" type="submit">
                Créer ticket
            </button>
            <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>
        </div>
    
@endsection