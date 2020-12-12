@extends('layouts.app')
@section('content')
<h1>Création de campus</h1>

{!! Form::open(array('route' => 'campuses.store','method'=>'POST')) !!}

    {!! Form::label('ville', 'Ville') !!}
    {!! Form::text('ville') !!}

    {!! Form::label('pays', 'Pays') !!}
    {!! Form::text('pays', 'France') !!}

    {!! Form::submit('Créer', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection