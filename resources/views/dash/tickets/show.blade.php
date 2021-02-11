@extends('layouts.app')
@section('content')
<h1>Détail du ticket</h1>
<table>
    <thead>
        <th>Type</th>
        <th>Commence le</th>
        <th>Se termine le</th>
        <th>Description</th>
        <th>Etat</th>
        <th>Matériel</th>
        <th>Salle</th>
        <th>Utilisateur</th>
    </thead>
    <tbody>
        <th>{{$ticket->type}}</th>
        <th>{{$ticket->start}} {{$ticket->startT}}</th>
        <th>{{$ticket->end}} {{$ticket->endT}}</th>
        <th>{{$ticket->description}}</th>
        
        @if ($ticket->etat === 1)
            <th>En cours</th>
        @else
            <th>Traité</th>
        @endif
        
        @if ($ticket->materiels_id != Null)
            <th>{{ App\Models\Materiel::find($ticket->materiels_id)->nom}}</th>
        @elseif ($ticket->materiels_id == Null)
            <th>Aucun</th>
        @endif
        
        <th>{{ App\Models\Salle::find($ticket->salles_id)->nom}}</th>
        <th>{{ App\Models\User::find($ticket->users_id)->name}}</th>
    </tbody>
    <a href="{{ route('tickets.index') }}" class="btn btn-dark">Retour</a>
@endsection