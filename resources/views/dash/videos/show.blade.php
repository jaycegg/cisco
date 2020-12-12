@extends('layouts.app')
@section('content')
<h1>Détail de la vidéo</h1>
<table>
    <thead>
        <th>Créé le</th>
        <th>Chemin</th>
        <th>Nom</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <th>{{$video->created_at}}</th>
        <th>{{$video->chemin}}</th>
        <th>{{$video->nom}}</th>
    </tbody>
    <a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection