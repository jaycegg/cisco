@extends('layouts.app')
@section('content')
<h1>Edition de campus</h1>

{!! Form::model($campus, ['method' => 'PATCH','route' => ['campuses.update', $campus->id]]) !!}

    {!! Form::label('ville', 'Ville') !!}
    {!! Form::text('ville') !!}

    {!! Form::label('pays', 'Pays') !!}
    {!! Form::text('pays') !!}

    {!! Form::submit('Modifier', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection