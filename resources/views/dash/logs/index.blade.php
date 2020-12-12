@extends('layouts.app')
@section('content')
<h1>Dashboard Logs</h1>
    
<table>
    <thead>
        <th>Date</th>
        <th>Description</th>
    </thead>

    <tbody>
        @foreach ($logs as $log)
            <tr>
                <td>{{ $log->created_at }}</td>
                <td>{{ $campus->description }}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="{{route('logs.edit', $log->id)}}">Editer</a>
                {!! Form::open(['method' => 'DELETE','route' => ['logs.destroy', $log->id]]) !!}
                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Supprimer</button>
                {!! Form::close() !!}
                <a class="btn btn-sm btn-dark" href="{{route('logs.show', $log->id)}}">Voir</a>
            </tr>   
        @endforeach
    </tbody>
</table>
    
<a class="btn btn-success btn-sm" href="{{ route('logs.create') }}">Créer un log</a>

<a href="{{ route('dash') }}" class="btn btn-dark">Retour</a>
@endsection