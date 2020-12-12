@extends('layouts.app')
@section('content')
<h1>Edition d'utilisateur'</h1>

{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

    {!! Form::label('name', 'Nom de l\'utilisateur') !!}
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
    {!! Form::select('roles_id', App\Models\Role::pluck('nom', 'id')) !!}

    {!! Form::submit('Modifier', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection