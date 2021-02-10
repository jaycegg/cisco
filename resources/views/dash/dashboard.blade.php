@extends('layouts.app')
@section('content')

<h1 class="alignement fondjaune">Dashboard administrateur</h1>
<br>
<div class="text-center" style="background-color : #ffc853;">
<a class="btn btn-dark" href="{{route('salles.index')}}">Salles</a>
<a class="btn btn-dark" href="{{route('campuses.index')}}">Campus</a>
<a class="btn btn-dark" href="{{route('logs.index')}}">Logs</a>
<a class="btn btn-dark" href="{{route('videos.index')}}">Videos</a>
<a class="btn btn-dark" href="{{route('materiels.index')}}">Materiels</a>
<a class="btn btn-dark" href="{{route('users.index')}}">Utilisateurs</a>
<a class="btn btn-dark" href="{{route('tickets.index')}}">Tickets</a>
</div>
<br>
<div align="center">
<a href="{{ route('home') }}" class="btn btn-dark">Retour</a>
@endsection
</div>