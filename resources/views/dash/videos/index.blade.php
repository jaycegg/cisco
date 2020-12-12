@extends('layouts.app')
@section('content')
<h1>Dashboard Video</h1>
    
<table>
    <thead>
        <th>Créé le</th>
        <th>Chemin</th>
        <th>Nom</th>
        <th>Actions</th>
    </thead>

    <tbody>
        @foreach ($videos as $video)
            <tr>
                <td>{{$video->created_at}}</td>
                <td>{{$video->chemin}}</td>
                <td>{{$video->nom}}</td>
                <a class="btn btn-primary btn-sm" href="{{route('videos.edit', $video->id)}}">Editer</a>
                {!! Form::open(['method' => 'DELETE','route' => ['videos.destroy', $video->id]]) !!}
                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Supprimer</button>
                {!! Form::close() !!}
                <a class="btn btn-sm btn-dark" href="{{route('videos.show', $video->id)}}">Voir</a>
            </tr>   
        @endforeach
    </tbody>
</table>
    
<a class="btn btn-success btn-sm" href="{{ route('videos.create') }}">Créer une vidéo</a>

<a href="{{ route('dash') }}" class="btn btn-dark">Retour</a>
@endsection