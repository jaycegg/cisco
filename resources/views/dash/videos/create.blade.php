@extends('layouts.app')
@section('content')
<h1>Création d'une vidéo</h1>

{!! Form::open(array('route' => 'videos.store','method'=>'POST')) !!}

    {!! Form::label('created_at', 'Créé le') !!}
    {!! Form::date('created_at', \Carbon\Carbon::now()) !!}
    
    {!! Form::label('chemin', 'Chemin') !!}
    {!! Form::text('chemin') !!}
    
    {!! Form::label('nom', 'Nom') !!}
    {!! Form::email('nom') !!}

    {!! Form::submit('Créer', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection