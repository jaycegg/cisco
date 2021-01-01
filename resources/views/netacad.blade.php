@extends('layouts.app')
@section('content')
    <!-- Message -->
    @if(Session::has('messageP'))
        <p class="alert alert-success">{{ Session::get('messageP') }}</p>
    @elseif(Session::has('messageN'))
        <p class="alert alert-danger">{{ Session::get('messageN') }}</p>
    @endif

    <!-- Form -->
    <form method='post' action='/upload' enctype='multipart/form-data' >
        {!! Form::token() !!}
        <input type='file' name='file' >
        <input type='submit' name='submit' value='Importer'>

        {!! Form::label('campuses_id', 'Choisissez un campus CESI') !!}
        {!! Form::select('campuses_id', App\Models\Campus::pluck('ville', 'id')) !!}

        {!! Form::label('roles_id', 'Choisissez un rôle') !!}
        {!! Form::select('roles_id', ['1' => 'Administrateur', '2' => 'Pilote', '3' => 'Intervenant', '4' => 'Apprenant'], '4') !!}
    </form>

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>

@endsection