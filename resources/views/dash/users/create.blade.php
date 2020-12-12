@extends('layouts.app')
@section('content')
<h1>Création d'un utilisateur'</h1>

{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

    {!! Form::label('name', 'Nom') !!}
    {!! Form::text('name') !!}
    
    {!! Form::label('prenom', 'Prenom') !!}
    {!! Form::text('prenom') !!}
    
    {!! Form::label('email', 'Mail') !!}
    {!! Form::email('email') !!}

    {!! Form::label('password', 'Mot de passe') !!}
    {!! Form::text('password') !!}

    {!! Form::label('campuses_id', 'Campus') !!}
    {!! Form::select('campuses_id', App\Models\Campus::pluck('ville', 'id')) !!}
   
    {!! Form::label('roles_id', 'Rôle') !!}
    {!! Form::select('roles_id', App\Models\Role::pluck('nom', 'id'), '4') !!}

    {!! Form::submit('Créer', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection