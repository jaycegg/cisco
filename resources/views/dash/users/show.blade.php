@extends('layouts.app')
@section('content')
<h1>Détail de l'utilisateur</h1>
<table>
    <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Mail</th>
        <th>Campus</th>
    </thead>
    <tbody>
        <th>{{$user->name}}</th>
        <th>{{$user->prenom}}</th>
        <th>{{$user->email}}</th>
        <th>{{ App\Models\Campus::find($user->campuses_id)->ville}}</th>
    </tbody>
    <a href="{{ route('users.index') }}" class="btn btn-dark">Retour</a>
@endsection