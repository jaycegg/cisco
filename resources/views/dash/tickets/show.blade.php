@extends('layouts.app')
@section('content')
<h1>Détail du ticket</h1>
<table>
    <thead>
        <th>Type</th>
        <th>Créé le</th>
        <th>Se termine le</th>
        <th>Description</th>
        <th>Etat</th>
        <th>Matériel</th>
        <th>Salle</th>
        <th>Utilisateur</th>
    </thead>
    <tbody>
        <th>{{$ticket->type}}</th>
        <th>{{$ticket->created_at}}</th>
        <th>{{$ticket->dateEcheance}}</th>
        <th>{{$ticket->description}}</th>
        <th>{{$ticket->etat}}</th>
        <th>{{ App\Models\Materiel::find($ticket->materiels_id)->ville}}</th>
        <th>{{ App\Models\Salle::find($ticket->salles_id)->nom}}</th>
        <th>{{ App\Models\User::find($ticket->userss_id)->name}}</th>
    </tbody>
    <a href="{{ route('tickets.index') }}" class="btn btn-dark">Retour</a>
@endsection