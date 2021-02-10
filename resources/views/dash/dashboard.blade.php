@extends('layouts.app')
@section('content')

<h1>Dashboard administrateur</h1>
<a class="btn btn-danger" href="{{route('salles.index')}}">Salles</a>
<a class="btn btn-danger" href="{{route('campuses.index')}}">Campus</a>
<a class="btn btn-danger" href="{{route('logs.index')}}">Logs</a>
<a class="btn btn-danger" href="{{route('videos.index')}}">Videos</a>
<a class="btn btn-danger" href="{{route('materiels.index')}}">Materiels</a>
<a class="btn btn-danger" href="{{route('users.index')}}">Utilisateurs</a>
<a class="btn btn-danger" href="{{route('tickets.index')}}">Tickets</a>

<a href="{{ route('home') }}" class="btn btn-dark">Retour</a>
@endsection