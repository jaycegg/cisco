@extends('layouts.app')
@section('content')
<h1>Création de log</h1>

{!! Form::open(array('route' => 'logs.store','method'=>'POST')) !!}

    {!! Form::label('created_at', 'Date') !!}
    {!! Form::date('created_at', \Carbon\Carbon::now()) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::textArea('description') !!}

    {!! Form::submit('Créer', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ route('logs.index') }}" class="btn btn-dark">Retour</a>
@endsection