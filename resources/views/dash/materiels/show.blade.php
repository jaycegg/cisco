@extends('layouts.app')
@section('content')
<h1>Détail du matériel</h1>

<h4>Nom</h4>
<p>{{$materiel->nom}}</p>

<h4>Disponibilité</h4>
@if ($materiel->etat == 1)
    <p>Disponible</p>
@else
    <p>Non disponible</p>
@endif

<h4>Campus</h4>
<p>{{ App\Models\Materiel::find($materiel->campuses_id)->ville}}</p>

<a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection