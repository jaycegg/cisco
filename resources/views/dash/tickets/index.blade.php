@extends('layouts.app')
@section('content')
<h1>Dashboard Tickets</h1>
    
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
        <th>Actions</th>
    </thead>

    <tbody>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{$ticket->type}}</td>
                <td>{{$ticket->created_at}}</td>
                <td>{{$ticket->dateEcheance}}</td>
                <td>{{$ticket->description}}</td>
                <td>{{ App\Models\Materiel::find($ticket->materiels_id)->nom}}</td>
                <td>{{ App\Models\Salle::find($ticket->salles_id)->nom}}</td>
                <td>{{ App\Models\User::find($ticket->users_id)->name}}</td>
                <a class="btn btn-primary btn-sm" href="{{route('tickets.edit', $ticket->id)}}">Editer</a>
                {!! Form::open(['method' => 'DELETE','route' => ['tickets.destroy', $ticket->id]]) !!}
                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Supprimer</button>
                {!! Form::close() !!}
                <a class="btn btn-sm btn-dark" href="{{route('tickets.show', $ticket->id)}}">Voir</a>
            </tr>   
        @endforeach
    </tbody>
</table>
    
<a class="btn btn-success btn-sm" href="{{ route('tickets.create') }}">Créer un ticket</a>

<a href="{{ route('dash') }}" class="btn btn-dark">Retour</a>
@endsection