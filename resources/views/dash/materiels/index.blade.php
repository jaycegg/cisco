@extends('layouts.app')
@section('content')
<h1>Dashboard matériels</h1>
    
<table>
    <thead>
        <th>Nom</th>
        <th>Catégorie</th>
        <th>Etat</th>
        <th>Campus</th>
        <th>Actions</th>
    </thead>

    <tbody>
        @foreach ($materiels as $materiel)
            <tr>
                <td>{{$materiel->nom}}</td>
                <td>{{$materiel->categorie}}</td>               
                @if ($salle->etat == 1)
                    <td>Disponible</td>
                @else
                    <td>Indisponible</td>
                @endif
                <td>{{ App\Models\Campus::find($materiel->campuses_id)->ville}}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="{{route('materiels.edit', $salle->id)}}">Editer</a>
                {!! Form::open(['method' => 'DELETE','route' => ['materiels.destroy', $salle->id]]) !!}
                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Supprimer</button>
                {!! Form::close() !!}
                <a class="btn btn-sm btn-dark" href="{{route('materiels.show', $materiel->id)}}">Voir</a>
            </tr>   
        @endforeach
    </tbody>
</table>
    
<a class="btn btn-success btn-sm" href="{{ route('materiels.create') }}">Créer un matériel</a>

<a href="{{ route('dash') }}" class="btn btn-dark">Retour</a>
@endsection