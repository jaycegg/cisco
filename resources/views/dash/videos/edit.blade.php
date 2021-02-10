@extends('layouts.app')
@section('content')
<h1>Edition d'une vidéo</h1>

{!! Form::model($video, ['method' => 'PATCH','route' => ['videos.update', $video->id]]) !!}

    {!! Form::label('created_at', 'Créé le') !!}
    {!! Form::date('created_at') !!}

    {!! Form::label('chemin', 'Chemin') !!}
    {!! Form::text('chemin') !!}

    {!! Form::label('nom', 'Nom') !!}
    {!! Form::email('nom') !!}

    {!! Form::submit('Modifier', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ route('videos.index') }}" class="btn btn-dark">Retour</a>
@endsection