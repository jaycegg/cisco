@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>


<a class="btn btn-Index" href="{{ route('materiel.index') }}"> Index</button>

<button type="button" class="btn btn-Créer">Créer</button>

<button type="button" class="btn btn-Afficher">Afficher</button>

<button type="button" class="btn btn-Modifier">Modifier</button>

<button type="button" class="btn btn-Mise à jour">Mise à jour </button>

<button type="button" class="btn btn-Supprimer">Supprimer</button>

@endsection