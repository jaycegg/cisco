@extends('layouts.app')
@section('content')
<h1>Edition de log</h1>

{!! Form::model($log, ['method' => 'PATCH','route' => ['logs.update', $log->id]]) !!}

    {!! Form::label('created_at', 'Date') !!}
    {!! Form::date('created_at') !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description') !!}

    {!! Form::submit('Modifier', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ route('logs.index') }}" class="btn btn-dark">Retour</a>
@endsection