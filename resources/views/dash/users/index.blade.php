@extends('layouts.app')
@section('content')
<h1>Dashboard Utilisateur</h1>
    
<table>
    <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Mail</th>
        <th>Campus</th>
        <th>Actions</th>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->prenom}}</td>
                <td>{{$user->email}}</td>
                <td>{{ App\Models\Campus::find($user->campuses_id)->ville}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('users.edit', $user->id)}}">Editer</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id]]) !!}
                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Supprimer</button>
                    {!! Form::close() !!}
                    <a class="btn btn-sm btn-dark" href="{{route('users.show', $user->id)}}">Voir</a>
                </td>
            </tr>   
        @endforeach
    </tbody>
</table>
    
<a class="btn btn-success btn-sm" href="{{ route('users.create') }}">Créer un utilisateur</a>

<a href="{{ route('dash') }}" class="btn btn-dark">Retour</a>
@endsection