@extends('layouts.app')
@section('content')
<h1>Détail du campus</h1>

<h4>Ville</h4>
<p>{{$campus->ville}}</p>

<h4>Pays</h4>
<p>{{$campus->pays}}</p>

<a href="{{ route('campuses.index') }}" class="btn btn-dark">Retour</a>
@endsection