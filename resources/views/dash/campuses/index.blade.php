@extends('layouts.app')
@section('content')
<h1>Dashboard Campus</h1>
    
<table>
    <thead>
        <th>Ville</th>
        <th>Pays</th>
        <th>Actions</th>
    </thead>

    <tbody>
        @foreach ($campuses as $campus)
            <tr>
                <td>{{ $campus->ville }}</td>
                <td>{{ $campus->pays }}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="{{route('campuses.edit', $campus->id)}}">Editer</a>
                {!! Form::open(['method' => 'DELETE','route' => ['campuses.destroy', $campus->id]]) !!}
                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Supprimer</button>
                {!! Form::close() !!}
                <a class="btn btn-sm btn-dark" href="{{route('campuses.show', $campus->id)}}">Voir</a>
            </tr>   
        @endforeach
    </tbody>
</table>
    
<a class="btn btn-success btn-sm" href="{{ route('campuses.create') }}">Créer un campus</a>

<a href="{{ route('dash') }}" class="btn btn-dark">Retour</a>
@endsection